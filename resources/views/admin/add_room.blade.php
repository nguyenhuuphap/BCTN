@extends('admin_layout')
@section('admin_content')

<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm phòng
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
                                <form role="form" action="{{URL::to('/save-room')}}" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Số phòng</label>
                                    <input type="text" name="room_name" class="form-control" id="exampleInputEmail1" placeholder="Nhập giá phòng">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Loại phòng</label>
                                    <select name="room_cate" class="form-control input-sm m-bot15">
                                        @foreach($cate_room as $key => $cate)
                                        <option value="{{$cate->cate_id}}">{{$cate->category_kind}}</option>
                                        @endforeach
                                    </select>  
                                </div>
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Dịch vụ</label>
                                    <select name="room_service" class="form-control input-sm m-bot15">
                                        @foreach($service_room as $key => $service)
                                        <option value="{{$service->service_id}}">{{$service->service_name}}</option>
                                        @endforeach
                                    </select>  
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giá phòng</label>
                                    <input type="text" name="room_price" class="form-control" id="exampleInputEmail1" placeholder="Nhập giá phòng">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh phòng</label>
                                    <input type="file" name="room_image" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="form-group">
                                    <label >Mô tả phòng</label>
                                    <textarea style="resize: none"rows="8" class="form-control" name="room_desc" id="ckeditor3" placeholder="Mô tả"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Trạng thái</label>
                                    <select name="room_status" class="form-control input-sm m-bot15">
                                        <option value="0">Hiện</option>
                                        <option value="1">Ẩn</option> 
                                    </select>  
                                </div>
                                
                                <button type="submit" name="add_room" class="btn btn-info">Thêm Phòng</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>

@endsection