<div class="featured-section" id="projects">
		<div class="container">
			<!-- tittle heading -->
			<h3 class="tittle-w3l">Ưu Đãi Đặc Biệt
				<span class="heading-style">
					<i></i>
					<i></i>
					<i></i>
				</span>
			</h3>
			<!-- //tittle heading -->
			<div class="content-bottom-in">
				<ul id="flexiselDemo1">
		
					@foreach($dacbiet as $key=>$datbiet_ex)
					<li>
						<div class="w3l-specilamk">
							<div class="speioffer-agile">
								<a href="single.html">
								<img src="{{URL::to('uploads/product/'.$datbiet_ex->product_image)}}" alt="" width="260" height="200" />
								</a>
							</div>
							<div class="product-name-w3l">
								<h4>
									<a href="single.html">{{$datbiet_ex->product_name}}</a>
								</h4>
								<div class="w3l-pricehkj">
									<h6>{{number_format($datbiet_ex->product_price)}} VND</h6>
									<?php
									 $Tien_chua =$datbiet_ex->product_price/2;
									?>
									<p>Save {{number_format($datbiet_ex->product_price-$Tien_chua)}} VND </p>
								</div>
								<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
											<form action="{{URL::to('/Luu-Gio-Hang')}}" method="post">
                                                @csrf
                                                <input type="hidden" value="{{$datbiet_ex->product_id}}" >
                                                <input type="hidden" value="{{$datbiet_ex->product_name}}" >
                                                <input type="hidden" value="{{$datbiet_ex->product_image}}" >
                                                <input type="hidden" value="{{$datbiet_ex->product_price}}" >
                                                <input type="hidden" value="1" name="qty">
                                                <input name="productid_hidden" type="hidden"  value="{{$datbiet_ex->product_id}}" />

                                                <button type="submit" class="btn-cart add-to-cart" data-id_product="{{$datbiet_ex->product_id}}" name="add-to-cart" style="height: 40px;">
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