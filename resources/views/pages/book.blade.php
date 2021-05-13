@extends('layout')
@section('content')
<section class="w3l-availability-form" id="booking">
    <!-- /w3l-availability-form-section -->
    <div class="w3l-availability-form-main py-5">
        <div class="container pt-lg-3 pb-lg-5">
            <div class="forms-top">
                <div class="form-right">
                    
                    <div class="form-inner-cont">

                        <h3 class="title-small">Check Availability</h3>
                        
                            <form action="/bookinghotel/dat-phong" method="post">
                                @csrf
                                <input type="hidden" name="room_id" value="{{$index}}">
                            <div class="row book-form">
                                <div class="form-input col-md-4 col-sm-6 mt-3">
                                    <label>Name </label>
                                    <input type="text" name="name" placeholder="Name" required />
                                </div>
                                <div class="form-input col-md-4 col-sm-6 mt-3">
                                    <label>Email </label>
                                    <input type="email" name="email" placeholder="Email" required />
                                </div>
                                <div class="form-input col-md-4 col-sm-6 mt-3">
                                    <label>Phone </label>
                                    <input type="text" name="phone" placeholder="Phone" required />
                                </div>
                                <div class="form-input col-md-4 col-sm-6 mt-3">
                                    <label>Check-in Date</label>
                                    <input type="date" name="checkindate" placeholder="Date" required="">
                                </div>
                                <div class="form-input col-md-4 col-sm-6 mt-3">
                                    <label>Check-in time</label>
                                    <input type="time" name="checkintime" placeholder="Date" required="">
                                </div>
                                <div class="form-input col-md-4 col-sm-6 mt-3">
                                    <label>Kind of room</label>
                                <select class="selectpicker"id="loaiphong" name="loaiphong" required onchange="setPrice()">
                                
                                    @foreach($room_kind as $key=>$item)            
                                        <option class="form-control" data-day="{{$room->price_ngay}}" data-hour="           {{$room->price_gio}}" value="{{$room->cate_id}} " <?php if ($room->category_id == $item->cate_id): ?>
                                            selected
                                        <?php endif ?>>{{$item->category_kind}} 
                                        </option>
                                    @endforeach
                                 </select>

                                </div>
                                <div class="form-input col-md-4 col-sm-6 mt-3">
                                    <label>Booking method</label>
                                    <select class="selectpicker"id="phuongthuc" name="phuongthuc" required onchange="setPrice()">
                                    <option value="1" selected>Giờ</option>
                                    <option value="2">Ngày</option>
                                    </select>

                                </div>
                                <div class="form-input col-md-4 col-sm-6 mt-3">
                                    <label>Time </label>
                                    <input id="thoigian" type="text" name="thoigian" value="0" required onkeyup="setPrice()">
                                </div>
                                <div class="form-input col-md-4 col-sm-6 mt-3">
                                    <label>Price </label>
                                    <strong class="form-control" id="price"></strong>
                                </div>
                                <div class="bottom-btn col-md-4 col-sm-6 mt-3">
                                    <label>Check availability </label>
                                    <button class="btn btn-style btn-primary w-100 px-2">Check Availability</button>
                                </div>
                            </div>
                        </form>
                        
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</section>
<script src="{{asset('public/frontend/assets/js/jquery.min.js')}}"></script>
    <script>

        $('.form-control').each(function () {
            floatedLabel($(this));
        });

        $('.form-control').on('input', function () {
            floatedLabel($(this));
        });

        function floatedLabel(input) {
            var $field = input.closest('.form-group');
            if (input.val()) {
                $field.addClass('input-not-empty');
            } else {
                $field.removeClass('input-not-empty');
            }
        }

       
        
    </script>
    <script type="text/javascript">
        window.onload = function(){
            setPrice()
        }
        function setPrice(){
            var phuongthuc = document.getElementById("phuongthuc")
            var loaiphong = document.getElementById("loaiphong")
            var thoigian = document.getElementById("thoigian")
            var temp = loaiphong.options[loaiphong.selectedIndex].dataset
            price = phuongthuc.value==1?temp.hour:temp.day
            var time = thoigian.value
            document.getElementById('price').textContent = price * time 
            console.log(price)
        }

        
    </script>
    <!-- <script type="text/javascript">
        window.onload = function(){
            var price = document.getElementById('price').value
            var basicPrice = document.getElementById('basicPrice').value
            price = totalPrice(loaiphong,thoigian,phuongthuc,basicPrice)

        }
        function totalPrice(loaiphong,thoigian,phuongthuc,basicPrice){
            l=0
            t=0
            p=0
            switch(loaiphong){
                case 1 : l=1.5;break;
                case 3 : l=2;break;
                default:l=1;
            }
            switch(phuongthuc){
                case 1 : l=1.5;break;
                case 3 : l=2;break;
                default:l=1;
            }
        }
    </script> -->
    <script type="text/javascript">
        $( document ).ready(function() {
            console.log( "ready!" );
        });
    </script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
@endsection