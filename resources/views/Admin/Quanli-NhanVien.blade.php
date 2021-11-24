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
        $message_danger = Session::get('massage_danger');
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
            Session::put('massage_danger',null);
        }
        ?>
    
</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Quản Lí Nhân Viên</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr >
                        <th>Họ và Tên </th>
                        <th>Số Điện Thoại</th>
                        <th>Hình Ảnh</th>
                        <th>E-mail</th>
                        <th>Chỉnh Sửa</th>
                      
                    </tr>
                </thead>
                
                <tbody>
                @foreach($nhanvien as $key => $user)
                    @if($user->admin_decentralization == 1)
                    <tr>
                        <td>{{ $user->admin_name }}</td>
                        <td>{{ $user->admin_phone }} </td>
                        <td  style="text-align: center;">
                            <img src="{{URL::TO('/uploads/manage/'.$user->admin_image)}}" alt="" 
                            
                            height="100" width="100">
                        </td>
                        <td>{{$user->admin_email}}</td>
                        <td style="text-align: center;">
                            <a href="{{URL::to('/Sua-NhanSu/'.$user->admin_id)}}" class="btn btn-success" ui-toggle-class="">
                            <i class='fas fa-edit' style='font-size:20px'></i></a>
                            <a onclick="return confirm('Bạn có chắc là muốn xóa Nhân Viên này ko?')" href="{{URL::to('/Xoa-NhanSu/'.$user->admin_id)}}" class="btn btn-danger" ui-toggle-class="">
                            <i class='fas fa-trash' style='font-size:20px'></i>
                            </a>
                        </td>
                    </tr>
                    @endif
                @endforeach
               
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
@endsection