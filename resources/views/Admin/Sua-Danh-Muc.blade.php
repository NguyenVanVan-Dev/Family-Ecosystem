@extends('Admin-Layout')
@section('Admin_NoiDung')

<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                         <center> <h1>Sửa Danh Mục Sản Phẩm</h1></center> 
                        </header>
                         <?php
                         use Illuminate\Support\Facades\Session;
                            $message = Session::get('message');
                            if($message){
                                echo '  <div class="alert alert-success">
                                      <center>      <strong>Hoàn Thành!</strong> '. $message.'</center>
                                        </div>';
                                Session::put('message',null);
                            }
                            ?>
                        <div class="panel-body">
                        @foreach($category_edit as $key=>$edit_cate )
                            <div class="position-center">
                              
                                <form role="form" action="{{URL::to('/Cap-Nhat-Danh-Muc/'.$edit_cate->category_id)}}" method="post"> 
                                    {{ csrf_field() }}
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="InputDanhmuc">Tên danh mục</label>
                                                <input type="text" name="danhmuc_ten" class="form-control inputform" id="InputDanhmuc" placeholder="Tên Danh Mục" value="{{$edit_cate->category_name}}">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="InputSlug">Slug</label>
                                                <input type="text" name="danhmuc_slug" class="form-control inputform" id="InputSlug" placeholder="Tên Slug Danh Mục" value="{{$edit_cate->category_slug}}">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="InputSlug">Danh Mục Cha</label>
                                                <select name="danhmuc_parent" class="form-control inputform">
                                                <option value="0">Parent</option>
                                               <?php
                                                 showCategories($categories);
                                               ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label for="editor2">Mô tả danh mục</label> 
                                                <textarea style="resize: none" rows="4" class="form-control inputform" name="danhmuc_desc" id="editor2" placeholder="Mô Tả Danh Mục" value="">{{$edit_cate->category_desc}}</textarea>
                                              
                                                <script>
                                            CKEDITOR.replace( 'editor2' );
                                            </script>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="InputKey">Từ khóa danh mục</label>
                                                <textarea style="resize: none" rows="4" class="form-control inputform" name="danhmuc_key" id="InputKey" placeholder="Mô Tả Danh Mục" value="">{{$edit_cate->category_key}}</textarea>
                                                
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label for="SelectAnHien">Hiển thị</label>
                                                <select name="danhmuc_status" class="form-control input-sm m-bot15 inputform">
                                                    @if($edit_cate->category_status==1)
                                                    <option selected value="1">Hiển thị</option>
                                                    <option value="0">Ẩn</option>
                                                    @else
                                                    <option value="1">Hiển thị</option>
                                                    <option selected value="0">Ẩn</option>
                                                    @endif
                                                        
                                                </select>
                                               
                                            </div>
                                    
                                            <button type="submit" name="Luu-Danh-Muc" class="btn btn-info ">Cập Nhật Danh Mục</button>
                                        </div>
                                </form>
                            </div> 
                         @endforeach   
                        </div>
                    </section>

            </div>

@endsection
<?php
function showCategories($categories, $category_id = 0, $char = '')
{
    foreach ($categories as $key => $item)
    {
       
        // Nếu là chuyên mục con thì hiển thị
        if ($item->category_parent == $category_id)
        {
            
              echo '<option value="'.$item->category_id.'">'.$char.$item->category_name.'</option>';
            // Xóa chuyên mục đã lặp
            unset($categories[$key]);
             
            // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
            showCategories($categories, $item->category_id, $char.'--');
        }
    
    }
}
?>
