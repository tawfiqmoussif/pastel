
         @if(sizeof($produits)==0)
         <div class="col-md-12 col-lg-12 col-sm-12 align-middle">
          <h3>  </h3>
         </div>
         @else
         
                                    @php $i=0; @endphp
                                    @foreach($produits as $produit)
                                        <div class="col-md-3 col-lg-3 col-sm-4">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="#"><img id='photo{{$i}}' src="http://127.0.0.1:8090/storage/{{$produit->photo}}" width="60px" height="260px" alt=""></a>
                                             
                                                    <div class="product-action">
                                                        <a title="Wishlist" class="animate-left" href="#"><i class="ion-ios-heart-outline"></i></a>
                                                 
                                                        <a title="Quick View" onclick="detailcard({{$produit->id}});" class="animate-right myClickableThingy" ><i class="ion-ios-eye-outline"></i></a>
                                                        
                                                    </div>
                                                </div>
                                                <div class="product-content">
                                                    <div class="product-title-price">
                                                        <div class="product-title">
                                                            <h4><a href="product-details-6.html" id='name{{$i}}'>{{$produit->name}}</a></h4>
                                                        </div>
                                                        <div class="product-price">
                                                            <span id='prix{{$i}}'>${{$produit->prix_initial}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="product-cart-categori">
                                                        <div class="product-cart">
                                                            <span>Furniter</span>
                                                        </div>
                                                        <div class="product-categori">
                                                            <a href="#"><i class="ion-bag"></i> Add to cart</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                      
                                        @php $i++; @endphp
                                        @endforeach  
                                   
                                        @endif
                        