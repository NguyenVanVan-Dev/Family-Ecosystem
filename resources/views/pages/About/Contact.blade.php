@extends('layout-page')
@section('content')
<div class="services-breadcrumb">
		<div class="agile_inner_breadcrumb">
			<div class="container">
				<ul class="w3_short">
					<li>
						<a href="index.html">Trang Chủ</a>
						<i>|</i>
					</li>
					<li>Liên Hệ Với Chung Tôi</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- //page -->
	<!-- contact page -->
	<div class="contact-w3l">
		<div class="container">
			<!-- tittle heading -->
			<h3 class="tittle-w3l">Liên Hệ Với Chung Tôi
				<span class="heading-style">
					<i></i>
					<i></i>
					<i></i>
				</span>
			</h3>
			<!-- //tittle heading -->
			<!-- contact -->
			<div class="contact agileits">
				<div class="contact-agileinfo">
					<div class="contact-form wthree">
						<form action="#" method="post">
							<div class="">
								<input type="text" name="name" placeholder="Name" required="">
							</div>
							<div class="">
								<input class="text" type="text" name="subject" placeholder="Subject" required="">
							</div>
							<div class="">
								<input class="email" type="email" name="email" placeholder="Email" required="">
							</div>
							<div class="">
								<textarea placeholder="Message" name="message" required=""></textarea>
							</div>
							<input type="submit" value="Submit">
						</form>
					</div>
					<div class="contact-right wthree">
						<div class="col-xs-7 contact-text w3-agileits">
							<h4>Liên Lạc:</h4>
							<p>
								<i class="fa fa-map-marker"></i> Đại Học CNTT & Truyền Thông ,Đà Nẵng</p>
							<p>
								<i class="fa fa-phone"></i> Đường Dây Nóng: +036 6361 624</p>
							<p>
								<i class="fa fa-fax"></i> FAX : +1 888 888 4444</p>
							<p>
								<i class="fa fa-envelope-o"></i> E-mail :
								<a href="mailto:example@mail.com">nguyenvanvanbh1991@gmail.com</a>
							</p>
						</div>
						<div class="col-xs-5 contact-agile">
							<img src="{{URL::TO('frontend/images/lienhe.png')}}" alt="">
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
			</div>
			<!-- //contact -->
		</div>
	</div>
@endsection