@extends('master')

@section('content')
   
        <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <!-- header start -->
        <div class="wrapper">
   
           
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
                                                <th class="product-name"></th>
                                                <th class="product-price">Produit</th>
                                                <th class="product-name">Promotion</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($details as $detail)
                                            <tr>
                                                <!----******************* delete *******************--------------->
                                                <td  class="product-price"><img src="http://127.0.0.1:8090/storage/{{$detail->photo}}"  alt=""></td>
                                                <td  class="product-price"><span class="amount">{{$detail->qte}} x {{$detail->prix_initial}} DH</span></td>
                                                <td  class="product-price"><span class="amount">{{$detail->promotion}}%</span></td>
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
        
 
