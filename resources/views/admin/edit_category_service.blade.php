@extends('admin_layout')
@section('admin_content')

<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Cập nhật danh mục dịch vụ
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
                    @foreach($edit_category_service as $key => $service_value)
                        <form role="form" action="{{URL::to('/update-category-service/'.$service_value->service_id)}}" method="post">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên dịch vụ</label>
                                <input type="text" value="{{$service_value->service_name}}" name="category_service_name" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                            </div>
                            <div class="form-group">
                                <label >Mô tả dịch vụ</label>
                                <textarea style="resize: none"rows="8" class="form-control" name="category_service_desc" id="ckeditor3" placeholder="Mô tả" value="{{$service_value->service_desc}}"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Trạng thái</label>
                                <select name="category_service_status" class="form-control input-sm m-bot15">
                                    <option value="0">Ẩn</option>
                                    <option value="1">Hiện</option> 
                                </select>  
                            </div>

                            <button type="submit" name="edit_category_service" class="btn btn-info">Cập nhật dịch vụ</button>
                        </form>
                    @endforeach

                </div>

            </div>
        </section>

    </div>

    @endsection