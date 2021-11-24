@extends('layout')
 @section('content')
                      
 	<div class="agileinfo-ads-display col-md-9">
				<div class="wrapper">
					 <!-- first section (nuts)  -->
					<div class="product-sec1">
						 @foreach($category_name as $key=>$name)
						<h3 class="heading-tittle">{{$name->category_name}}</h3>
						@endforeach

						@foreach($category_by_id as $key=>$cate)
						<div class="col-md-4 product-men">
							<div class="men-pro-item simpleCart_shelfItem">
								<div class="men-thumb-item">
								<img src="{{URL::to('uploads/product/'.$cate->product_image)}}" alt="" width="160" height="150" />
									<div class="men-cart-pro">
										<div class="inner-men-cart-pro">
											<a href="{{URL::TO('/Chi-Tiet-San-Pham/'.$cate->product_id)}}" class="link-product-add-cart">Xem Ngay</a>
										</div>
									</div>
									<span class="product-new-top">-5%</span>
								</div>
								<div class="item-info-product ">
									<h4>
										<a href="{{URL::TO('/Chi-Tiet-San-Pham/'.$cate->product_id)}}">{{$cate->product_name}}</a>
									</h4>
									<div class="info-product-price">
										<span class="item_price">{{number_format($cate->product_price).' '.'VNĐ'}}</span>
										<?php
										 $number_hehe = $cate->product_price /7; 
										?>
										<del>{{number_format($cate->product_price + $number_hehe)}}</del>
									</div>
									<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button">
											<form action="{{URL::to('/Luu-Gio-Hang')}}" method="post">
                                                @csrf
                                                <input type="hidden" value="{{$cate->product_id}}" >
                                                <input type="hidden" value="{{$cate->product_name}}" >
                                                <input type="hidden" value="{{$cate->product_image}}" >
                                                <input type="hidden" value="{{$cate->product_price}}" >
                                                <input type="hidden" value="1" name="qty">
                                                <input name="productid_hidden" type="hidden"  value="{{$cate->product_id}}" />

                                                <button type="submit" class="btn-cart add-to-cart" data-id_product="{{$cate->product_id}}" name="add-to-cart">
                                                Thêm Giỏ Hàng
                                                </button>
                                            </form>

									
										
								
									</div>

								</div>
							</div>
						</div>
						@endforeach
						<div class="clearfix"></div>
					</div>
				 <!-- //first section (nuts) --> 
			
				
				</div>
			</div>
@endsection