@extends('layout-page')
@section('content')

	<!-- page -->
	<div class="services-breadcrumb">
		<div class="agile_inner_breadcrumb">
			<div class="container">
				<ul class="w3_short">
					<li>
						<a href="index.html">Trang Chủ</a>
						<i>|</i>
					</li>
					<li>Giỏ Hàng</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- //page -->
	<!-- checkout page -->
	<div class="privacy">
		<div class="container">
			<!-- tittle heading -->
			<h3 class="tittle-w3l">Giỏ Hàng
				<span class="heading-style">
					<i></i>
					<i></i>
					<i></i>
				</span>
			</h3>
			<!-- //tittle heading -->
			<?php
				use Illuminate\Support\Facades\Session;
				$name = Session::get('customer_name');
				$mes = Session::get('thanhtoan');
			$message = Session::get('message');
			if($message){
				echo ' <center><div class="alert alert-danger alert-dismissible">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong>Thông Báo!</strong> '.$message.'
			  </div></center>';
				Session::put('message',null);
			}
			
			?>

			<!-- //tittle heading -->
			<?php
				use Gloudemans\Shoppingcart\Facades\Cart;
				$content = Cart::content();
				
				?>
			<div class="checkout-right">
				<h4> Giỏ Hàng Của Bạn Có:
					<span><?php
					echo count($content).''.' Sản Phẩm';
					
					?></span>
				</h4>
				<div class="table-responsive">
					<table class="timetable_sub">
						<thead>
							<tr>
								<th>Hình Ảnh</th>
								<th>Số Lượng</th>
								<th>Tên Sản Phẩm</th>
								<th>Giá</th>
								<th>Thành Tiền</th>
								<th>Xóa </th>
							</tr>
						</thead>
						<tbody>
						@foreach($content as $v_content)
							<tr class="rem1">
								<td class="invert-image">
								<a href=""><img src="{{URL::to('public/uploads/product/'.$v_content->options->image)}}" width="90" alt="" /></a>
								</td>
								<td class="invert">
									<div class="quantity">
										<form action="{{URL::to('/Cap-Nhat-Gio-Hang')}}" method="POST">
											{{ csrf_field() }}
											<input class="" type="number" name="cart_quantity" value="{{$v_content->qty}}" min="1"  >
											<input type="hidden" value="{{$v_content->rowId}}" name="rowId_cart" class="form-control">
											<input type="submit" value="Cập nhật" name="update_qty" class="btn btn-success">
										</form>
									</div>
								</td>
								<td class="invert">{{$v_content->name}}</td>
								<td class="invert">{{number_format($v_content->price).' '.'VNĐ'}}</td>
								<td> 
									<?php
										$subtotal = $v_content->price * $v_content->qty;
										echo number_format($subtotal).' '.'VNĐ';
									?>
								</td>
								<td class="invert">
									<div class="rem">
									<a class="btn btn-danger" href="{{URL::to('/Xoa-Gio-Hang/'.$v_content->rowId)}}"><i class="fa fa-times"></i> Xóa</a>
									</div>
								</td>
								
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
			<div class="checkout-left">
				<div class="address_form_agile">
							
					<?php
						if($name != NULL){
							
					?>
						<h4>Đơn Hàng Của Bạn </h4>				
							<div class="form-order">
								<ul class="form-order__list">
									<li>Tổng: <span>{{Cart::total(0).' '.'VNĐ'}}</span></li>
									<li>Thuế:<span>{{Cart::tax(0).' '.'VNĐ'}}</span></li>
									<li>Phí vận chuyển: <span>Free</span></li>
									<li>Thành tiền: <span>{{Cart::total(0).' '.'VNĐ'}}</span></li>
								</ul>
							</div>
						
						<div class="checkout-right-basket">
							<a href="{{URL::To('/Checkout')}}">Thanh Toán
								<span class="fa fa-hand-o-right" aria-hidden="true"></span>
							</a>
						</div>
					<?php
						}else{
					?>		
					 		<a href="{{URL::To('/Thanh-Toan')}}" class="btn btn-success">Thanh Toán </a>
					<?php
						}
					?>

























<!-- 
					<?php
					 if($name==null){
					?>	
						<button class="submit check_out">Giao Đến Địa Chỉ Này</button>
						
					<?php
					 }else{
					?>
						<div class="checkout-right-basket">
							<a href="{{URL::To('/Thu-Tuc-Thanh-Toan')}}">Thanh Toán Bằng Tài Khoản
								<span class="fa fa-hand-o-right" aria-hidden="true"></span>
							</a>
						</div>
					<?php
					}
					?> -->
						
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!-- //checkout page -->

@endsection
