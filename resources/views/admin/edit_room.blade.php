@extends('admin_layout')
@section('admin_content')

<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Cập nhật phòng
                        </header>
                        <div class="panel-body">
                            <?php
                                $message = Session::get('message');
                                if($message){
                                    echo '<span class ="text-alert">',$message,'</span>';
                                    session::put('message',null);
                                }
                            ?>
                           
                                
                            <?php foreach ($edit_room_cate as $key => $value): ?>
                                                          <div class="position-center">
                                <form role="form" action="{{URL::to('/update-room/'.$value->room_id)}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Số phòng</label>
                                    <input type="text" name="room_name" class="form-control" id="exampleInputEmail1" value="{{$value->room_name}}">
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
                                    <input type="text" name="room_price" value="{{$value->room_price}}" class="form-control" id="exampleInputEmail1" placeholder="Nhập giá phòng">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh phòng</label>
                                    <input type="file" name="room_img" class="form-control" id="exampleInputEmail1">
                                    <img src="{{asset('/public/uploads/room/'.$value->room_image)}}" width="200px" height="200px">
                                    <input type="hidden" name="room_img_old" value="{{$value->room_image}}">
                                </div>
                                <div class="form-group">
                                    <label >Mô tả phòng</label>
                                    <textarea style="resize: none"rows="8" class="form-control" name="room_desc" id="ckeditor3" placeholder="Mô tả">
                                        {{$value->room_desc}}
                                    </textarea>
                                </div>
                                
                                <button type="submit" name="edit_room" class="btn btn-info">Cập Nhật Phòng</button>
                            </form>
                            </div>  
                            <?php endforeach ?>

                            

                        </div>
                    </section>

            </div>

@endsection