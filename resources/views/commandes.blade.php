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
                            <li> My commands </li>
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
                                                <th class="product-name">Code</th>
                                                <th class="product-price">Prix</th>
                                                <th class="product-price">Date</th>
                                                <th class="product-name">Etat</th>
                                                <th class="product-name">Details</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($commandes as $commande)
                                            <tr>
                                                <!----******************* delete *******************--------------->
                                                <td  class="product-price"><span class="amount">{{$commande->code}}</span></td>
                                                <td  class="product-price"><span class="amount">{{$commande->prix}}</span></td>
                                                <td  class="product-price"><span class="amount">{{$commande->created_at}}</span></td>
                                                <td  class="product-price"><span class="amount">{{$commande->etat}}</span></td>
                                            <td  class="product-price"><a href="{{url('commandes/'.$commande->id)}}">detail</a></td>
                                                
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
        
 
