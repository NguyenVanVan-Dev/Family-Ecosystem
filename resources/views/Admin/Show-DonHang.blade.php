@extends('Admin-Layout')
@section('Admin_NoiDung')
  <!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Bảng Dữ Liệu</h1>
<p class="mb-4"> Thông Báo:


</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Thông Tin Khách Hàng </h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr style="text-align: center;">
                        <th>Tên Khách Hàng</th>
                        <th>Số Điện Thoại</th>
                        <th>E-mail</th>
                       
                    </tr>
                </thead>               
                <tbody>
                   
                    <tr style="text-align: center;">
                        <td>{{$customer->customer_name}}</td>
                        <td>{{ $shipping->shipping_phone}}</td>
                        <td>{{$customer->customer_email}}</td>
                        
                    </tr>
                   
                 
                </tbody>
            </table>
        </div>
    </div>
</div>
<hr>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Thông Tin Đơn Hàng </h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr style="text-align: center;">
                        <th>Tên Người Nhận</th>
                        <th>Số Điện Thoại</th>
                        <th>E-mail</th>
                        <th>Địa Chỉ</th>
                        <th>Hình Thức Thanh Toán</th>
                    </tr>
                </thead>               
                <tbody>
                    <tr style="text-align: center;"> 
                        <td>{{$shipping->shipping_name}}</td>
                        <td>{{$shipping->shipping_phone}}</td>
                        <td>{{$customer->customer_email}}</td>
                        <td>{{$shipping->shipping_address}}</td>
                        <td>@if($shipping->shipping_method==0) Chuyển khoản @else Tiền mặt @endif</td>
                    </tr>
                 
                </tbody>
            </table>
        </div>
    </div>
</div>
<hr>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Chi Tiết Đơn Hàng </h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr style="text-align: center;">
                        <th>STT</th>
                        <th>Tên Sản Phẩm</th>
                        <th>Số Lượng</th>
                        <th>Giá Sản Phẩm</th>
                        <th>Tổng Tiền</th>
                    
                    </tr>
                </thead>               
                <tbody>
                    @php 
                    $i = 0;
                    $total = 0;
                    @endphp
                    @foreach($order_details as $key => $details)

                    @php 
                    $i++;
                    $subtotal = $details->product_price*$details->product_sales_quantity;
                    $total+=$subtotal;
                    @endphp
                    <tr>
                    
                        <td><i>{{$i}}</i></td>
                        <td>{{$details->product_name}}</td>
                    
                    
                        <td>{{$details->product_sales_quantity}}</td>
                        <td>{{number_format($details->product_price ,0,',','.')}}đ</td>
                        <td>{{number_format($subtotal ,0,',','.')}}đ</td>
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="5" class="p-2">  
                           <span class="mr-5 font-weight-bold"> Thanh toán:</span> {{number_format($total,0,',','.')}} VNĐ
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="card shadow mb-4 p-3">
    
        <form role="form" action="{{URL::to(('/CapNhat-DonHang/'.$details->order_id))}}" method="post" enctype="multipart/form-data" >
            {{ csrf_field() }}
       
                <div class="form-group col-sm-6">
                @foreach($order as $key => $or)       
                    <select name="select_status" class="form-control">
                    @if($or->order_status==1) 
                        <option value="">----Chọn hình thức đơn hàng-----</option>
                        <option id="{{$or->order_id}}" selected value="1">Chưa Xử Lý</option>
                        <option id="{{$or->order_id}}" value="2">Đã Xử Lý-Đã Giao Hàng</option>
                        <option id="{{$or->order_id}}" value="3">Hủy Đơn Hàng</option>
                    @elseif($or->order_status==2)
                        <option value="">----Chọn hình thức đơn hàng-----</option>
                        <option id="{{$or->order_id}}" value="1">Chưa xử lý</option>
                        <option id="{{$or->order_id}}" selected value="2">Đã xử lý-Đã giao hàng</option>
                        <option id="{{$or->order_id}}" value="3">Hủy đơn hàng-tạm giữ</option>
                    @elseif($or->order_status==3)
                        <option value="">----Chọn hình thức đơn hàng-----</option>
                        <option id="{{$or->order_id}}" value="1">Chưa xử lý</option>
                        <option id="{{$or->order_id}}"  value="2">Đã xử lý-Đã giao hàng</option>
                        <option id="{{$or->order_id}}" selected value="3">Hủy đơn hàng-Thu Hồi</option>
                    @else{
                        <option value="">----Chọn hình thức đơn hàng-----</option>
                        <!-- <option id="{{$or->order_id}}" value="1">Chưa xử lý</option>
                        <option id="{{$or->order_id}}" value="2">Đã xử lý-Đã giao hàng</option>
                        <option id="{{$or->order_id}}" value="3">Hủy đơn hàng-Thu Hồi</option> -->
                        <option id="{{$or->order_id}}" selected value="0"> Đơn hàng bị hủy</option>
                    }
                    @endif
                    </select>
                    
                
                    
                @endforeach
                </div>
           
            <div class="form-group col-sm-6">
                <button type="submit" name="update_order" class="btn btn-info form-control">cập nhật đơn hàng
                </button>
            </div>
            
        </form>
        <div class="col-md-6">
            <a target="_blank" href="{{url('/print-order/'.$details->order_id)}}" class="btn btn-warning" >in đơn hàng</a>
        </div>
</div>

<hr>

</div>
<!-- /.container-fluid -->




@endsection