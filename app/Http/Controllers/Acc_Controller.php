<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Slide;
use App\Promotion;
use App\Limitee;
use App\Produit;
use App\Panier;
use App\Couleur;
use App\Categorie;
use App\Collection;

class Acc_Controller extends Controller
{
    //
    public function home()
    {
      
    $slides=Slide::orderby('id')->get();
    $limitees=Limitee::orderby('id','desc')->paginate(1);
    $promotions=Promotion::orderby('id','desc')->paginate(1);
    $new_products=Produit::orderby('id','desc')->paginate(8);
    $categories=Categorie::orderby('id')->paginate(7);
    $produits = DB::table('produits')
    ->Join('souscategories', 'produits.souscategories_id', '=', 'souscategories.id')
    ->Join('categories', 'souscategories.categories_id', '=', 'categories.id')
    ->select('produits.*','souscategories.name as namsc')
    ->orderBy('produits.created_at','desc')
    ->paginate(8);

    $colls = DB::table('produits')
    ->Join('souscategories', 'produits.souscategories_id', '=', 'souscategories.id')
    ->Join('categories', 'souscategories.categories_id', '=', 'categories.id')
    ->Join('collections', 'collections.produits_id', '=', 'produits.id')
    ->select('produits.*','categories.name as namesc')
    ->orderBy('produits.created_at','desc')
    ->paginate(8);
  //dd($colls);
   
    return view('acceuil',compact('slides','promotions','produits','new_products','categories','limitees','colls'));
}
public function getbycate(Request $req){
//dd($id);
//echo $id;
$produits = DB::table('produits')
->Join('souscategories', 'produits.souscategories_id', '=', 'souscategories.id')
->Join('categories', 'souscategories.categories_id', '=', 'categories.id')
->select('produits.*','souscategories.name as namsc')
->distinct()->where('categories.id',$req->id)
->orderBy('produits.created_at','desc')
->paginate(4);


return view('homeBycat',['produits' => $produits]);
}

public function allproduct()
{
    $slides=Slide::orderby('id','desc')->paginate(1);
    $categories=Categorie::orderby('id')->paginate(7);
    $produits = DB::table('produits')
    ->Join('souscategories', 'produits.souscategories_id', '=', 'souscategories.id')
    ->Join('categories', 'souscategories.categories_id', '=', 'categories.id')
    ->select('produits.*','souscategories.name as namsc')
    ->distinct()
    ->orderBy('produits.created_at','desc')
    ->paginate(12);
    return view('produits',compact('categories','slides','produits'));
}
public function detail($id)
{
    $slides=Slide::orderby('id','desc')->get();
    $categories=Categorie::orderby('id')->get();

    $produits = DB::table('produits')
    ->Join('souscategories', 'produits.souscategories_id', '=', 'souscategories.id')
    ->Join('categories', 'souscategories.categories_id', '=', 'categories.id')
    ->select('produits.*','souscategories.name as namsc','categories.id as cat_id')
    ->distinct()
    ->where('produits.id',$id)
    ->orderBy('produits.created_at','desc')
    ->paginate(12);


    $related = DB::table('related')
    ->Join('produits', 'related.related_id', '=', 'produits.id')
    ->Join('souscategories', 'produits.souscategories_id', '=', 'souscategories.id')
    ->Join('categories', 'souscategories.categories_id', '=', 'categories.id')
    ->select('related.id','produits.*','souscategories.name as namsc')
    ->where('related.produits_id',$produits[0]->id)
    ->orderBy('related.created_at','desc')
    ->get();


    $couleurs = DB::table('produits')
    ->Join('couleurs', 'couleurs.produits_id', '=', 'produits.id')
    ->select('couleurs.*')
    ->distinct()
    ->where('produits.id',$id)
    ->orderBy('produits.created_at','desc')
    ->paginate(4);

    return view('details',compact('categories','slides','produits','couleurs','related'));
}


public function getbysearch(Request $req)
{
  
    $produits = DB::table('produits')
    ->Join('souscategories', 'produits.souscategories_id', '=', 'souscategories.id')
    ->Join('categories', 'souscategories.categories_id', '=', 'categories.id')
    ->select('produits.*','souscategories.name as namsc')
    ->distinct()->where('produits.name','LIKE','%'.$req->srch.'%')
    ->orderBy('produits.created_at','desc')
    ->get();
    //dd($produits);
    return view('produitfilter',['produits' => $produits]);
}


public function getbyamount(Request $req)
{

    $prix = explode(" ",$req->am);
    //dd($prix);
    $produits = DB::table('produits')
    ->Join('souscategories', 'produits.souscategories_id', '=', 'souscategories.id')
    ->Join('categories', 'souscategories.categories_id', '=', 'categories.id')
    ->select('produits.*','souscategories.name as namsc')
    ->distinct()->where('produits.prix_initial','>=',$prix[0])->where('produits.prix_initial','<=',$prix[2])
    ->orderBy('produits.created_at','desc')
    ->get();
    //dd($produits);
    return view('produitfilter',['produits' => $produits]);
}

public function getbycatpro(Request $req)
{

    
    $produits = DB::table('produits')
    ->Join('souscategories', 'produits.souscategories_id', '=', 'souscategories.id')
    ->Join('categories', 'souscategories.categories_id', '=', 'categories.id')
    ->select('produits.*','souscategories.name as namsc')
    ->distinct()->where('categories.id',$req->id)
    ->orderBy('produits.created_at','desc')
    ->get();
    //dd($produits);
    return view('produitfilter',['produits' => $produits]);
}

public function detailcard(Request $req)
{
    
    $produits = DB::table('produits')
    ->Join('souscategories', 'produits.souscategories_id', '=', 'souscategories.id')
    ->Join('categories', 'souscategories.categories_id', '=', 'categories.id')
    ->select('produits.*','souscategories.name as namsc')
    ->distinct()->where('produits.id',$req->id)
    ->orderBy('produits.created_at','desc')
    ->get();

    $couleurs = DB::table('produits')
    ->Join('couleurs', 'couleurs.produits_id', '=', 'produits.id')
    ->select('couleurs.*')
    ->distinct()
    ->where('produits.id',$req->id)
    ->orderBy('produits.created_at','desc')
    ->get();
    //dd($produits);
    return view('detailcard',compact('produits','couleurs'));
    
}

public function addtocard($id,$nbr)
{
    if (!Auth::check())
    {
        return response()->json(['codeEr'=>'-11','msg'=>'Login required']);
    }
    else if($nbr<1)
    {
        return response()->json(['codeEr'=>'304','msg'=>'Assurez vous que vous le nombre de produit choisi est supérieur de 1']);
    }
    $produits = Couleur::find($id);
    if($produits==null)
    {
        return response()->json(['codeEr'=>'404','msg'=>'Produit introuvable']);
    }
    $panier = DB::table('paniers')
    ->select('paniers.*')
    ->distinct()->where('paniers.couleur_id',$id)
    ->get();
    if(sizeof($panier)>0)
    {
        $pn = Panier::find($panier[0]->id);
        $pn->nombre = $pn->nombre + $nbr;
        $pn->save();
    }
    else
    {
    $pn = new Panier();
    $pn->client_id = Auth::user()->id;
    $pn->couleur_id = $id;
    $pn->nombre = $nbr;
    $pn->save();
    }
    return response()->json(['codeEr'=>'1','msg'=>'Bien ajouté']);
    
}
public function getpanier()
{

    if (Auth::check())
    {
        $panier =  DB::table('produits')
        ->Join('couleurs', 'couleurs.produits_id', '=', 'produits.id')
        ->Join('paniers', 'paniers.couleur_id', '=', 'couleurs.id')
        ->select('produits.*','paniers.id as idpan','paniers.nombre as nbpan','couleurs.photo as photocol','couleurs.name as namecol','couleurs.id as idcol')
        ->where('paniers.client_id',Auth::user()->id)
        ->orderBy('paniers.created_at','desc')
        ->get();
        return view('cartpastel',['panier' => $panier]);
    }
}

}
