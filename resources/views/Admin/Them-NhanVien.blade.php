@extends('Admin-Layout')
@section('Admin_NoiDung')

<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                        <center> <h1>Thêm Nhân Viên Điều Hành</h1></center> 
                        </header>
                        <?php
                         use Illuminate\Support\Facades\Session;
                            $message = Session::get('message');
                           
                            if($message){
                                echo ' <center><div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>Thông Báo!</strong> '.$message.'
                              </div></center>';
                                Session::put('message',null);
                            }
                            ?>
                        <div class="panel-body">

                            <div class="position-center">
                                <form role="form" action="{{URL::to('/Luu-NhanVien')}}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Họ Và Tên Nhân Viên</label>
                                    <input type="text" data-validation="length" data-validation-length="min10" data-validation-error-msg="Làm ơn điền ít nhất 10 ký tự" name="manage_name" class="form-control" id="exampleInputEmail1" placeholder="Tên Nhân Viên">
                                </div>
                                <div class="form-row">
                                <div class="form-group col-md-6">
                                        <label for="exampleInputEmail5">PassWord </label>
                                        <input type="password" name="manage_pass" class="form-control" id="exampleInputEmail5" placeholder="Mật Khẩu">
                                    </div>
                                    <!-- <div class="form-group col-md-6">
                                        <label for="exampleInputEmail5">Địa Chỉ </label>
                                        <input type="text" name="manage_address" class="form-control" id="exampleInputEmail5" placeholder="Địa Chỉ">
                                    </div> -->
                                    
                                    <div class="form-group col-md-3">
                                        <label for="exampleInputEmail4">Số Điện Thoại</label>
                                        <input type="text" data-validation="number" data-validation-error-msg="Điên Số DT Của Nhân Viên" name="manage_phone" class="form-control" id="exampleInputEmail4" placeholder="Số Điện Thoại">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="exampleInputEmail3">E-mail Nhân Viên</label>
                                        <input type="text" name="manage_email" class="form-control" id="exampleInputEmail3" placeholder="E-mail">
                                    </div>
                                   
                                    <div class="form-group col-md-3">
                                        <label for="exampleInputPassword1">Phân Quyền</label>
                                        <select name="manage_decentralization" class="form-control input-sm m-bot15">
                                                <option value="0">Admin</option>

                                                <option value="1">Nhân Viên </option>   
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="exampleInputEmail3">Hình ảnh Nhân Viên</label>
                                        <input type="file" name="manage_image" class="form-control" id="exampleInputEmail3">
                                    </div>
                                </div>    
                              
                               
                                <button type="submit"  class="btn btn-info">Thêm Nhân Viên</button>
                                </form>
                            </div>

                        </div>
                    </section>

            </div>
@endsection
