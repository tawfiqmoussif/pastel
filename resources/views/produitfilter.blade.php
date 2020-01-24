
         @if(sizeof($produits)==0)
         <div class="col-md-12 col-lg-12 col-sm-12 align-middle">
         
         </div>
         @else
         
         <div id="grid-5-col1" class="tab-pane fade active show">
                                <div class="row custom-row" >
                          
                                @foreach($produits as $produit)
                                    <div class="custom-col-5 custom-col-style">
                                        <div class="single-product mb-35">
                                            <div class="product-img">
                                                <a href="#"><img src="http://127.0.0.1:8090/storage/{{$produit->photo}}" alt=""></a>
                                                <div class="product-action">
                                                    <a title="Wishlist" class="animate-left" href="#"><i class="ion-ios-heart-outline"></i></a>
                                                    <a title="Quick View" data-toggle="modal" data-target="#exampleModal" class="animate-right" href="#"><i class="ion-ios-eye-outline"></i></a>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <div class="product-title-price">
                                                    <div class="product-title">
                                                        <h4><a href="product-details-6.html">{{$produit->name}}</a></h4>
                                                    </div>
                                                    <div class="product-price">
                                                        <span>${{$produit->prix_initial}}</span>
                                                    </div>
                                                </div>
                                                <div class="product-cart-categori">
                                                    <div class="product-cart">
                                                        <span>{{$produit->namsc}}</span>
                                                    </div>
                                                    <div class="product-categori">
                                                        <a href="#"><i class="ion-bag"></i> Add to cart</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                </div>
                            </div>
                            
                            <div id="grid-5-col2" class="tab-pane fade">
                                <div class="row" >
                                @foreach($produits as $produit)
                                    <div class="col-md-12 col-lg-12 col-xl-6">
                                        <div class="single-product single-product-list product-list-right-pr mb-40">
                                            <div class="product-img list-img-width">
                                                <a href="#"><img src="http://127.0.0.1:8090/storage/{{$produit->photo}}" alt=""></a>
                                                <div class="product-action">
                                                    <a title="Quick View" data-toggle="modal" data-target="#exampleModal" class="animate-right" href="#"><i class="ion-ios-eye-outline"></i></a>
                                                </div>
                                            </div>
                                            <div class="product-content-list">
                                                <div class="product-list-info">
                                                    <h4><a href="#">{{$produit->name}}</a></h4>
                                                    <span>${{$produit->prix_initial}}</span>
                                                    <p>{{$produit->description}}</p>
                                                </div>
                                                <div class="product-list-cart-wishlist">
                                                    <div class="product-list-cart">
                                                        <a class="btn-hover list-btn-style" href="#">add to cart</a>
                                                    </div>
                                                    <div class="product-list-wishlist">
                                                        <a class="btn-hover list-btn-wishlist" href="#"><i class="ion-ios-heart-outline"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                                   
                                        @endif
                        