@extends('master')

@section('content')
<div class="slider-area">
<div class="slider-active owl-carousel">
            @php $cnt=0 @endphp
            @foreach($slides as $slide)
            @if($cnt==0)
            <div class="single-slider single-slider-hm1 bg-img ptb-260" style="background-image: url('http://127.0.0.1:8090/storage/{{$slide->photo}}')">
                        <div class="container">
                            <div class="slider-content slider-content-style-1 slider-animated-1">
                                <h1 class="animated float-right">{{$slide->titre}} <span></span></h1>
                                <h2 class="animated"></h2>
                                <p class="animated">{{$slide->obs}} </p>
                                <br/><br/><br/><br/>
                                
                                <a class="btn-hover slider-btn-style animated float-right" href="#">shop now</a>
                            </div>
                        </div>
            </div>
           @else
            <div class="single-slider single-slider-hm1 bg-img slider-content-style-1 ptb-260" style="background-image: url('http://127.0.0.1:8090/storage/{{$slide->photo}}')">
                        <div class="container">
                            <div class="slider-content slider-content-style-1 slider-animated-2 slider-text-right">
                                <h1 class="animated float-right">  <span></span></h1>
                                <h1 class="animated"> {{$slide->titre}}</h1>
                                <div class="slide-right-pera">
                                    <p class="animated">{{$slide->obs}} </p>
                                </div>
                                <br/><br/><br/><br/>
                                <a class="btn-hover slider-btn-style animated" href="#">shop now</a>
                            </div>
                        </div>
            </div>
            @endif
            @php $cnt++ @endphp
            @endforeach
            </div>
            </div>  
            <div class="banner-area pt-100 pb-70">
                <div class="container">
                @foreach($promotions as $promotion)
                    <div class="row">
                        <div class="col-md-6 col-lg-3 col-12">
                            <div class="single-banner mb-30">
                                <a href="shop-grid-view-sidebar.html"><img src="http://127.0.0.1:8090/storage/{{$promotion->photo1}}" alt=""></a>
                                <div class="banner-content banner-content-position1">
                                    <h3> <span></span></h3>
                                    <p> <span></span> </p>
                                </div>
                            </div>


                        </div>
                        <div class="d-sm-none d-lg-block col-lg-6 col-12">
                            <div class="single-banner mb-30">
                                <a href="shop-grid-view-sidebar.html"><img src="http://127.0.0.1:8090/storage/{{$promotion->photo2}}" alt="" height="270"></a>
                              
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3 col-12">
                            <div class="single-banner mb-30">
                                <a href="shop-grid-view-sidebar.html"><img src="http://127.0.0.1:8090/storage/{{$promotion->photo3}}" alt=""></a>
                                <div class="banner-content banner-content-position3">
                                    <h3> <span></span></h3>
                                    <p><span></span> </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="product-area pb-100">
                <div class="container">
                    <div class="section-title text-center mb-35">
                        <h2>Nouveau produits</h2>
                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when look</p>
                    </div>
                    <div class="product-style">
                        <div class="product-tab-list text-center mb-45 nav product-menu-mrg" role="tablist">
                        @php $i=0; @endphp
                        @foreach ($categories as $categorie)
                            <a @if($i==0)  @endif onclick="Filtrer({{ $categorie->id }},{{sizeof($produits)}})" href="#" data-toggle="tab" role="tab" aria-selected="@if($i==0) true @else false @endif" aria-controls="home1">
                                <h4>{{ $categorie->name }} </h4>
                            </a>
                            @php $i++; @endphp
                        @endforeach
                        
                        </div>
                        <div class="tab-content jump" >
                            <div class="tab-pane active show fade" id="Fall"  role="tabpanel" >
                                <div class="row" id="probycat">
                                    <div class="product-slider-active owl-carousel" >
                                   
                                    @php $i=0; @endphp
                                    @foreach($produits as $produit)
                                        <div class="col-md-3 col-lg-3 col-sm-4">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a class="item" href="{{url('detail/'.$produit->id)}}"><img class="teimage{{$produit->id}}" id='photo{{$i}}' src="http://127.0.0.1:8090/storage/{{$produit->photo}}" alt="" width="60px" height="260px"></a>
                                                    <span>sale</span>
                                                    <div class="product-action">
                                                        <a title="Wishlist" class="animate-left" href="#" ><i class="ion-ios-heart-outline"></i></a>
                                                 
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
                                                            <span>{{$produit->namsc}}</span>
                                                        </div>
                                                        <div class="product-categori">
                                                            <a  class="add-to-cart myClickableThingy" onclick="detailcard({{$produit->id}})"><i class="ion-bag"></i> Add to cart</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                      
                                        @php $i++; @endphp
                                        @endforeach  
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="home2" role="tabpanel">
                                <div class="row">
                                    <div class="product-slider-active owl-carousel">
                                        <div class="col-md-3 col-lg-3 col-sm-4">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="#"><img src="{{asset('storage/images/12.jpg')}}" alt=""></a>
                                                    <span>sale</span>
                                                    <div class="product-action">
                                                        <a title="Wishlist" class="animate-left" href="#"><i class="ion-ios-heart-outline"></i></a>
                                                        <a title="Quick View" data-toggle="modal" data-target="#exampleModal" class="animate-right" href="#"><i class="ion-ios-eye-outline"></i></a>
                                                    </div>
                                                </div>
                                                <div class="product-content">
                                                    <div class="product-title-price">
                                                        <div class="product-title">
                                                            <h4><a href="product-details-6.html">WOODEN FURNITURE</a></h4>
                                                        </div>
                                                        <div class="product-price">
                                                            <span>$150.00</span>
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
                                        <div class="col-md-3 col-lg-3 col-sm-4">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="#"><img src="{{asset('storage/images/5.jpg')}}" alt=""></a>
                                                    <div class="product-action">
                                                        <a title="Wishlist" class="animate-left" href="#"><i class="ion-ios-heart-outline"></i></a>
                                                        <a title="Quick View" data-toggle="modal" data-target="#exampleModal" class="animate-right" href="#"><i class="ion-ios-eye-outline"></i></a>
                                                    </div>
                                                </div>
                                                <div class="product-content">
                                                    <div class="product-title-price">
                                                        <div class="product-title">
                                                            <h4><a href="product-details-6.html">WOODEN FURNITURE</a></h4>
                                                        </div>
                                                        <div class="product-price">
                                                            <span>$160.00</span>
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
                                        <div class="col-md-3 col-lg-3 col-sm-4">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="#"><img src="assets/img/product/7.jpg" alt=""></a>
                                                    <span>sale</span>
                                                    <div class="product-action">
                                                        <a title="Wishlist" class="animate-left" href="#"><i class="ion-ios-heart-outline"></i></a>
                                                        <a title="Quick View" data-toggle="modal" data-target="#exampleModal" class="animate-right" href="#"><i class="ion-ios-eye-outline"></i></a>
                                                    </div>
                                                </div>
                                                <div class="product-content">
                                                    <div class="product-title-price">
                                                        <div class="product-title">
                                                            <h4><a href="product-details-6.html">HANDCRAFTED MUG</a></h4>
                                                        </div>
                                                        <div class="product-price">
                                                            <span>$170.00</span>
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
                                        <div class="col-md-3 col-lg-3 col-sm-4">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="#"><img src="assets/img/product/8.jpg" alt=""></a>
                                                    <div class="product-action">
                                                        <a title="Wishlist" class="animate-left" href="#"><i class="ion-ios-heart-outline"></i></a>
                                                        <a title="Quick View" data-toggle="modal" data-target="#exampleModal" class="animate-right" href="#"><i class="ion-ios-eye-outline"></i></a>
                                                    </div>
                                                </div>
                                                <div class="product-content">
                                                    <div class="product-title-price">
                                                        <div class="product-title">
                                                            <h4><a href="product-details-6.html">HANDCRAFTED MUG</a></h4>
                                                        </div>
                                                        <div class="product-price">
                                                            <span>$180.00</span>
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
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="home3" role="tabpanel">
                                <div class="row">
                                    <div class="product-slider-active owl-carousel">
                                        <div class="col-md-3 col-lg-3 col-sm-4">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="#"><img src="assets/img/product/9.jpg" alt=""></a>
                                                    <span>sale</span>
                                                    <div class="product-action">
                                                        <a title="Wishlist" class="animate-left" href="#"><i class="ion-ios-heart-outline"></i></a>
                                                        <a title="Quick View" data-toggle="modal" data-target="#exampleModal" class="animate-right" href="#"><i class="ion-ios-eye-outline"></i></a>
                                                    </div>
                                                </div>
                                                <div class="product-content">
                                                    <div class="product-title-price">
                                                        <div class="product-title">
                                                            <h4><a href="product-details-6.html">HANDCRAFTED MUG</a></h4>
                                                        </div>
                                                        <div class="product-price">
                                                            <span>$190.00</span>
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
                                        <div class="col-md-3 col-lg-3 col-sm-4">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="#"><img src="assets/img/product/10.jpg" alt=""></a>
                                                    <div class="product-action">
                                                        <a title="Wishlist" class="animate-left" href="#"><i class="ion-ios-heart-outline"></i></a>
                                                        <a title="Quick View" data-toggle="modal" data-target="#exampleModal" class="animate-right" href="#"><i class="ion-ios-eye-outline"></i></a>
                                                    </div>
                                                </div>
                                                <div class="product-content">
                                                    <div class="product-title-price">
                                                        <div class="product-title">
                                                            <h4><a href="product-details-6.html">HANDCRAFTED MUG</a></h4>
                                                        </div>
                                                        <div class="product-price">
                                                            <span>$110.00</span>
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
                                        <div class="col-md-3 col-lg-3 col-sm-4">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="#"><img src="assets/img/product/11.jpg" alt=""></a>
                                                    <span>sale</span>
                                                    <div class="product-action">
                                                        <a title="Wishlist" class="animate-left" href="#"><i class="ion-ios-heart-outline"></i></a>
                                                        <a title="Quick View" data-toggle="modal" data-target="#exampleModal" class="animate-right" href="#"><i class="ion-ios-eye-outline"></i></a>
                                                    </div>
                                                </div>
                                                <div class="product-content">
                                                    <div class="product-title-price">
                                                        <div class="product-title">
                                                            <h4><a href="product-details-6.html">WOODEN FURNITURE</a></h4>
                                                        </div>
                                                        <div class="product-price">
                                                            <span>$120.00</span>
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
                                        <div class="col-md-3 col-lg-3 col-sm-4">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="#"><img src="assets/img/product/12.jpg" alt=""></a>
                                                    <div class="product-action">
                                                        <a title="Wishlist" class="animate-left" href="#"><i class="ion-ios-heart-outline"></i></a>
                                                        <a title="Quick View" data-toggle="modal" data-target="#exampleModal" class="animate-right" href="#"><i class="ion-ios-eye-outline"></i></a>
                                                    </div>
                                                </div>
                                                <div class="product-content">
                                                    <div class="product-title-price">
                                                        <div class="product-title">
                                                            <h4><a href="product-details-6.html">WOODEN FURNITURE</a></h4>
                                                        </div>
                                                        <div class="product-price">
                                                            <span>$130.00</span>
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
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="home4" role="tabpanel">
                                <div class="row">
                                    <div class="product-slider-active owl-carousel">
                                        <div class="col-md-3 col-lg-3 col-sm-4">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="#"><img src="assets/img/product/6.jpg" alt=""></a>
                                                    <span>sale</span>
                                                    <div class="product-action">
                                                        <a title="Wishlist" class="animate-left" href="#"><i class="ion-ios-heart-outline"></i></a>
                                                        <a title="Quick View" data-toggle="modal" data-target="#exampleModal" class="animate-right" href="#"><i class="ion-ios-eye-outline"></i></a>
                                                    </div>
                                                </div>
                                                <div class="product-content">
                                                    <div class="product-title-price">
                                                        <div class="product-title">
                                                            <h4><a href="product-details-6.html">WOODEN FURNITURE</a></h4>
                                                        </div>
                                                        <div class="product-price">
                                                            <span>$140.00</span>
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
                                        <div class="col-md-3 col-lg-3 col-sm-4">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="#"><img src="{{asset('assets/img/product/1.jpg')}}" alt=""></a>
                                                    <div class="product-action">
                                                        <a title="Wishlist" class="animate-left" href="#"><i class="ion-ios-heart-outline"></i></a>
                                                        <a title="Quick View" data-toggle="modal" data-target="#exampleModal" class="animate-right" href="#"><i class="ion-ios-eye-outline"></i></a>
                                                    </div>
                                                </div>
                                                <div class="product-content">
                                                    <div class="product-title-price">
                                                        <div class="product-title">
                                                            <h4><a href="product-details-6.html">HANDCRAFTED MUG</a></h4>
                                                        </div>
                                                        <div class="product-price">
                                                            <span>$150.00</span>
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
                                        <div class="col-md-3 col-lg-3 col-sm-4">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="#"><img src="{{asset('assets/img/product/10.jpg')}}" alt=""></a>
                                                    <span>sale</span>
                                                    <div class="product-action">
                                                        <a title="Wishlist" class="animate-left" href="#"><i class="ion-ios-heart-outline"></i></a>
                                                        <a title="Quick View" data-toggle="modal" data-target="#exampleModal" class="animate-right" href="#"><i class="ion-ios-eye-outline"></i></a>
                                                    </div>
                                                </div>
                                                <div class="product-content">
                                                    <div class="product-title-price">
                                                        <div class="product-title">
                                                            <h4><a href="product-details-6.html">WOODEN FURNITURE</a></h4>
                                                        </div>
                                                        <div class="product-price">
                                                            <span>$160.00</span>
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
                                        <div class="col-md-3 col-lg-3 col-sm-4">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="#"><img src="{{asset('assets/img/product/7.jpg')}}" alt=""></a>
                                                    <div class="product-action">
                                                        <a title="Wishlist" class="animate-left" href="#"><i class="ion-ios-heart-outline"></i></a>
                                                        <a title="Quick View" data-toggle="modal" data-target="#exampleModal" class="animate-right" href="#"><i class="ion-ios-eye-outline"></i></a>
                                                    </div>
                                                </div>
                                                <div class="product-content">
                                                    <div class="product-title-price">
                                                        <div class="product-title">
                                                            <h4><a href="product-details-6.html">HANDCRAFTED MUG</a></h4>
                                                        </div>
                                                        <div class="product-price">
                                                            <span>$170.00</span>
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @foreach($limitees as $limitee)
            <div class="shop-limited-area bg-img pt-90 pb-100" style="background-image: url(http://127.0.0.1:8090/storage/{{$limitee->photo}})" >
            @endforeach
                <div class="container">
                    <div class="shop-limited-content text-left">
                        <h2 style="color:black">Deals</h2>
                        <a class="btn-hover slider-btn-style limited-btn" href="#">view more</a>
                    </div>
                </div>
            </div>
            <div class="product-collection-area pt-100 pb-50">
                <div class="container">
                    <div class="section-title text-center mb-55">
                        <h2>Nouvelles collections</h2>
                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when look</p>
                    </div>
                    <div class="row">
                    @foreach($colls as $product)
                        <div class="col-md-6 col-lg-4 col-xl-3">
                            <div class="single-product mb-35">
                                <div class="product-img">
                                    <a href="{{url('detail/'.$product->id)}}"><img src="http://127.0.0.1:8090/storage/{{$product->photo}}" alt=""></a>
                                    <span>sale</span>
                                    <div class="product-action">
                                        <a title="Wishlist" class="animate-left" href="#"><i class="ion-ios-heart-outline"></i></a>
                                        <a title="Quick View" onclick="detailcard({{$product->id}});" class="animate-right myClickableThingy" ><i class="ion-ios-eye-outline"></i></a>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="product-title-price">
                                        <div class="product-title">
                                            <h4><a href="product-details-6.html">{{$product->name}}</a></h4>
                                        </div>
                                        <div class="product-price">
                                            <span>${{$product->prix_initial}}</span>
                                        </div>
                                    </div>
                                    <div class="product-cart-categori">
                                        <div class="product-cart">
                                            <span>{{$product->namesc}}</span>
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
            </div>
           
     
                    
            
            <div class="shop-limited-area bg-img pt-40 pb-10" style="background-image: url({{asset('storage/images/pvt.png')}})" >
        
                <div class="container" >
                    <div class="text-left">
                        <h2 style="color:black">Nos points de vente</h2>
                        <p>Tanger : socco alto, tanger city mall </br> Fès : C.C Borj fes</br>Marrakech : C.C Al mazar</br>Casablanca : Morocco mall, anfa place, Marina mall
                        </br>Salé : Marjane Salé al jadida</br>El jadida : Marjane<br/>
                        <a class="btn-hover slider-btn-style limited-btn" >Pastel</a>
                    </p>
                        
                        

                    </div>
                </div>
            </div>

            
            @endsection
            @section('vuejsscript')
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
            <script>
        function Filtrer(id,cnt){

            $.ajax({
      type: 'get',
      dataType: 'html',
      url: '{{url('/getbycate')}}',
      data: '&id=' + id,
      success:function(response){
        console.log(response);
        $("#probycat").html(response);
      }
    });
        }

    function detailcard(id){

$.ajax({
      type: 'get',
      dataType: 'html',
      url: '{{url('/detailcard')}}',
      data: '&id=' + id,
      success:function(response){
        //console.log(response);
        $("#modalNew").html(response);
        $("#modalNew").modal();
      }
    });

           
          //  $.get('../getbycate/'+id,function(data){
    
       // $('#probycat').html(data);
      // alert(data);
       //console.log(data);
      
					
						
						 
		    //     });
        }

        function imselect(cnt)
    {

        container = $('.tab-pane');
        container.removeClass('active show');

        //container2 = $('#modal'+cnt);
       // $('#modal'+cnt).html("ok")
      // document.getElementById("mod"+cnt).classList.remove('active show');
       document.getElementById("mod"+cnt).className = "tab-pane active show fade";
       document.getElementById("Fall").className = "tab-pane active show fade";
       
        
    }

    function register(x){
            if(x==1){
               // alert('hh');
               // document.getElementById()
                $('#tel').prop('type', 'text');
                $('#adresse').prop('type', 'text');
                $('#name').prop('type', 'text');
                $('#password-confirm').prop('type', 'password');
                $('#buttony').val('Inscription');
                $('#buttonx').html('<a class="myClickableThingy"  style="color:blue" onclick="register(0)">Se connecter</a>');
                $('#login').prop('action', 'register');
            }
            if(x==0){
               // alert('hh');
               // document.getElementById()
                $('#tel').prop('type', 'hidden');
                $('#adresse').prop('type', 'hidden');
                $('#name').prop('type', 'hidden');
                $('#password-confirm').prop('type', 'hidden');
                $('#buttony').val('Connexion');
                $('#buttonx').html('<a class="myClickableThingy"  style="color:blue" onclick="register(1)">Inscription</a>');
                
            }
           
        }


        function Addtocard(id) {
            if ($('input[name=color]:checked').length > 0) {
   // alert($('input[name="color"]:checked').val())
   if($('#qty').val()<1)
   {
    alert('Nombre de produits choisis erroné !') 
   }
   else
   {
    $.get('addtocard/'+$('input[name="color"]:checked').val()+'/'+$('#qty').val(),function(data){
        if(data['codeEr']==1)
        {
            $('#modalNew').modal('hide');
             var cart = $('.header-cart');
     var imgtodrag = $('.teimage'+id);
     if (imgtodrag) {
         var imgclone = imgtodrag.clone()
             .offset({
             top: imgtodrag.offset().top,
             left: imgtodrag.offset().left
         })
             .css({
             'opacity': '0.8',
                 'position': 'absolute',
                 'height': '150px',
                 'width': '150px',
                 'z-index': '100'
         })
             .appendTo($('body'))
             .animate({
             'top': cart.offset().top + 10,
                 'left': cart.offset().left + 10,
                 'width': 75,
                 'height': 75
         }, 1000, 'easeInOutExpo');
         
         setTimeout(function () {
             cart.effect("shake", {
                 times: 2
             }, 200);
         }, 1500);

         imgclone.animate({
             'width': 0,
                 'height': 0
         }, function () {
             $(this).detach()
         });
     }
        }
        else if(data['codeEr']==-11)
        {
            $('#modalNew').modal('hide');
            $('.popup_wrapper').css({
            'opacity': '1',
            'visibility': 'visible'
             });
        }
        else if(data['codeEr']==304)
        {
            alert("Erreur, Réssayer à nouveau !")
        }
        else if(data['codeEr']==404)
        {
         alert("Erreur, Réssayer à nouveau !")
        }
         });
   }
}
else
{
    alert('Sélectionner au moin une couleur ') 
}
          
    }   

        </script>
     @endsection