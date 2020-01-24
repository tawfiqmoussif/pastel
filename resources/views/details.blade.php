@extends('master')

@section('content')
<div class="breadcrumb-area bg-img border-top-1 pt-55">
                <div class="container">
                    <div class="breadcrumb-content-2">
                        <ul>
                            <li><a class="active" href="#">home</a></li>
                            <li><a class="active" href="#">Shop </a></li>
                            <li>Product Name</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="product-details ptb-100 pb-90">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="product-details-btn">
                                <a href="#"><i class="ion-arrow-left-c"></i></a>
                                <a class="active" href="#"><i class="ion-arrow-right-c"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-lg-7 col-12">
                            <div class="product-details-img-content">
                                <div class="product-details-tab mr-70">
                                    <div class="product-details-large tab-content">
                                        <div class="tab-pane active show fade" id="mod1" role="tabpanel">
                                            <div class="easyzoom easyzoom--overlay">
                                                <a href="http://127.0.0.1:8090/storage/{{$produits[0]->photo}}" >
                                                    <img src="http://127.0.0.1:8090/storage/{{$produits[0]->photo}}"  alt="" >
                                                </a>
                                            </div>
                                        </div>
                                        @php $cnt=2; @endphp
                                    @foreach($couleurs as $clr)
                                    <div class="tab-pane fade" id="mod{{$cnt}}" role="tabpanel">
                                            <div class="easyzoom easyzoom--overlay">
                                                <a href="http://127.0.0.1:8090/storage/{{$clr->photo}}" >
                                                    <img src="http://127.0.0.1:8090/storage/{{$clr->photo}}"  alt="" >
                                                </a>
                                            </div>
                                        </div>
                                        @php $cnt++; @endphp
                              
                                    @endforeach
                                    </div>
                                    <div class="product-details-small nav mt-12 main-product-details" role=tablist>
                                        <a class="active mr-12 myClickableThingy" onclick="imselect(1)"  data-toggle="tab" role="tab" aria-selected="true">
                                            <img src="http://127.0.0.1:8090/storage/{{$produits[0]->photo}}" alt="" height="130px">
                                        </a>
                                        @php $cnt=2; @endphp
                                    @foreach($couleurs as $clr)
                                        <a class="active mr-12 myClickableThingy" onclick="imselect({{$cnt}})" data-toggle="tab" role="tab" aria-selected="true">
                                            <img src="http://127.0.0.1:8090/storage/{{$clr->photo}}" alt=""  height="130px">
                                        </a>
                                        @php $cnt++; @endphp
                                    @if($cnt==5)
                                    @php break; @endphp
                                    @endif
                                        @endforeach
                                    
                                      
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-5 col-12">
                            <div class="product-details-content">
                                <h3>{{$produits[0]->name}}</h3>
                          
                                <div class="details-price">
                                    <span>{{$produits[0]->prix_initial}} DH</span>
                                </div>
                                <p>{{$produits[0]->description}}</p>
                                <div class="quick-view-select">
                                    
                                    <div class="select-option-part">
                                    <label>Color*</label>
                                            <br/>
                                           
                                             @foreach($couleurs as $clr)
                                             <label>
  <input type="radio" name="color" value="{{$clr->id}}" id="r{{$clr->id}}" required>
  <img src="http://127.0.0.1:8090/storage/{{$clr->code}}" alt="" width="40px" height="40px">
</label>

                                             
                                             @endforeach
                                    </div>
                                </div>
                                <div class="quickview-plus-minus">
                                    <div class="cart-plus-minus">
                                        <input type="text" value="02" name="qtybutton" id="qty" class="cart-plus-minus-box">
                                    </div>
                                    <div class="quickview-btn-cart">
                                        <a class="btn-hover-black" href="#">add to cart</a>
                                    </div>
                                    <div class="quickview-btn-wishlist">
                                        <a class="btn-hover" href="#"><i class="ion-ios-heart-outline"></i></a>
                                    </div>
                                </div>
                                <div class="product-categories product-cat-tag">
                                    <ul>
                                        <li class="categories-title">Categories :</li>
                                        <li><a href="#">fashion</a></li>
                                        <li><a href="#">electronics</a></li>
                                        <li><a href="#">toys</a></li>
                                        <li><a href="#">food</a></li>
                                        <li><a href="#">jewellery</a></li>
                                    </ul>
                                </div>
                      
                   
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product-description-review-area pb-100">
                <div class="container">
                    <div class="product-description-review text-center">
                        <div class="description-review-title nav" role=tablist>
                            <a class="active" href="#pro-dec" data-toggle="tab" role="tab" aria-selected="true">
                                Description
                            </a>
                        
                        </div>
                        <div class="description-review-text tab-content">
                            <div class="tab-pane active show fade" id="pro-dec" role="tabpanel">
                                <p>{{$produits[0]->description}}</p>
                            </div>
                            <div class="tab-pane fade" id="pro-review" role="tabpanel">
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product-collection-area pb-60">
                <div class="container">
                    <div class="section-title text-center mb-55">
                        <h2>Related products</h2>
                    </div>
                    <div class="row">
                        <div class="new-collection-slider owl-carousel">
                            @foreach($related as $rel)
                            <div class="col-md-3 col-lg-3 col-sm-4 col-xs-12">
                                <div class="single-product mb-35">
                                    <div class="product-img">
                                        <a href="#"><img src="http://127.0.0.1:8090/storage/{{$rel->photo}}" alt=""  height="230px"></a>
                                        <div class="product-action">
                                            <a title="Wishlist" class="animate-left" href="#"><i class="ion-ios-heart-outline"></i></a>
                                            <a title="Quick View" data-toggle="modal" data-target="#exampleModal" class="animate-right" href="#"><i class="ion-ios-eye-outline"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <div class="product-title-price">
                                            <div class="product-title">
                                                <h4><a href="product-details-6.html">{{$rel->name}}</a></h4>
                                            </div>
                                            <div class="product-price">
                                                <span>{{$rel->prix_initial}} DH</span>
                                            </div>
                                        </div>
                                        <div class="product-cart-categori">
                                            <div class="product-cart">
                                                <span>{{$rel->namsc}}</span>
                                            </div>
                                            <div class="product-categori">
                                                <a class="btn-hover myClickableThingy" onclick="Addtocard({{$product->id}})"><i class="ion-bag" ></i> Add to cart</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
@endforeach
                        </div>
                    </div>
                </div>
            </div>
            @endsection
            @section('vuejsscript')
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