@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê danh mục phòng
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
        <div class="input-group">
          <input type="text" class="input-sm form-control" placeholder="Search">
          <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="button">Go!</button>
          </span>
        </div>
      </div>
    </div>
    <div class="table-responsive">
      <?php
      $message = Session::get('message');
      if($message){
        echo '<span class ="text-alert">',$message,'</span>';
        session::put('message',null);
      }
      ?>
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th>
            <th>Tên loại</th>
            <th>Trạng thái</th>
            <th>Giá giờ</th>
            <th>Giá ngày</th>
            <th>Ngày thêm</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($all_category_room as $key => $cate_room)
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{$cate_room ->category_kind}}</td>
            <td>
              <span class="text-ellipsis">
                <?php
                if($cate_room->category_status==0){
                  ?>
                  <a href="{{URL::to('/unactive-category-room/'. $cate_room->cate_id)}}"><span class="fa-thumb-styling fa fa-thumbs-up"></span></a>
                  <?php
                } else{
                  ?>
                  <a href="{{URL::to('/active-category-room/'. $cate_room->cate_id)}}"><span class="fa-thumb-styling fa fa-thumbs-down"></span></a>
                  <?php
                }
                ?>
              </span>
            </td>
            <td>{{$cate_room ->price_gio}}$</td>
            <td>{{$cate_room ->price_ngay}}$</td>
            <td>{{$cate_room ->created_at}}</td>
            <td>
              <a href="{{URL::to('/edit-category-room/'. $cate_room->cate_id)}}" class="active" ui-toggle-class="">
                <i class="fa fa-check text-success text-active"></i>
                <a onclick="return confirm('Are you sure?')" href="{{URL::to('/delete-category-room/'. $cate_room->cate_id)}}" class="active" ui-toggle-class="">
                  <i class="fa fa-times text-danger text"></i></a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <footer class="panel-footer">
          <div class="row">

            <div class="col-sm-5 text-center">
              <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
            </div>
            <div class="col-sm-7 text-right text-center-xs">                
              <ul class="pagination pagination-sm m-t-none m-b-none">
                <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
                <li><a href="">1</a></li>
                <li><a href="">2</a></li>
                <li><a href="">3</a></li>
                <li><a href="">4</a></li>
                <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
              </ul>
            </div>
          </div>
        </footer>
      </div>
    </div>
    @endsection