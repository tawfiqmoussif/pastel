<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Panier;
use App\Couleur;
use App\Wishlist;
use App\Facture;
use App\Commande;
use App\Detail;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;

class CartController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function wishlist(){
        $wishlist = DB::table('couleurs')
        ->Join('produits', 'couleurs.produits_id', '=', 'produits.id')
        ->Join('wishlists', 'couleurs.id', '=', 'wishlists.couleur_id')
        ->select('produits.name','produits.prix_initial','produits.promotion','couleurs.photo as photoc','wishlists.*')
        ->where( 'wishlists.client_id', '=', Auth::id())
        ->orderBy('wishlists.created_at','desc')
        ->paginate(8);
        return view('wishlist',compact('wishlist'));

    }

    public function cart(){
        $paniers = DB::table('couleurs')
        ->Join('produits', 'couleurs.produits_id', '=', 'produits.id')
        ->Join('paniers', 'couleurs.id', '=', 'paniers.couleur_id')
        ->select('produits.name','produits.prix_initial','produits.promotion','couleurs.photo as photoc','paniers.*')
        ->where( 'paniers.client_id', '=', Auth::id())
        ->orderBy('paniers.created_at','desc')
        ->paginate(8);
        return view('cart',compact('paniers'));
    }
    public function checkout(){
        $client = Auth::user();
        $paniers = DB::table('couleurs')
        ->Join('produits', 'couleurs.produits_id', '=', 'produits.id')
        ->Join('paniers', 'couleurs.id', '=', 'paniers.couleur_id')
        ->select('produits.name','produits.prix_initial','produits.promotion','paniers.*')
        ->where( 'paniers.client_id', '=', Auth::id())
        ->orderBy('paniers.created_at','desc')
        ->get();
        if(sizeof($paniers)==0){
            return redirect('/');
        }
        return view('checkout',compact('paniers','client'));
    }

    public function payment(Request $request){
        DB::beginTransaction();
        try{
            // -------------------- start ------------------------
            $client = Auth::user();
            $facture = new Facture(); 
            $commande = new Commande();
            $paniers = DB::table('couleurs')
            ->Join('produits', 'couleurs.produits_id', '=', 'produits.id')
            ->Join('paniers', 'couleurs.id', '=', 'paniers.couleur_id')
            ->select('produits.prix_initial','produits.promotion','couleurs.id as idc','paniers.*')
            ->where( 'paniers.client_id', '=', Auth::id())
            ->orderBy('paniers.created_at','desc')
            ->get();

            // -------------------- payment type ------------------------
            if($request->input('paymentdirect')=="direct"){
                
                $facture->typepayements_id=1;
                $facture->prix = 0;
                $facture->save();
            // $facture->prix= $request->input('totalechecked');
            }
            else{
                dd("no");
            }
            // -------------------- commande ------------------------
            // ---------- test adress-------------
            if($request->has('adresschecked') && $request->input('adress')!=null){
                $commande->adresse = $request->input('adress');
            }
            else{
                $commande->adresse = $client->adresse;
            }
            // -----------------------------------

            $commande->code=substr(md5(microtime()),0,10);
            $commande->etat="0";
            $commande->clients_id=Auth::id();
            $commande->factures_id = $facture->id;
            $commande->name = $client->name;
            $commande->tel = $client->tel;
            $commande->save();

            // -------------------- details ------------------------

            $total=0;
            foreach ($paniers as $panier){
                $detail = new Detail();
                $detail->commandes_id=$commande->id;
                $detail->couleurs_id=$panier->idc;
                $detail->qte = $panier->nombre;
                $detail->prix_initial = $panier->prix_initial;
                $detail->promotion = $panier->promotion;
                $total= $total + ($panier->prix_initial - $panier->prix_initial * $panier->promotion / 100) * $panier->nombre;
                $detail->save();
            }

            // -------------------- update facture ------------------------
            $facture->prix = $total;
            $facture->save();
            Panier::where('client_id',Auth::id())->delete();
            DB::commit();        
            return Response()->json(["codeEr"=>"300","msg"=>"payement bien effectué"]);  
        }catch(QueryException  $ex)
        {
            return Response()->json(["codeEr"=>"303","msg"=>"Erreur SQL"]);
            DB::rollBack();
        }
    }
    
    
    public function commandes()
    {
        $commandes = DB::table('commandes')
            ->Join('factures', 'commandes.factures_id', '=', 'factures.id')
            ->select('factures.prix','commandes.*')
            ->where( 'commandes.clients_id', '=', Auth::id())
            ->orderBy('commandes.created_at','desc')
            ->paginate(8);
        return view('commandes',compact('commandes'));
    }
    public function detail($id)
    {
        $details = DB::table('details')
            ->Join('couleurs', 'details.couleurs_id', '=', 'couleurs.id')
            ->select('couleurs.photo','details.*')
            ->where( 'details.commandes_id', '=', $id)
            ->orderBy('details.created_at','desc')
            ->paginate(8);
        return view('detailCom',compact('details'));
    }


    public function destroyPanier($id)
    {
        //dd("1");
        $panier=Panier::findOrFail($id);
        $panier->delete();
        return response()->json(['error' => '0', 'msg' => 'success']);
        //eturn "1";
    }

    public function updatePanier($id,$qte)
    {
        $panier=Panier::find($id);
        $panier->nombre=$qte;
        $panier->save();
        return response()->json(['error' => '0', 'msg' => 'success']);
    }

    public function destroyWishlist($id)
    {
        $wishlist=Wishlist::findOrFail($id);
        $wishlist->delete();
        return response()->json(['error' => '0', 'msg' => 'success']);
    }
}