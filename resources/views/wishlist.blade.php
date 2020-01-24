@extends('master')

@section('content')
   
        <div class="wrapper">

        <div class="breadcrumb-area pt-205 pb-210" style="background-image: url(assets/img/bg/breadcrumb.jpg)">
                <div class="container">
                    <div class="breadcrumb-content">
                        <h2>wishlist</h2>
                        <ul>
                            <li><a href="#">home</a></li>
                            <li> wishlist </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- shopping-cart-area start -->
            <div class="cart-main-area pt-95 pb-100">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <h1 class="cart-heading">wishlist</h1>
                            <form action="#">
                                <div class="table-content table-responsive">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th class="product-name">remove</th>
                                                <th class="product-price">images</th>
                                                <th class="product-name">Product</th>
                                                <th class="product-price">Promotion</th>
                                                <th class="product-price">Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($wishlist as $panier)
                                            <tr id="row{{$panier->id}}">
                                                <td class="product-remove"><a class="myClickableThingy" onclick="deleteWishlist({{$panier->id}})"><i class="ion-android-close"></i></a></td>
                                                <td class="product-thumbnail">
                                                    <a href="#"><img src="{{asset('storage/'.$panier->photoc)}}" alt=""></a>
                                                </td>
                                                <td class="product-name"><a href="#">{{$panier->name}} </a></td>
                                                <td  class="product-price"><span class="amount">${{$panier->prix_initial - $panier->prix_initial * $panier->promotion / 100}}</span><input type="hidden" id="prix{{$panier->id}}" value="{{$panier->prix_initial - $panier->prix_initial * $panier->promotion / 100}}"></td>
                                                <td  class="product-price"><span class="amount">${{$panier->prix_initial}}</span></td>
                                                </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
           
        </div>
		
        @endsection
            @section('vuejsscript')
            <script>
            function deleteWishlist(id){
                $.get('../deletewishlist/'+id,function(data){
                    if(data['error']==0){
                        $( "#row"+id ).remove();
                    }
		         });
            }
        </script>
         @endsection