@php
    $total=0;
@endphp
@foreach($panier as $product)


<li class="single-product-cart" id="card{{$product->idpan}}">
            <div class="cart-img">
                <a href="#"><img src="http://127.0.0.1:8090/storage/{{$product->photocol}}" alt="" width="60px" height="60px"></a>
            </div>
            <div class="cart-title">
                <h3><a href="#"> {{$product->name}}  /  {{$product->namecol}}</a></h3>
                <span>{{$product->nbpan}} x {{$product->prix_initial - $product->prix_initial * $product->promotion / 100}}</span>
                <input type="hidden" id="price{{$product->idpan}}" value="{{$product->prix_initial - $product->prix_initial * $product->promotion / 100}}">
                <input type="hidden" id="qtepan{{$product->idpan}}" value="{{$product->nbpan}}">
            </div>
            <div class="cart-delete">
                <a class="myClickableThingy" onclick="deleteCart2({{$product->idpan}})"><i class="ion-ios-trash-outline"></i></a>
            </div>
        </li> 
        @php
            $total= $total + ($product->prix_initial - $product->prix_initial * $product->promotion / 100) * $product->nbpan;
        @endphp                  
                                
    @endforeach        
    <li class="single-product-cart">
                                    <div class="cart-total">
                                        <h4>Total : <span id="sptotal">$ {{$total}}</span></h4>
                                        <input type="hidden" id="totalpan" value="{{$total}}">
                                     </div>
                                </li>
                                <li class="single-product-cart">
                                    <div class="cart-checkout-btn">
                                        <a class="btn-hover cart-btn-style" href="{{url('/cart')}}">view cart</a>
                                       @if(sizeof($panier)>0)
                                        <a class="no-mrg btn-hover cart-btn-style" href="{{url('/checkout')}}">checkout</a>
                                        @endif
                                    </div>
                                </li>