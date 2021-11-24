@extends('layout-user')
@section('content')
<div class="services-breadcrumb">
		<div class="agile_inner_breadcrumb">
			<div class="container">
				<ul class="w3_short">
					<li>
						<a href="index.html">Trang Chủ</a>
						<i>|</i>
					</li>
					<li>NGười Dùng</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- //page -->
	<!-- contact page -->
	<div class="contact-w3l">
		<div class="container">
			<!-- tittle heading -->
			<h3 class="tittle-w3l">Hồ Sơ NGười Dùng
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
                  <div class="header__user">
                     <div class="header__avatar">
                        <img src="{{URL::TO('frontend/images/lienhe.png')}}" alt="" width="150px" height="150px">
                        <div class="header__name">
                              <p>
									{{$name->customer_name}}
									
								</p>
                              <div class="header-comment">
                                 <span><i class="fa fa-heart" aria-hidden="true"></i>500 Yêu Thích</span>
                                 <span><i class="fa fa-comments" aria-hidden="true"></i> 678 Bình Luận</span>
                              </div>
                              <div class="header__total">
                                 <p> Đã Mua Của Shop </p>
								 <span>Tổng:</span>
									
                                 <strong>
									<?php
											$total2=0;
											foreach($total as $key =>$total1){
												$total2 += (int) $total1->order_total;
											}
											echo $total2 .'.000 vnđ';
									?>
								 </strong>
                              </div>
                        </div>
                        
                     </div>
                     
                  </div>
					</div>
					<div class="contact-right wthree">
						<div class="col-xs-12 contact-text w3-agileits">
                     		<div class="profile-user">
								<div class="form-box1">
									<div class="button-box1">
										<div id="btn1"></div>
										<button type="button" class="toggle-btn1" onclick="page1()">Hồ Sơ </button>
										<button type="button" class="toggle-btn1" onclick="page2()">Đơn Hàng</button>
										<button type="button" class="toggle-btn1" onclick="page3()">Bảo Mật</button>
										<button type="button" class="toggle-btn1" onclick="page4()">Lịch Sử</button>               
									</div>
									<div class="page__profile" id="page1">
										<h2>Hồ Sơ cá Nhân</h2>
										<div class="page__profile-person">
											<div style="flex-basis: 80%;">
													<?php
													use Illuminate\Support\Facades\Session;
													$mes = Session::get('message');
													$mes_danger = Session::get('message_danger');
													
													if($mes){
														echo ' <center><div class="alert alert-success alert-dismissible">
														<button type="button" class="close" data-dismiss="alert">&times;</button>
														<strong>Thông Báo!</strong> '.$mes.'
													  </div></center>';
														Session::put('message',null);
													}elseif($mes_danger){
														echo ' <center><div class="alert alert-danger alert-dismissible">
														<button type="button" class="close" data-dismiss="alert">&times;</button>
														<strong>Thông Báo!</strong> '.$mes_danger.'
														 </div></center>';
														Session::put('message_danger',null);
													}

													?>
											</div>		
											<div style="flex-basis: 60%;">
												<form action="{{URL::TO('/Cap-Nhat-User/'.$name->customer_id)}}" method="post">
													{{ csrf_field() }}
													<div class="form-info">
														<label for="">Họ và tên:</label>
														<span>{{$name->customer_name}}</span>
														<label for="">Mail:</label>
														<span>{{$name->customer_email}}</span>
													</div>
											
													<div class="form-update">
														<input type="text" class="input__profile" name="name" value="{{$name->customer_name}}" placeholder="NHập Tên Mới.." required>
														<input type="text" class="input__profile" name="email" value="{{$name->customer_email}}" placeholder="Nhập E-mail Mới.." required>
														<button type="submit" class="btn-profile btn btn-success">Cập Nhật</button>
													</div>
												</form>	
												
											</div>
											<div>
												<img src="{{URL::TO('frontend/images/lienhe.png')}}" alt="" width="150px" height="150px">
											</div>
										</div>
									</div>
									<div class="page__profile" id="page2">
										<h2> Đơn Hàng Của Bạn</h2>
										
										<div class="page__table">
												<table class="page__table-info">
													<tr>
														<th>Tên Sản Phẩm</th>
														<th>Số Lượng </th>
														<th>Đơn Giá</th>
														<th>Thanh Tiền</th>
														<th>Hủy Đơn Hàng</th>
														<th>Trạng Thái</th>
													</tr>
													@foreach($all_order as $key=>$number)
													<tr>
														<td>{{$number->product_name}}</td>
														<td>{{$number->product_sales_quantity}}</td>
														<td>{{$number->product_price}}</td>
														<td>{{$number->product_sales_quantity * $number->product_price}}</td>
														<td>
														<a href="{{URL::TO('/Huy-Don-Hang/'.$number->order_id)}}" class="btn-profile-s btn btn-danger">Hủy Đơn Hàng</a>
														
														</td>
														<td>
															<?php
																if($number->order_status==1) {
																		echo 'Chưa Xử lí';
																	}
																	else if ($number->order_status==2){
																		echo 'Đã Nhận Hàng';
																	}
																	else  if ($number->order_status==0){
																		echo 'Đơn hàng đã hủy';
																	}else{
																		echo 'Đơn hàng bị thu hồi';
																	}
																	
															
															?>
														</td>
													</tr>
													@endforeach
												</table>
												
										</div>
										
									</div>
									
									<div class="page__profile" id="page3">
										<h2>Bảo Mật Tài Khoản</h2>
										<div class="page__profile-person">
											<div style="flex-basis: 60%;">
												<form action="{{URL::TO('/Cap-Nhat-Pass')}}" method="post">
													{{ csrf_field() }}
													<div class="form-info">
													<label for="">Thay Đổi Mật Khẩu:</label>
													
													</div>
													<div class="form-update">
														<input type="password" class="input__profile" name="passold" value="" placeholder="NHập Password Cũ" required>
														<input type="password" class="input__profile" name="passnew" value="" placeholder="NHập PassWord Mới.." required>
														<input type="password" class="input__profile" name="repeatpass" value="" placeholder="Xác Nhận PassWord Mới.." required>
														<button type="submit" class="btn-profile-s btn btn-success" style="width: 150px;">Cập Nhật</button>
													
													</div>
													
												</form>
													
											</div>
											<div>
												<form action="{{URL::TO('/Quen-Pass')}}" method="post">
													{{ csrf_field() }}
													<div class="form-info">
													<label for="">Quên Mật Khẩu:</label>
													
													</div>
													<div class="form-update">
														
														<input type="email" class="input__profile" name="emailold" value="" placeholder="Nhập Tài Khoản E-mail" required>
														<button type="submit" class="btn-profile-s btn btn-success">Gửi Mật Khẩu Đến E-mail</button>
													
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>
								<script>
									var x= document.getElementById("page1");
									var y =document.getElementById("page2");
									var a =document.getElementById("page3");
									
									var z = document.getElementById("btn1");
									
									function page1(){
										x.style.left="0px"
										y.style.left="1044px"
										a.style.left="1044px"
										z.style.left="0px"
									}
									function page2(){
										x.style.left="-1044px"
										y.style.left="0px"
										a.style.left="1044px"
										z.style.left="120px"
										
									}
									function page3(){
										x.style.left="-2088px"
										y.style.left="-1044px"
										a.style.left="0px"
										z.style.left="250px"
									}
								</script>

                     		</div>
						</div>
						
						<div class="clearfix"> </div>
					</div>
				</div>
			</div>
			
			<!-- //contact -->
		</div>
	</div>
@endsection