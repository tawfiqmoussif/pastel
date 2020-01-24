@extends('master')

@section('content')
        
            <div class="breadcrumb-area pt-205 pb-210" style="background-image: url(assets/img/bg/breadcrumb.jpg)">
                <div class="container">
                    <div class="breadcrumb-content">
                        <h2>checkout</h2>
                        <ul>
                            <li><a href="#">home</a></li>
                            <li> checkout </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- checkout-area start -->
            <div class="checkout-area ptb-100">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-12 col-12">
                            <form id="myform"  @if(sizeof($paniers)==0) onsubmit="return false;" @endif  method="POST" action="{{url('payment')}}">
                                {{csrf_field()}}
                                <div class="checkbox-form">						
                                    <h3>Billing Details</h3>
                                    <div class="row">
                                        <div class="col-md-12">
                                             <!-- your informations -->
                                             <p>Name : {{$client->name}}</p>
                                             <p>Phone : {{$client->tel}}</p>
                                             <p>Email : {{$client->email}}</p>
                                             <p>Adress : {{$client->adresse}}</p>
                                        </div>
                                    </div>
                                    <div class="different-address">
                                        <div class="ship-different-title">
                                            <h3>
                                                <label>Ship to a different address?</label>
                                                <input id="ship-box" name="adresschecked" value="ok" type="checkbox" />
                                            </h3>
                                        </div>
                                        <input type="hidden" name="paymentdirect" id="paymentDirect" value="direct">
                                        <input type="hidden" name="paymentcheque" id="paymentCheque" value="">
                                        <div id="ship-box-info" class="row">
                                            <div class="col-md-12">
                                                <div class="order-notes">
                                                    <div class="checkout-form-list mrg-nn">
                                                        <label>Address <span class="required">*</span></label>
                                                        <textarea id="adress" name="adress"  cols="30" rows="10" placeholder="Your address" ></textarea>
                                                    </div>									
                                                </div>
                                            </div>
                                        </div>
                                    </div>													
                                </div>
                            </form>
                        </div>	
                        <div class="col-lg-6 col-md-12 col-12">
                            <div class="your-order">
                                <h3>Your order</h3>
                                <div class="your-order-table table-responsive">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th class="product-name">Product</th>
                                                <th class="product-total">Total</th>
                                            </tr>							
                                        </thead>
                                        <tbody>
                                        @php
                                            $subTotal=0;
                                            $total=0;
                                        @endphp
                                        @foreach($paniers as $panier)
                                            <tr class="cart_item">
                                                <td class="product-name">
                                                {{$panier->name}} <strong class="product-quantity"> × {{$panier->nombre}}</strong>
                                                </td>
                                                <td class="product-total">
                                                    <span class="amount">{{($panier->prix_initial - $panier->prix_initial * $panier->promotion / 100) * $panier->nombre}} DH</span>
                                                </td>
                                                @php
                                                    $subTotal= $subTotal + ($panier->prix_initial - $panier->prix_initial * $panier->promotion / 100) * $panier->nombre;
                                                    $total= $total + ($panier->prix_initial - $panier->prix_initial * $panier->promotion / 100) * $panier->nombre;
                                                @endphp
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr class="cart-subtotal">
                                                <th>Cart Subtotal</th>
                                                <td><span class="amount">{{$subTotal}} DH</span></td>
                                            </tr>
                                            <tr class="order-total">
                                                <th>Order Total</th>
                                                <td><strong><span class="amount">{{$total}} DH</span></strong>
                                                </td>
                                            </tr>								
                                        </tfoot>
                                    </table>
                                </div>
                                <div class="payment-method">
                                    <div class="payment-accordion">
                                        <div class="panel-group" id="faq">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h5 class="panel-title"><a data-toggle="collapse" onclick="paymentMethod(0)" aria-expanded="true" data-parent="#faq" href="#payment-1">Direct Bank Transfer.</input></a></h5>
                                                </div>
                                                <div id="payment-1" class="panel-collapse collapse show">
                                                    <div class="panel-body">
                                                        <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h5 class="panel-title"><a class="collapsed" onclick="paymentMethod(1)" data-toggle="collapse" aria-expanded="false" data-parent="#faq" href="#payment-2">Cheque Payment</a></h5>
                                                </div>
                                                <div id="payment-2" class="panel-collapse collapse">
                                                    <div class="panel-body">
                                                        <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                                                    </div>
                                                </div>
                                            </div>
                                           
                                        </div>
                                        <div class="order-button-payment">
                                       
                                        @if(sizeof($paniers)>0)
                                        <input type="submit" form="myform" value="Place order" />
                                        @endif
                                        </div>								
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          
        </div>
		
		
		
		
		
		
        @endsection
            @section('vuejsscript')
		
		
		<!-- all js here -->
    
        <script type="text/javascript">
            // grab an element
            var myElement = document.querySelector(".intelligent-header");
            // construct an instance of Headroom, passing the element
            var headroom  = new Headroom(myElement);
            // initialise
            headroom.init(); 

            function paymentMethod(x){
                if(x==0){
                    $( "#paymentDirect").val("direct");
                    $( "#paymentCheque").val("");
                }
                else if(x==1){
                    $( "#paymentDirect").val("");
                    $( "#paymentCheque").val("cheque");
                }
            }
        </script>
        @endsection
    
