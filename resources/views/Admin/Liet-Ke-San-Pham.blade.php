@extends('Admin-Layout')
@section('Admin_NoiDung')
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Bảng Dữ Liệu </h1>
<p class="mb-4">Thông Báo:
                <?php

                 use Illuminate\Support\Facades\Session;
                $admin =Session::get('phanquyen');
                $message = Session::get('message');
                $message_danger = Session::get('message_danger');
                if($message){
                    echo ' <center><div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Thông Báo!</strong> '.$message.'
                    </div></center>';
                    Session::put('message',null);
                }elseif($message_danger){
                    echo ' <center><div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Thông Báo!</strong> '.$message_danger.'
                    </div></center>';
                    Session::put('message_danger',null);
                }
                ?>
                </p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Bảng Dữ Liệu Sản Phẩm</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Tên Sản Phẩm</th>
                        <th>Slug</th>
                        <th>Danh Mục </th>
                        <th>Số Lượng </th>
                        <th>Display </th> 
                    
                        <th>Giá </th>
                        <th>Hình Ảnh</th>
                        <th>Ẩn/Hiện</th>
                        <th>Chỉnh Sửa</th>
                    
                    </tr>
                </thead>
               
                <tbody>
                    @foreach($all_product as $key=>$product)
                    <tr>
                        <td>{{$product->product_name}}</td>
                        <td>{{$product->product_slug}}</td>
                        <td>{{$product->category_name}}</td> 
                        <td>{{$product->product_num}}</td>
                        <td>{{$product->product_display}}</td>
                    
                        <td>{{$product->product_price}} VND</td>
                        <td><img src="{{URL::TO('/public/uploads/product/'.$product->product_image)}}" alt="" height="100" width="100"></td>
                        <td>
                            <span class="text-ellipsis">
                                <?php
                                if($product->product_status==1){
                                    ?>
                                    <a href="{{URL::to('/An-San-Pham/'.$product->product_id)}}"><i class='fas fa-hand-point-up' style='font-size:20px'></i></a>
                                    <?php
                                    }else{
                                    ?>  
                                    <a href="{{URL::to('/Hien-San-Pham/'.$product->product_id)}}"><i class='fas fa-hand-point-down' style='font-size:20px'></i></a>
                                    <?php
                                }
                                ?>
                            </span>
                        </td>
                       
                        <?php 
                         if($admin==0){
                        ?>
                                <td>
                                    <a href="{{URL::to('/Sua-San-Pham/'.$product->product_id)}}" class="btn btn-success" ui-toggle-class="">
                                    <i class='fas fa-edit' style='font-size:20px'></i></a>
                                    <a onclick="return confirm('Bạn có chắc là muốn xóa sản phẩm này ko?')" href="{{URL::to('/Xoa-San-Pham/'.$product->product_id)}}" class="btn btn-danger" ui-toggle-class="">
                                    <i class='fas fa-trash' style='font-size:20px'></i>
                                    </a>
                                </td>
                        <?php
                         }elseif($admin==1){
                        ?>
                                 <td>
                                    <a href="{{URL::to('/Sua-San-Pham/'.$product->product_id)}}" class="btn btn-success disabled" ui-toggle-class="">
                                    <i class='fas fa-edit' style='font-size:20px'></i></a>
                                    <a onclick="return confirm('Bạn có chắc là muốn xóa sản phẩm này ko?')" href="{{URL::to('/Xoa-San-Pham/'.$product->product_id)}}" class="btn btn-danger disabled" ui-toggle-class="">
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