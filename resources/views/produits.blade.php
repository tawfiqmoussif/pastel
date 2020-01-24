@extends('master')
<div class="breadcrumb-area pt-205 pb-210 bg-img" style="background-image: url({{Asset('/storage/images/lkju.png')}}">

                <div class="container">
                    <div class="breadcrumb-content">
                        <h2>shop</h2>
                        <ul>
                            <li><a href="#">home</a></li>
                            <li> shop </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="shop-page-wrapper hidden-items padding-filter">
                <div class="container-fluid">
                    <div class="shop-filters-left">
                        <div class="shop-sidebar">
                            <div class="sidebar-widget mb-50">
                                <h3 class="sidebar-title">Search Products</h3>
                                <div class="sidebar-search">
                                    <form onsubmit="false">
                                        <input placeholder="Search Products..." type="text" id="search">
                                        <button><i class="ion-ios-search-strong myClickableThingy" onclick="search()"></i></button>
                                    </form>
                                </div>
                            </div>
                            <div class="sidebar-widget mb-40">
                                <h3 class="sidebar-title">Filter by Price</h3>
                                <div class="price_filter">
                                    <div id="slider-range"></div>
                                    <div class="price_slider_amount">
                                        <div class="label-input">
                                            <label>price : </label>
                                            <input type="text" id="amount" name="price"  placeholder="Add Your Price" />
                                        </div>
                                        <button type="button myClickableThingy" onclick="filterprice()">Filter</button> 
                                    </div>
                                </div>
                            </div>
                            <div class="sidebar-widget mb-45">
                                <h3 class="sidebar-title">Categories</h3>
                                <div class="sidebar-categories">
                                    <ul>
                                        <li><a class="myClickableThingy" onclick="cat(1)">Ongles  <span>4</span></a></li>
                                        <li><a class="myClickableThingy" onclick="cat(2)">Yeux <span>9</span></a></li>
                                        <li><a class="myClickableThingy" onclick="cat(3)">Levres <span>5</span> </a></li>
                                        <li><a class="myClickableThingy" onclick="cat(4)">Visage <span>3</span></a></li>
                                        <li><a class="myClickableThingy" onclick="cat(5)">Soins <span>4</span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="sidebar-widget sidebar-overflow mb-45">
                                <h3 class="sidebar-title">color</h3>
                                <div class="product-color">
                                    <ul>
                                        <li class="red">b</li>
                                        <li class="pink">p</li>
                                        <li class="blue">b</li>
                                        <li class="sky">b</li>
                                        <li class="green">y</li>
                                        <li class="purple">g</li>
                                    </ul>
                                </div>
                            </div>
                       
                            <div class="sidebar-widget mb-50">
                               
                                <div class="sidebar-top-rated-all">
                               
                                
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="shop-filters-right">
                        <div class="shop-bar-area pb-60">
                            <div class="shop-bar">
                                <div class="shop-found-selector">
                                    <div class="shop-found">
                                        <p><span>10</span> Product Found of <span>10</span></p>
                                    </div>
                                    <div class="shop-selector">
                                        <label>Sort By : </label>
                                        <select name="select">
                                            <option value="">Default</option>
                                            <option value="">A to Z</option>
                                            <option value=""> Z to A</option>
                                            <option value="">In stock</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="shop-filter-tab">
                                    <div class="shop-filter">
                                        <a class="shop-filter-active" href="#">Filters <i class="ion-android-options"></i></a>
                                    </div>
                                    <div class="shop-tab nav" role=tablist>
                                       <a class="active" href="#grid-5-col1" data-toggle="tab" role="tab" aria-selected="false">
                                            <i class="ion-android-apps"></i>
                                        </a>
                                        <a href="#grid-5-col2" data-toggle="tab" role="tab" aria-selected="true">
                                            <i class="ion-android-menu"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="shop-product-content tab-content" id="firstdata">
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
                 
                        </div>
                        <div class="vide"> </div>
                    </div>
                </div>
            </div>
@section('content')

            @endsection
            @section('vuejsscript')
            <script>
        function search(){
        var srch = $('#search').val();
            $.ajax({
      type: 'get',
      dataType: 'html',
      url: '{{url('/getbysearch')}}',
      data: '&srch=' + srch,
      success:function(response){
       // console.log(response);
        $("#firstdata").html(response);
      }
    });

           
          //  $.get('../getbycate/'+id,function(data){
    
       // $('#probycat').html(data);
      // alert(data);
       //console.log(data);
      
					
						
						 
		    //     });
        }
       function filterprice()
       {
        
    var am=$('#amount').val();
    $.ajax({
      type: 'get',
      dataType: 'html',
      url: '{{url('/getbyamount')}}',
      data: '&am=' + am,
      success:function(response){
       // console.log(response);
        $("#firstdata").html(response);
      }
    });
         
       }
       function cat(id)
       {
           
        $.ajax({
      type: 'get',
      dataType: 'html',
      url: '{{url('/getbycatpro')}}',
      data: '&id=' + id,
      success:function(response){
       // console.log(response);
        $("#firstdata").html(response);
      }
    });
       }

    /*---------------------
    price slider
    --------------------- */
    var sliderrange = $('#slider-range');
    var amountprice = $('#amount');
    $(function() {
        sliderrange.slider({
            range: true,
            min: 20,
            max: 999,
            values: [20, 999],
            slide: function(event, ui) {
                amountprice.val(ui.values[0] + " - " + ui.values[1]+" DH");
            }
        });
        amountprice.val(sliderrange.slider("values", 0) +
            " - " + sliderrange.slider("values", 1)+" DH");
    });


  
        </script>
     @endsection