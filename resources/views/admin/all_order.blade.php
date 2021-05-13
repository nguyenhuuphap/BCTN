@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê danh sách đặt phòng
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
            <th>User_id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Check-in-date</th>
            <th>Check-in-time</th>
            <th>Price</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($items as $key => $value)
          <tr>
            <td>{{$value['book']['id']}}</td>
            <td>{{$value['book']['name']}}</td>
            <td>{{$value['book']['email']}}</td>
            <td>{{$value['book']['phone']}}</td>
            <td>{{$value['book']['checkindate']}}</td>
            <td>{{$value['book']['checkintime']}}</td>
            <td>{{$value['price']}}</td>
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