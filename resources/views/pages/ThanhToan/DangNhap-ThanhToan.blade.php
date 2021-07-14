@extends('layout')
@section('content')
    <div class="container-filed">
        <div class="form-checkout">       
                <div class="form-box">
                    <div class="button-box">
                        
                        <div id="btn"></div>
                        <button type="button" class="toggle-btn" onclick="login()">Đăng Nhập</button>
                        <button type="button" class="toggle-btn" onclick="register()">Đăng Kí</button>
                    </div>
                     <div class="social-icons">
                        <img src="{{URL::TO('/public/frontend/images/zalo1.jpg')}}" alt="">
                        <img src="{{URL::TO('/public/frontend/images/zalo1.jpg')}}" alt="">
                        <img src="{{URL::TO('/public/frontend/images/zalo1.jpg')}}" alt="">                        
                    </div>
                    <h4> 
                            <?php
                            Use Illuminate\Support\Facades\Session;
                            $mes =Session::get('mes');
                            if($mes){
                                echo ' <center><div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>Thông Báo!</strong> '.$mes.'
                              </div></center>';
                                Session::put('mes',null);
                            }
                            
                            ?>
                    </h4>
                    <form action="{{URL::TO('/Dang-Nhap')}}" class="input-group" id="login" method="post">
                    {{ csrf_field() }}
                        <input type="email" name="email_account" id="" class="input-field" placeholder="Nhập E-mail" required>
                        <input type="password" name="pass_account" id="" class="input-field" placeholder="Nhập Pass" required>                         
                        <input type="checkbox" name="" id="" class="check-box" style=" margin: 30px 10px 30px 0;"><span>Nhớ Mật Khẩu</span>
                        <button type="submit" class="submit-btn" >Đăng Nhập</button>
                    </form>
                    <form action="{{URL::TO('/Them-Khach-Hang')}}" class="input-group" id="register" method="post">
                    {{ csrf_field() }}
                        <input type="text" name="customer_name" id="" class="input-field" placeholder="Họ Và Tên" required> 
                        <input type="email" name="customer_email" id="" class="input-field" placeholder="Nhập E-mail" required>
                        <input type="password" name="customer_pass" id="" class="input-field" placeholder="Nhập Pass" required>                   
                        <input type="password" name="customer_repeat" id="" class="input-field" placeholder="Nhập Lại Pass" required> 
                        <input type="checkbox" name="" id="" class="check-box" style=" margin: 30px 10px 30px 0;"> <span>Đồng Ý Với Các Điều Khoản</span>
                        <button type="submit" class="submit-btn"> Đăng Kí</button>
                    </form>
                    
                </div>
        </div>
    </div>
        <script>
            var x= document.getElementById("login");
            var y =document.getElementById("register");
            var z = document.getElementById("btn");
            function register(){
                x.style.left="-400px"
                y.style.left="50px"
                z.style.left="120px"
            }
            function login(){
                x.style.left="50px"
                y.style.left="450px"
                z.style.left="0px"
            }
        </script>
 



@endsection