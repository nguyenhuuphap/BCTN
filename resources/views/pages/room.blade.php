@extends('layout')
@section('content')

<section class="w3l-feature-2">
    @include('message')

    <div class="col-md-2 float-right m-5">
        <div class="list-group">
            <a href="#" class="list-group-item list-group-item-action active">
              Loại phòng
            </a>
            <?php foreach ($categories as $key => $value): ?>
                 <a href="{{URL::to('category-kind/'.$value->cate_id)}}" class="list-group-item list-group-item-action">{{$value->category_kind}}</a>
            <?php endforeach ?>
           
            
        </div>

    </div>
    <div class="grid top-bottom py-5">
        <div class="container py-md-5">
            <h3 class="title-big text-center">Our Rooms are beautifully designed</h3>
            <div class="middle-section row mt-lg-5 pt-md-3">
                <?php foreach ($rooms as $key => $room): ?>
                    <div class="three-grids-columns col-lg-4 col-md-6 mt-md-0 mt-4">
                        <img src="{{('public/uploads/room/'.$room->room_image)}}" alt="" class="img-fluid">
                        <div class="info">
                           <div class="room-info">
                            <h3 class="room-title"><a href="room-single.html">PN Hotel</a></h3>
                            <ul class="mb-3">
                                <li><span class="fa fa-users"></span>Số phòng:{{$room->room_name}}</li>
                                <li><span class="fa fa-bed"></span>Loại phòng:{{$room->category_kind}}</li>
                            </ul>
                            <p>{{$room->room_desc}}</p>
                            <a href="{{URL::to('dat-phong/'.$room -> room_id)}}" class="btn btn-Light">Book Now</a>
                        </div>
                      </div>
                    </div>
                    <?php endforeach ?>

                </div>
            </div>
        </div>
    </section> 


    <button onclick="topFunction()" id="movetop" title="Go to top">
      &#10548;
  </button>
  <script>
  // When the user scrolls down 20px from the top of the document, show the button
  window.onscroll = function () {
    scrollFunction()
};

function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
      document.getElementById("movetop").style.display = "block";
  } else {
      document.getElementById("movetop").style.display = "none";
  }
}

  // When the user clicks on the button, scroll to the top of the document
  function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}
</script>
<!-- /move top -->
</section>

<!-- Template JavaScript -->
<script src="assets/js/jquery-3.3.1.min.js"></script>

<script src="assets/js/owl.carousel.js"></script>
<!-- script for banner slider-->
<script>
  $(document).ready(function () {
    $('.owl-one').owlCarousel({
      loop: true,
      margin: 0,
      nav: false,
      responsiveClass: true,
      autoplay: false,
      autoplayTimeout: 5000,
      autoplaySpeed: 1000,
      autoplayHoverPause: false,
      responsive: {
        0: {
          items: 1,
          nav: false
      },
      480: {
          items: 1,
          nav: false
      },
      667: {
          items: 1,
          nav: true
      },
      1000: {
          items: 1,
          nav: true
      }
  }
})
})
</script>
<!-- //script -->

<!-- script for owlcarousel -->
<script>
  $(document).ready(function () {
    $('.owl-testimonial').owlCarousel({
      loop: true,
      margin: 0,
      nav: true,
      responsiveClass: true,
      autoplay: false,
      autoplayTimeout: 5000,
      autoplaySpeed: 1000,
      autoplayHoverPause: false,
      responsive: {
        0: {
          items: 1,
          nav: false
      },
      480: {
          items: 1,
          nav: false
      },
      667: {
          items: 1,
          nav: true
      },
      1000: {
          items: 1,
          nav: true
      }
  }
})
})
</script>
<!-- //script for owlcarousel -->
<script src="assets/js/jquery.magnific-popup.min.js"></script>
<script>
  $(document).ready(function () {
    $('.popup-with-zoom-anim').magnificPopup({
      type: 'inline',

      fixedContentPos: false,
      fixedBgPos: true,

      overflowY: 'auto',

      closeBtnInside: true,
      preloader: false,

      midClick: true,
      removalDelay: 300,
      mainClass: 'my-mfp-zoom-in'
  });

    $('.popup-with-move-anim').magnificPopup({
      type: 'inline',

      fixedContentPos: false,
      fixedBgPos: true,

      overflowY: 'auto',

      closeBtnInside: true,
      preloader: false,

      midClick: true,
      removalDelay: 300,
      mainClass: 'my-mfp-slide-bottom'
  });
});
</script>


<!-- disable body scroll which navbar is in active -->
<script>
    $(function () {
      $('.navbar-toggler').click(function () {
        $('body').toggleClass('noscroll');
    })
  });
</script>
<!-- disable body scroll which navbar is in active -->

<script src="assets/js/bootstrap.min.js"></script>
@endsection