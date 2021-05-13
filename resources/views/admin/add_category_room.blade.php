@extends('admin_layout')
@section('admin_content')

<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm danh mục phòng
                        </header>
                        <div class="panel-body">
                            <?php
                                $message = Session::get('message');
                                if($message){
                                    echo '<span class ="text-alert">',$message,'</span>';
                                    session::put('message',null);
                                }
                            ?>
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/save-category-room')}}" method="post">
                                    {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên Loại</label>
                                    <input type="text" name="category_room_kind" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giá Giờ</label>
                                    <input type="text" name="price_gio" class="form-control" id="exampleInputEmail1" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giá Ngày</label>
                                    <input type="text" name="price_ngay" class="form-control" id="exampleInputEmail1" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label >Mô tả phòng</label>
                                    <textarea style="resize: none"rows="8" class="form-control" name="category_room_desc" id="ckeditor3" placeholder="Mô tả"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Trạng thái</label>
                                    <select name="category_room_status" class="form-control input-sm m-bot15">
                                        <option value="0">Hiện</option>
                                        <option value="1">Ẩn</option> 
                                    </select>  
                                </div>
                                
                                <button type="submit" name="add_category_room" class="btn btn-info">Thêm</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>

@endsection