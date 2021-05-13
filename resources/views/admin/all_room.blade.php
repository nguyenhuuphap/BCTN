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
  <div class="col-sm-3 abcass">
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
    <th>Số phòng</th>
    <th>Loại phòng</th>
    <th>Dịch vụ</th>
    <th>Giá phòng</th>
    <th>Hình ảnh phòng</th>
    <th>Trạng thái</th>
    <th style="width:30px;"></th>
</tr>
</thead>
<tbody>
    @foreach($all_room as $key => $room_value)
    <tr>
        <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
        <td>{{$room_value ->room_name}}</td>
        <td>{{$room_value ->category_kind}}</td>
        <td>{{$room_value ->service_name}}</td>
        <td>{{$room_value ->room_price}}</td>
        <td>
            <img src="{{asset('/public/uploads/room/'.$room_value->room_image)}}" width="150px">
        </td>
    <td><span class="text-ellipsis">
              <?php
                if($room_value->room_status==0){
              ?>
                  <a href="{{URL::to('/unactive-room/'. $room_value->room_id)}}"><span class="fa-thumb-styling fa fa-thumbs-up"></span></a>
              <?php
                } else{
              ?>
                  <a href="{{URL::to('/active-room/'. $room_value->room_id)}}"><span class="fa-thumb-styling fa fa-thumbs-down"></span></a>
              <?php
                }
              ?>
  </span></td>
  <td>
      <a href="{{URL::to('/edit-room/'. $room_value->room_id)}}" class="active" ui-toggle-class="">
        <i class="fa fa-check text-success text-active"></i>
      <a onclick="return confirm('Are you sure?')" href="{{URL::to('/delete-room/'. $room_value->room_id)}}" class="active" ui-toggle-class="">
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