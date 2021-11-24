	<!-- product left -->
	<div class="side-bar col-md-3">
				<div class="search-hotel">
					<h3 class="agileits-sear-head">Tìm Kiếm Ở Đây?</h3>
					<form action="{{URL::TO('/Tim-Kiem')}}" method="get">
					
						<input type="search" placeholder="Product name..." name="search" required="">
						<input type="submit" value=" ">
					</form>
				</div>
				<!-- price range -->
				<div class="range">
					<h3 class="agileits-sear-head">Lọc Theo Giá</h3>
					<ul class="dropdown-menu6">
						<li>

							<div id="slider-range"></div>
							<input type="text" id="amount" style="border: 0; color: #ffffff; font-weight: normal;" />
						</li>
					</ul>
				</div>
				<!-- //price range -->
				<!-- food preference -->
			
				<!-- //food preference -->
				<!-- discounts -->
				<div class="left-side">
					<h3 class="agileits-sear-head">Giảm Giá</h3>
					<ul>
						<li>
							<input type="checkbox" class="checked">
							<span class="span">5% Hoạc Hơn</span>
						</li>
						<li>
							<input type="checkbox" class="checked">
							<span class="span">10% Hoạc Hơn</span>
						</li>
						<li>
							<input type="checkbox" class="checked">
							<span class="span">20% Hoạc Hơn</span>
						</li>
						<li>
							<input type="checkbox" class="checked">
							<span class="span">30% Hoạc Hơn</span>
						</li>
						<li>
							<input type="checkbox" class="checked">
							<span class="span">50% Hoạc Hơn</span>
						</li>
						<li>
							<input type="checkbox" class="checked">
							<span class="span">60% Hoạc Hơn</span>
						</li>
					</ul>
				</div>
				<!-- //discounts -->
				<!-- reviews -->
				<div class="customer-rev left-side">
					<h3 class="agileits-sear-head">Khách Hàng Đánh Giá </h3>
					<ul>
						<li>
							<a href="#">
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<span>5.0</span>
							</a>
						</li>
						<li>
							<a href="#">
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star-o" aria-hidden="true"></i>
								<span>4.0</span>
							</a>
						</li>
						<li>
							<a href="#">
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star-half-o" aria-hidden="true"></i>
								<i class="fa fa-star-o" aria-hidden="true"></i>
								<span>3.5</span>
							</a>
						</li>
						<li>
							<a href="#">
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star-o" aria-hidden="true"></i>
								<i class="fa fa-star-o" aria-hidden="true"></i>
								<span>3.0</span>
							</a>
						</li>
						<li>
							<a href="#">
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star-half-o" aria-hidden="true"></i>
								<i class="fa fa-star-o" aria-hidden="true"></i>
								<i class="fa fa-star-o" aria-hidden="true"></i>
								<span>2.5</span>
							</a>
						</li>
					</ul>
				</div>
				<!-- //reviews -->
				<!-- cuisine -->
			
				<!-- //cuisine -->
				<!-- deals -->
				<div class="deal-leftmk left-side">
					<h3 class="agileits-sear-head">Siêu Rẽ</h3>
					@foreach($noibat as $key=>$val)
					<div class="special-sec1">
						<div class="col-xs-4 img-deals pt-2">
						   <img src="{{URL::to('uploads/product/'.$val->product_image)}}" alt="" width="60" height="50" />
						</div>
						<div class="col-xs-8 img-deal1">
							<h3>{{$val->product_name}}</h3>
							<a href="single.html">{{number_format($val->product_price)}} VND</a>
						</div>
						<div class="clearfix"></div>
					</div>
					@endforeach

				</div>
				<!-- //deals -->
			</div>
			<!-- //product left -->