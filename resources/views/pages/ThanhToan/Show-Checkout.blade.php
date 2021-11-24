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
			<h3 class="tittle-w3l">Thanh Toán
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
								<a href=""><img src="{{URL::to('uploads/product/'.$v_content->options->image)}}" width="90" alt="" /></a>
								</td>
								<td class="invert">
									<div class="quantity">
										<form action="{{URL::to('/Cap-Nhat-Gio-Hang')}}" method="POST">
											{{ csrf_field() }}
											<input class="" type="number" name="cart_quantity" value="{{$v_content->qty}}"  >
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
					<h4>Đơn Hàng Của Bạn </h4>				
                        <div class="form-order">
                            <ul class="form-order__list">
                                <li>Tổng: <span>{{Cart::total(0).' '.'VNĐ'}}</span></li>
                                <li>Thuế:<span>{{Cart::tax(0).' '.'VNĐ'}}</span></li>
                                <li>Phí vận chuyển: <span>Free</span></li>
                                <li>Thành tiền: <span>{{Cart::total(0).' '.'VNĐ'}}</span></li>
                            </ul>                          
                        </div>
                        <h4>Thông Tin Người Nhận Hàng</h4>
						<form action="{{URL::TO('/Nhan-Don-Hang')}}" method="post" class="creditly-card-form agileinfo_form">
							{{ csrf_field() }}
						<div class="creditly-wrapper wthree, w3_agileits_wrapper">
							<div class="information-wrapper">
								<div class="first-row">
									<div class="controls">
										<input class="billing-address-name" type="text" name="name" placeholder="Họ Và Tên" required="" value="{{$name}}">
									</div>
									<div class="w3_agileits_card_number_grids">
										<div class="w3_agileits_card_number_grid_left">
											<div class="controls">
												<input type="text" placeholder="Số Điện Thoại" name="number" required="">
											</div>
										</div>
										<div class="w3_agileits_card_number_grid_right">
											<div class="controls">
												<input type="text" placeholder="Địa Chỉ(Xin Hãy Ghi Rõ Địa Chỉ)" name="address" required="">
											</div>
										</div>
										<div class="clear"> </div>
									</div>
									
									<div class="controls">
										<select class="option-w3ls" name="method">
											
											<option value="0">Nơi Làm Việc</option>
											<option value="1">  Tại Nhà </option>
											<option value="2">Lúc Giao Hàng</option>

										</select>
									</div>
									
								</div>
								<button class="submit check_out">Giao Đến Địa Chỉ Này</button>
							</div>
						</div>
					</form>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!-- //checkout page -->

@endsection
