
@foreach($produits as $product)


<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="ion-android-close" aria-hidden="true"></span>
                </button>
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="qwick-view-left">
                                <div class="quick-view-learg-img">
                                    <div class="quick-view-tab-content tab-content">
                                        <div class="tab-pane active show fade" id="mod1" role="tabpanel">
                                            <img src="http://127.0.0.1:8090/storage/{{$product->photo}}" alt="" width="200px" height="330px">
                                        </div>
                                        @php $cnt=2; @endphp
                                        @foreach($couleurs as $clr)
                                        <div class="tab-pane fade" id="mod{{$cnt}}" role="tabpanel">
                                            <img src="http://127.0.0.1:8090/storage/{{$clr->photo}}" alt="" width="200px" height="330px">
                                        </div>
                                        @php $cnt++; @endphp
                                        @endforeach 
                                   
                                    </div>
                                </div>
                                <div class="quick-view-list nav" role="tablist">
                                <a  class="myClickableThingy" onclick="imselect(1)"  data-toggle="tab" role="tab" aria-selected="true" aria-controls="home1">
                                        <img src="http://127.0.0.1:8090/storage/{{$product->photo}}" alt="" width="80px" height="80px">
                                    </a>
                                @php $cnt=2; @endphp
                                @foreach($couleurs as $clr)
                                    <a  class="myClickableThingy" onclick="imselect({{$cnt}})" data-toggle="tab" role="tab" aria-selected="false" aria-controls="home{{$cnt}}">
                                        <img src="http://127.0.0.1:8090/storage/{{$clr->photo}}" alt="" width="80px" height="80px">
                                    </a>
                                    @php $cnt++; @endphp
                                    @if($cnt==5)
                                    @php break; @endphp
                                    @endif
                                @endforeach  
                                </div>
                            </div>
                            <div class="qwick-view-right">
                                <div class="qwick-view-content">
                                    <h3>{{$product->name}}</h3>
                                    <div class="price">
                                        <span class="new">@if($product->promotion>0) @php $apres = ($product->prix_initial - ($product->prix_initial*50)/100)@endphp {{$apres}} DH @else {{$product->prix_initial}} DH @endif</span>
                                        <span class="old">@if($product->promotion>0) {{$product->prix_initial}} DH  @endif</span>
                                    </div>
                             
                                    <p>{{$product->description}}</p>
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
											<input type="number" value="1" min="1" id="qty" name="qtybutton" class="cart-plus-minus-box">
										</div>
                                        <div class="quickview-btn-cart">
                                            <a class="btn-hover-black myClickableThingy" onclick="Addtocard({{$product->id}})" style="color:#fff" >add</a>
                                        </div>
                                        <div class="quickview-btn-wishlist">
                                            <a class="btn-hover myClickableThingy" onclick="Addtofav({{$product->id}})" ><i class="ion-ios-heart-outline"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    @endforeach        