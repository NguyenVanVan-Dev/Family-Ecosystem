	<!-- top-header -->
	<div class="header-most-top">
		<p>Family Ecosystem Shop Cây Cảnh </p>
	</div>
	<!-- //top-header -->
	<!-- header-bot-->
	<div class="header-bot">
		<div class="header-bot_inner_wthreeinfo_header_mid">
			<!-- header-bot-->
			<div class="col-md-4 logo_agile">
				<h1>
					<a href="index.html">
						<span>F</span>amily
						<span>E</span>cosystem
						<img src="{{URL::TO('frontend/images/logo2.png')}}" alt=" ">
					</a>
				</h1>
			</div>
			<!-- header-bot -->
			<div class="col-md-8 header">
				<!-- header lists -->
				<ul>
					<li>
						<a class="play-icon popup-with-zoom-anim" href="#small-dialog1">
							<span class="fa fa-map-marker" aria-hidden="true"></span> Địa Chỉ Shop</a>
					</li>
					<li>
						<a href="#" data-toggle="modal" data-target="#myModal1">
							<span class="fa fa-truck" aria-hidden="true"></span>Vận Chuyển</a>
					</li>
					<li>
						<span class="fa fa-phone" aria-hidden="true"></span> +036 6361 624
					</li>
					<?php
					 use Illuminate\Support\Facades\Session;
					 $name = Session::get('customer_name');
					 if($name){ 
					?>
						
						<li class="dropdown" style="width: 200px;">
						<a class="nav-stylehead dropdown-toggle" href="#" data-toggle="dropdown"> Xin Chào !{{$name}}
							<b class="caret"></b>
						</a>
						<ul class="dropdown-menu agile_short_dropdown">
							<li class="dropdown-li">
								<a href="{{URL::TO('/HoSo-KhachHang')}}"> Hồ Sơ  <i class="fa fa-vcard-o"></i></a>
							</li>
							
							<li class="dropdown-li">
								<a href="{{URL::TO('/DangXuat-KhachHang ')}}">Đăng Xuất <i class="fa fa-sign-out"></i></a>
							</li>
						</ul>
					</li>
					 <?php
					 }else{
					?>
					<li>
						<a href="{{URL::To('/Login-Checkout')}}" data-toggle="modal" >
						<span class="fa fa-unlock-alt" aria-hidden="true"></span> Đăng Nhập  </a>
					</li>
					<li>
						<a href="{{URL::To('/Login-Checkout')}}" data-toggle="modal" >
							<span class="fa fa-pencil-square-o" aria-hidden="true"></span> Đăng Kí </a>
					</li>
					<?php
					 }
					 ?>
				</ul>
				<!-- //header lists -->
				<!-- search -->
				<div class="agileits_search">
					<form action="#" method="post">
						<input name="Search" type="search" placeholder="Chúng Tôi Có Thể Giúp Gì Cho Bạn?" required="">
						<button type="submit" class="btn btn-default" aria-label="Left Align">
							<span class="fa fa-search" aria-hidden="true"> </span>
						</button>
					</form>
				</div>
				<!-- //search -->
				<!-- cart details -->
				<div class="top_nav_right">
					<div class="wthreecartaits wthreecartaits2 cart cart box_1">
						<a href="{{URL::TO('/Show-Gio-Hang')}}" class="w3view-cart btn btn-warning" >
							<i class="fa fa-cart-arrow-down" aria-hidden="true" style="font-size: 30px;"></i>
							
						</a>		
					</div>
				</div>
				<!-- //cart details -->
				<div class="clearfix"></div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<!-- shop locator (popup) -->
	<!-- Button trigger modal(shop-locator) -->
	<div id="small-dialog1" class="mfp-hide">
		<div class="select-city">
			<h3>Please Select Your Location</h3>
			<select class="list_of_cities">
				<optgroup label="Popular Cities">
					<option selected style="display:none;color:#eee;">Select City</option>
					<option>Birmingham</option>
					<option>Anchorage</option>
					<option>Phoenix</option>
					<option>Little Rock</option>
					<option>Los Angeles</option>
					<option>Denver</option>
					<option>Bridgeport</option>
					<option>Wilmington</option>
					<option>Jacksonville</option>
					<option>Atlanta</option>
					<option>Honolulu</option>
					<option>Boise</option>
					<option>Chicago</option>
					<option>Indianapolis</option>
				</optgroup>
				
			</select>
			<div class="clearfix"></div>
		</div>
	</div>
	
		<!-- navigation -->
	<div class="ban-top">
		<div class="container">
			<div class="agileits-navi_search">
				<div class="container-fluid">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2"
							    aria-expanded="false">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
				</div>	
				<div class="collapse navbar-collapse menu--shylock" id="bs-example-navbar-collapse-2">
							<ul class="nav navbar-nav menu__list">
								<li class="dropdown">
									<a href="#" class="dropdown-toggle nav-stylehead" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Tất Cả Danh Mục
										<span class="caret"></span>
									</a>
									<ul class="dropdown-menu multi-column columns-3">
										<div class="agile_inner_drop_nav_info">
											<div class="col-sm-12 multi-gd-img">
												<ul class="multi-column-dropdown">
													<?php
													$list_cat = data_tree($categories, 0,);
													foreach($list_cat as $item){
														?>
															 <li><a href="{{URL::TO('/Danh-Muc-San-Pham/'.$item->category_id)}}"><?php echo str_repeat('++', $item->level).$item->category_name; ?></a></li>
														<?php
													}
													?>
												</ul>
											</div>
											
											
											<div class="clearfix"></div>
										</div>
									</ul>
								</li>
				</div>




			</div>
			<div class="top_nav_left">
				<nav class="navbar navbar-default">
					<div class="container-fluid">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"
							    aria-expanded="false">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse menu--shylock" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav menu__list">
								<li class="active">
									<a class="nav-stylehead fa fa-home" href="{{URL::TO('/home')}}"> Trang Chủ
										<span class="sr-only">(current)</span>
									</a>
								</li>
								<li class="">
									<a class="nav-stylehead fa fa-group" href="{{URL::TO('/About')}}">Giới Thiệu</a>
								</li>
								<li class="">
									<a class="nav-stylehead fa fa-shopping-bag" href="{{URL::TO('/All-SanPham')}}">Sản Phẩm</a>
								</li>
							
								<li class="">
									<a class="nav-stylehead fa fa-lock" href="{{URL::TO('/Faqs')}}">FAQS</a>
								</li>
								<li class="dropdown">
									<a class="nav-stylehead dropdown-toggle fa fa-newspaper-o" href="#" data-toggle="dropdown">Trang Liên kết
										<b class="caret"></b>
									</a>
									<ul class="dropdown-menu agile_short_dropdown">
										<li>
											<a href="icons.html">FaceBook <i class="fa fas-facebook"></i></a>
										</li>
										<li>
											<a href="typography.html">Zalo</a>
										</li>
									</ul>
								</li>
								<li class="">
									<a class="nav-stylehead fa fa-volume-control-phone" href="{{URL::TO('/Contact')}}">Liên hệ</a>
								</li>
							</ul>
						</div>
					</div>
				</nav>
			</div>
		</div>
	</div>
	<!-- //navigation -->
	<?php		
	function data_tree($categories, $category_parent = 0,$level = 0){
		$result = [];
		foreach($categories as $key=> $item){
			if($item->category_parent == $category_parent&& $item->category_status==1){
				$item->level=$level;
				$result[] = $item;
				unset($categories[$key]);
				$child = data_tree($categories, $item->category_id ,$level+1);
				$result = array_merge($result, $child);
				
			}
		}
		return $result;
	}
	
	?>