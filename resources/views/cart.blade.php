@extends('master')

@section('content')
   
        <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <!-- header start -->
        <div class="wrapper">
   
            <div class="breadcrumb-area pt-205 pb-210" style="background-image: url(assets/img/bg/breadcrumb.jpg)">
                <div class="container">
                    <div class="breadcrumb-content">
                        <h2>cart page</h2>
                        <ul>
                            <li><a href="#">home</a></li>
                            <li> cart </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- shopping-cart-area start -->
            <div class="cart-main-area pt-95 pb-100">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <h1 class="cart-heading">Cart</h1>
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
                                                <th class="product-quantity">Quantity</th>
                                                <th class="product-subtotal">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @php
                                            $subTotal=0;
                                            $total=0;
                                        @endphp
                                        @foreach($paniers as $panier)
                                            <tr id="row{{$panier->id}}">
                                                <!----******************* delete *******************--------------->
                                          
                                               
                                               
                                                <td class="product-remove"><a class="myClickableThingy" onclick="deleteCart({{$panier->id}})"><i class="ion-android-close"></i></a></td>
                                               
                                                
                                                <td class="product-thumbnail">
                                                    <a href="#"><img src="{{asset('storage/'.$panier->photoc)}}" alt=""></a>
                                                </td>
                                                <td class="product-name"><a href="#">{{$panier->name}} </a></td>
                                                <td  class="product-price"><span class="amount">${{$panier->prix_initial - $panier->prix_initial * $panier->promotion / 100}}</span><input type="hidden" id="prix{{$panier->id}}" value="{{$panier->prix_initial - $panier->prix_initial * $panier->promotion / 100}}"></td>
                                                <td  class="product-price"><span class="amount">${{$panier->prix_initial}}</span></td>
                                                <td class="product-quantity">
                                                    <input value="{{$panier->nombre}}" onchange="updateTotale({{$panier->id}})" id="qte{{$panier->id}}" type="number" min="0"><input type="hidden" id="qteh{{$panier->id}}" value="{{$panier->nombre}}">
                                                </td>
                                                <td class="product-subtotal">${{$panier->prix_initial - $panier->prix_initial * $panier->promotion / 100}} <input type="hidden" id="total{{$panier->id}}" value="{{$panier->prix_initial - $panier->prix_initial * $panier->promotion / 100}}"></td>
                                                @php
                                                    $subTotal= $subTotal + ($panier->prix_initial - $panier->prix_initial * $panier->promotion / 100) * $panier->nombre;
                                                    $total= $total + ($panier->prix_initial - $panier->prix_initial * $panier->promotion / 100) * $panier->nombre;
                                                @endphp
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-md-5 ml-auto">
                                        <div class="cart-page-total">
                                            <h2>Cart totals</h2>
                                            <ul>
                                                <li>Subtotal<span id="spansubtotal" > @php echo $subTotal; @endphp</span></li>
                                                <input type="hidden" id="subtotal" value="{{$subTotal}}">
                                                <li>Total<span id="spantotal" >@php echo $total; @endphp</span></li><input type="hidden" id="total" value="{{$total}}">
                                            </ul>
                                            <a href="{{url('/checkout')}}">Proceed to checkout</a>
                                        </div>
                                    </div>
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
            function deleteCart(id){
                  $.get('../deletecart/'+id,function(data){
    if(data['error']==0){
        $( "#spansubtotal" ).html($( "#subtotal" ).val()-$( "#prix"+id ).val()*$( "#qte"+id ).val());
        $( "#spantotal" ).html($( "#total" ).val()-$( "#prix"+id ).val()*$( "#qte"+id ).val());
        $( "#total").val($( "#total" ).val()-$( "#prix"+id ).val()*$( "#qte"+id ).val());
        $( "#subtotal").val($( "#subtotal" ).val()-$( "#prix"+id ).val()*$( "#qte"+id ).val());
        $( "#row"+id ).remove();

    }
		         });
            }

            function updateTotale(id){
                $.get('../updatecart/'+id+'/'+$( "#qte"+id ).val(),function(data){
                    if(data['error']==0){
                        var x=$( "#qteh"+id ).val()-$( "#qte"+id ).val();

                        $( "#spansubtotal" ).html(Number($( "#subtotal" ).val()-$( "#prix"+id ).val()*x).toFixed(2));
                        $( "#spantotal" ).html(Number($( "#total" ).val()-$( "#prix"+id ).val()*x).toFixed(2));
                        $( "#total").val(Number($( "#total" ).val()-$( "#prix"+id ).val()*x).toFixed(2));
                        $( "#subtotal").val(Number($( "#subtotal" ).val()-$( "#prix"+id ).val()*x).toFixed(2));
                        $( "#qteh"+id ).val($( "#qte"+id ).val());
                    }
		         });

               // alert($( "#qte"+id ).val()+" "+prix+" "+$( "#qteh"+id ).val());
              
              
            }
        </script>
            @endsection
        
 
