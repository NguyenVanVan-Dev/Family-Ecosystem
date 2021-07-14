@extends('Admin-Layout')
@section('Admin_NoiDung')
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Bảng Dữ Liệu</h1>
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
        <h6 class="m-0 font-weight-bold text-primary">Thông Tin Người Dùng </h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr >
                        <th> Tên Người Dùng</th>
                        <th>E-mail</th>
                        <th>Chỉnh Sửa</th>
                      
                    </tr>
                </thead>
                
                <tbody>
                @foreach($khachhang as $key => $user)
                   
                    <tr>
                        <td>{{ $user->customer_name }}</td>
                        
                        
                        <td>{{$user->customer_email}}</td>
                        <?php
                         if( $admin == 0){
                        ?>
                            <td style="text-align: center;">
                                <a href="{{URL::to('/MoChan-NguoiDung/'.$user->customer_id)}}" class="btn btn-success" ui-toggle-class="">
                                <i class='fas fa-unlock' style='font-size:20px'></i></a>
                                <a href="{{URL::to('/Chan-NguoiDung/'.$user->customer_id)}}" class="btn btn-warning" ui-toggle-class="">
                                <i class='	fas fa-user-lock' style='font-size:20px'></i></a>
                                <a  href="{{URL::to('/Xoa-NguoiDung/'.$user->customer_id)}}" class="btn btn-danger" ui-toggle-class="">
                                <i class='fas fa-trash' style='font-size:20px'></i>
                                </a>
                            </td>


                        <?php
                         }elseif($admin == 1){
                         ?>
                            <td style="text-align: center;">
                                <a href="{{URL::to('/MoChan-NguoiDung/'.$user->customer_id)}}" class="btn btn-success " ui-toggle-class="">
                                <i class='fas fa-unlock' style='font-size:20px'></i></a>
                                <a href="{{URL::to('/Chan-NguoiDung/'.$user->customer_id)}}" class="btn btn-warning " ui-toggle-class="">
                                <i class='	fas fa-user-lock' style='font-size:20px'></i></a>
                                <a  href="{{URL::to('/Xoa-NguoiDung/'.$user->customer_id)}}" class="btn btn-danger disabled" ui-toggle-class="">
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