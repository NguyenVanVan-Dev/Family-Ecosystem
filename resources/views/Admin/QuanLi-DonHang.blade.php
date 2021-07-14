@extends('Admin-Layout')
@section('Admin_NoiDung')
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Bảng Dữ Liệu</h1>
<p class="mb-4">Thông Báo:<?php

use Illuminate\Support\Facades\Session;
$admin =Session::get('phanquyen');
$mes = Session::get('message');

$mes_danger = Session::get('message_danger');
   if($mes){
       echo '  <div class="alert alert-success">
       <center>      <strong>Hoàn Thành!</strong> '. $mes.'</center>
       </div>';
       Session::put('message',null);
   }elseif($mes_danger){
       echo '  <div class="alert alert-danger">
       <center>      <strong>Cảnh Báo!</strong> '. $mes_danger.'</center>
       </div>';  
       Session::put('message_danger',null);
   }
?>
    
</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Dữ Liệu Đơn Hàng</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Tên Người Đặt</th>
                        <th>Tổng Tiền</th>
                        <th>Tình Trạng</th>
                        <th>Chỉnh Sửa</th>
                      
                    </tr>
                </thead>
                
                <tbody>
                @foreach($all_order as $key => $order)
                    <tr>
                        <td>{{ $order->customer_name }}</td>
                        <td>{{ $order->order_total }} VNĐ</td>
                        <td>
                            <?php
                            if($order->order_status==1) {
                                    echo 'Chưa Xử Lí';
                                }
                                else if ($order->order_status==2){
                                    echo 'Đã Giao Hàng';
                                }
                                else  if ($order->order_status==0){
                                    echo 'Đơn Hàng Bị Hủy';
                                }else{
                                    echo ' Đã Hủy Đơn Hàng ';
                                }
                            
                            ?>       
                        </td>
                            <?php 
                            if($admin==0){
                            ?>
                                    <td style="text-align: center;">
                                        <a href="{{URL::to('/Show-DonHang/'.$order->order_id)}}" class="btn btn-success" ui-toggle-class="">
                                        <i class='fas fa-edit' style='font-size:20px'></i></a>
                                        <a onclick="return confirm('Bạn có chắc là muốn xóa sản phẩm này ko?')" href="{{URL::to('/Xoa-DonHang/'.$order->order_id)}}" class="btn btn-danger" ui-toggle-class="">
                                        <i class='fas fa-trash' style='font-size:20px'></i>
                                        </a>
                                    </td>
                            <?php
                            }elseif($admin==1){
                            ?>
                                     <td style="text-align: center;">
                                        <a href="{{URL::to('')}}" class="btn btn-success disabled" ui-toggle-class="">
                                        <i class='fas fa-edit' style='font-size:20px'></i></a>
                                        <a onclick="return confirm('Bạn có chắc muốn xóa đơn hàng nay không?')" href="{{URL::to('/Xoa-DonHang/'.$order->order_id)}}" class="btn btn-danger disabled" ui-toggle-class="">
                                        <i class='fas fa-trash' style='font-size:20px'></i>
                                        </a>
                                    </td>         
                            <?php
                            }
                            ?>
                    </tr>
                    @endforeach
               
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
@endsection