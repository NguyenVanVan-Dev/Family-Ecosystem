@extends('layout-page')
@section('content')
<div class="banner-bootom-w3-agileits">
		<div class="container">
			<!-- tittle heading -->
			<h3 class="tittle-w3l">Single Page
				<span class="heading-style">
					<i></i>
					<i></i>
					<i></i>
				</span>
			</h3>
            <!-- //tittle heading -->
        @foreach($product_details as $key =>$details)    
			<div class="col-md-5 single-right-left ">
				<div class="grid images_3_of_2">
					<div class="flexslider">
						<ul class="slides">
							<li data-thumb="{{URL::to('public/uploads/product/'.$details->product_image)}}">
								<div class="thumb-image">
									<img src="{{URL::to('public/uploads/product/'.$details->product_image)}}" data-imagezoom="true" class="img-responsive" alt=""> </div>
							</li>
							<li data-thumb="images/si2.jpg">
								<div class="thumb-image">
									<img src="images/si2.jpg" data-imagezoom="true" class="img-responsive" alt=""> </div>
							</li>
							<li data-thumb="images/si3.jpg">
								<div class="thumb-image">
									<img src="images/si3.jpg" data-imagezoom="true" class="img-responsive" alt=""> </div>
							</li>
						</ul>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
			<div class="col-md-7 single-right-left simpleCart_shelfItem">
				<h3>{{$details->product_name}}</h3>
				<div class="rating1">
					<span class="starRating">
						<input id="rating5" type="radio" name="rating" value="5">
						<label for="rating5">5</label>
						<input id="rating4" type="radio" name="rating" value="4">
						<label for="rating4">4</label>
						<input id="rating3" type="radio" name="rating" value="3" checked="">
						<label for="rating3">3</label>
						<input id="rating2" type="radio" name="rating" value="2">
						<label for="rating2">2</label>
						<input id="rating1" type="radio" name="rating" value="1">
						<label for="rating1">1</label>
					</span>
				</div>
				<p>
                    <?php
                    $number_hehe = $details->product_price /7; 
                    ?>
					<span class="item_price">{{$details->product_price}} VND</span>
					<del>{{number_format($details->product_price + $number_hehe)}} VND</del>
					<label>Free  Ship</label>
				</p>
				<div class="single-infoagile">
					<ul>
						<li> {!!  $details->product_content  !!}</li>
						<li>
							 Ưu Đãi Với Mức Giá Tốt Nhất:
							<span class="item_price">{{$details->product_price}} VND</span>
						</li>
					</ul>
				</div>
				<div class="product-single-w3l">
					<p>
						<i class="fa fa-hand-o-right" aria-hidden="true"></i>Sản Phẩm 
						<label>Chất Lượng Cao</label> .</p>
					
					
				</div>
				<div class="occasion-cart">
					<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                       
						<form action="{{URL::to('/Luu-Gio-Hang')}}" method="post">
							@csrf
							<input type="hidden" value="{{$details->product_id}}" >
							<input type="hidden" value="{{$details->product_name}}" >
							<input type="hidden" value="{{$details->product_image}}" >
							<input type="hidden" value="{{$details->product_price}}" >
							<input type="hidden" value="1" name="qty">
							<input name="productid_hidden" type="hidden"  value="{{$details->product_id}}" />

							<button type="submit" class="btn-cart add-to-cart" data-id_product="{{$details->product_id}}" name="add-to-cart">
							Thêm Giỏ Hàng
							</button>
						</form>
					</div>

				</div>

			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
    <!-- //Single Page -->
    
    @endforeach
	<!-- special offers -->
	<div class="featured-section" id="projects">
		<div class="container">
			<!-- tittle heading -->
			<h3 class="tittle-w3l">Sản Phẩm Liên Quan
				<span class="heading-style">
					<i></i>
					<i></i>
					<i></i>
				</span>
			</h3>
			<!-- //tittle heading -->
			<div class="content-bottom-in">
				<ul id="flexiselDemo1">
                    @foreach($relate as $key=>$val)
					<li>
						<div class="w3l-specilamk">
							<div class="speioffer-agile">
								<a href="single.html">
									<img src="{{URL::to('public/uploads/product/'.$val->product_image)}}" alt="" width="160" height="150">
								</a>
							</div>
							<div class="product-name-w3l">
								<h4>
									<a href="single.html">{{$val->product_name}}</a>
								</h4>
								<div class="w3l-pricehkj">
									<h6>{{ number_format($val->product_price)}} VND</h6>
									<p>Save $40.00</p>
								</div>
								<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
								<form action="{{URL::to('/Luu-Gio-Hang')}}" method="post">
									@csrf
									<input type="hidden" value="{{$val->product_id}}" >
									<input type="hidden" value="{{$val->product_name}}" >
									<input type="hidden" value="{{$val->product_image}}" >
									<input type="hidden" value="{{$val->product_price}}" >
									<input type="hidden" value="1" name="qty">
									<input name="productid_hidden" type="hidden"  value="{{$val->product_id}}" />

									<button type="submit" class="btn-cart add-to-cart" data-id_product="{{$val->product_id}}" name="add-to-cart" style="height: 40px;">
									Thêm Giỏ Hàng
									</button>
								</form>
								</div>
							</div>
						</div>
					</li>
                    @endforeach
				</ul>
			</div>
		</div>
	</div>
	<!-- //special offers -->

			
@endsection