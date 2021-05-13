@extends('admin_layout')
@section('admin_content')

<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Cập nhật danh mục phòng
                        </header>
                        <div class="panel-body">
                            <?php
                                $message = Session::get('message');
                                if($message){
                                    echo '<span class ="text-alert">',$message,'</span>';
                                    session::put('message',null);
                                }
                            ?>
                            @foreach($edit_category_room as $key => $edit_value)
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/update-category-room/'.$edit_value->cate_id)}}" method="post">
                                    {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên Loại</label>
                                    <input type="text" value="{{$edit_value->category_kind}}" name="category_room_kind" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                                </div>
                                <div class="form-group">
                                    <label >Mô tả phòng</label>
                                    <textarea style="resize: none"rows="8" class="form-control" name="category_room_desc" id="ckeditor3" value="{{$edit_value->category_desc}}" placeholder="Mô tả"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giá Giờ</label>
                                    <input type="text" name="price_gio" class="form-control" id="exampleInputEmail1" placeholder="" value="{{$edit_value->price_gio}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giá Ngày</label>
                                    <input type="text" name="price_ngay" class="form-control" id="exampleInputEmail1" placeholder="" value="{{$edit_value->price_ngay}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Trạng thái</label>
                                    <select name="category_room_status" class="form-control input-sm m-bot15">
                                        <option value="0">Ẩn</option>
                                        <option value="1">Hiện</option> 
                                    </select>  
                                </div>
                                
                                <button type="submit" name="edit_category_room" class="btn btn-info">Cập nhật</button>
                            </form>
                            </div>
                            @endforeach
                        </div>
                    </section>

            </div>

@endsection