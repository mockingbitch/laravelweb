<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Hội quán &mdash; trang chủ</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Free HTML5 Website Template by freehtml5.co" />
    <meta name="keywords"
        content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
    <meta name="author" content="freehtml5.co" />
    <!-- Facebook and Twitter integration -->
    <meta property="og:title" content="" />
    <meta property="og:image" content="" />
    <meta property="og:url" content="" />
    <meta property="og:site_name" content="" />
    <meta property="og:description" content="" />
    <meta name="twitter:title" content="" />
    <meta name="twitter:image" content="" />
    <meta name="twitter:url" content="" />
    <meta name="twitter:card" content="" />

    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:400,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Sacramento" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&family=Dancing+Script:wght@700&family=Noto+Sans&display=swap"
        rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Animate.css -->
    <link rel="stylesheet" href="{{ url('public/frontend') }}/css/animate.css">
    <!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="{{ url('public/frontend') }}/css/icomoon.css">
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="{{ url('public/frontend') }}/css/bootstrap.css">

    <!-- Magnific Popup -->
    <link rel="stylesheet" href="{{ url('public/frontend') }}/css/magnific-popup.css">

    <!-- Flexslider  -->
    <link rel="stylesheet" href="{{ url('public/frontend') }}/css/flexslider.css">

    <!-- Theme style  -->
    <link rel="stylesheet" href="{{ url('public/frontend') }}/css/style.css">
    <link rel="stylesheet" href="{{ url('public/frontend') }}/css/sweetalert.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!-- Modernizr JS -->
    <script src="{{ url('public/frontend') }}/js/modernizr-2.6.2.min.js"></script>
    <!-- FOR IE9 below -->
    <!--[if lt IE 9]>
 <script src="js/respond.min.js"></script>
 <![endif]-->

</head>
<style>
    .search-box{
        margin: 0px;
  padding: 0px;
  width: 100vw;
  height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  background-color: #130f40;
  font-family: 'Lato' !important;
  width: fit-content;
  height: fit-content;
  position: relative;
}
.input-search{
  height: 50px;
  width: 50px;
  border-style: none;
  padding: 10px;
  font-size: 18px;
  letter-spacing: 2px;
  outline: none;
  border-radius: 25px;
  transition: all .5s ease-in-out;
  background-color: #22a6b3;
  padding-right: 40px;
  color:#fff;
}
.input-search::placeholder{
  color:rgba(255,255,255,.5);
  font-size: 18px;
  letter-spacing: 2px;
  font-weight: 100;
}
.btn-search{
  width: 50px;
  height: 50px;
  border-style: none;
  font-size: 20px;
  font-weight: bold;
  outline: none;
  cursor: pointer;
  border-radius: 50%;
  position: absolute;
  right: 0px;
  color:#ffffff ;
  background-color:transparent;
  pointer-events: painted;  
}
.btn-search:focus ~ .input-search{
  width: 300px;
  border-radius: 0px;
  background-color: transparent;
  border-bottom:1px solid rgba(255,255,255,.5);
  transition: all 500ms cubic-bezier(0, 0.110, 0.35, 2);
}
.input-search:focus{
  width: 300px;
  border-radius: 0px;
  background-color: transparent;
  border-bottom:1px solid rgba(255,255,255,.5);
  transition: all 500ms cubic-bezier(0, 0.110, 0.35, 2);
}
</style>
<body>

    <div class="fh5co-loader"></div>

    <div id="page">
        <nav class="fh5co-nav" role="navigation">
            <div class="container-fluid">
                <div class="row">
                    <div class="top-menu">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-7 text-left menu-1">
                                    <ul>
                                        <li class="active"><a href="{{ URL::to('/home') }}">Trang chủ</a></li>
                                        <li><a href="">Giới thiệu</a></li>
                                        <li class="has-dropdown">
                                            <a>Tổng hợp</a>
                                            <ul class="dropdown">
                                                <li><a href="#">Post mới</a></li>
                                                <li><a href="{{ URL::to('/product') }}">Sản phẩm</a></li>
                                                <li><a href="#">API</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="">Về chúng tôi</a></li>
                                        <li class="has-dropdown">
                                        {{-- <a href="#"><i class="material-icons">search</i></a>
                                            <ul class="dropdown">
                                                <li>
                                                    <form action="{{ URL::to('/ket-qua-tim-kiem') }}" method="post">
                                                        {{ csrf_field() }}
                                                        <div class="search_box pull-right">
                                                            <input type="text" name="keysearch"
                                                                placeholder="Tìm kiếm sản phẩm" />
                                                            <input type="submit" name="searchbutton" value="Search"
                                                                class="btn btn-primary">
                                                        </div>
                                                    </form>
                                                </li>
                                            </ul> --}}
                                               <div class="search-box">

                                                <button class="btn-search"><i class="fas fa-search"></i></button>
                                                <input type="text" class="input-search" placeholder="Type to Search...">
                                            </div>
                                        </li>

                                    </ul>
                                </div>

                                <div class="col-sm-3">
                                    <ul class="fh5co-social-icons">
                                        <li><a href="admin/index.php"><input type="submit" value="Login"
                                                    class="btn btn-primary"></a></li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 text-center menu-2">
                        <div id="fh5co-logo">
                            <h1>
                                <a href="{{ URL::to('/home') }}">
                                    HoiQuan
                                    <span>.vn</span>
                                </a>
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <!-- ========================================= -->
        @yield('content')

        {{-- <div id="fh5co-instagram">
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-12 col-md-offset-0 text-center fh5co-heading">
					<h2><span>Instagram Posts</span></h2>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3 nopadding animate-box" data-animate-effect="fadeIn">
				<div class="insta" style="background-image: url(images/insta-1.jpg);"></div>
			</div>
			<div class="col-md-3 nopadding animate-box" data-animate-effect="fadeIn">
				<div class="insta" style="background-image: url(images/insta-2.jpg);"></div>
			</div>
			<div class="col-md-3 nopadding animate-box" data-animate-effect="fadeIn">
				<div class="insta" style="background-image: url(images/insta-3.jpg);"></div>
			</div>
			<div class="col-md-3 nopadding animate-box" data-animate-effect="fadeIn">
				<div class="insta" style="background-image: url(images/insta-4.jpg);"></div>
			</div>
		</div>
	</div> --}}

        <footer id="fh5co-footer" role="contentinfo">
            <div class="container">
                <div class="row row-pb-md">
                    <div class="col-md-4 fh5co-widget">
                        <h3>Hội Quán</h3>
                        <p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit. Eos cumque dicta
                            adipisci architecto culpa amet.</p>
                    </div>
                    <div class="col-md-4 col-md-push-1">
                        <h3>Links</h3>
                        <ul class="fh5co-footer-links">
                            <li><a href="{{ URL::to('/home') }}">Trang chủ</a></li>
                            <li><a href="#">Giới thiệu</a></li>
                            <li><a href="#">Bài viết</a></li>
                            <li><a href="#">Về chúng tôi</a></li>
                            <li><a href="#">Liên hệ</a></li>
                        </ul>
                    </div>

                    <div class="col-md-4 col-md-push-1">
                        <h3>Thông tin liên hệ</h3>
                        <ul class="fh5co-footer-links">
                            <li>250 <br> Kim Giang, Hoàng Mai, HN</li>
                            <li><a href="tel://1234567920">+ 1235 2355 98</a></li>
                            <li><a href="mailto:info@yoursite.com">info@hoiquan.com</a></li>
                        </ul>
                    </div>

                </div>

                <div class="row copyright">
                    <div class="col-md-12 text-center">
                        <p>
                            <small class="block">&copy; 2021 All Rights Reserved.</small>
                            <small class="block">Designed by <a href="" target="_blank">Jarvis Phong Trần iu
                                    Nguyễn Thu Ngân</a> </small>
                        </p>
                        <p>
                        <ul class="fh5co-social-icons">
                            <li><a href="#"><i class="icon-twitter"></i></a></li>
                            <li><a href="#"><i class="icon-facebook"></i></a></li>
                            <li><a href="#"><i class="icon-linkedin"></i></a></li>
                            <li><a href="#"><i class="icon-dribbble"></i></a></li>
                        </ul>
                        </p>
                    </div>
                </div>

            </div>
        </footer>
    </div>

    <div class="gototop js-top">
        <a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
    </div>

    <!-- jQuery -->
    <script src="{{ url('public/frontend') }}/js/jquery.min.js"></script>
    <!-- jQuery Easing -->
    <script src="{{ url('public/frontend') }}/js/jquery.easing.1.3.js"></script>
    <!-- Bootstrap -->
    <script src="{{ url('public/frontend') }}/js/bootstrap.min.js"></script>
    <!-- Waypoints -->
    <script src="{{ url('public/frontend') }}/js/jquery.waypoints.min.js"></script>
    <!-- Flexslider -->
    <script src="{{ url('public/frontend') }}/js/jquery.flexslider-min.js"></script>
    <!-- Magnific Popup -->
    <script src="{{ url('public/frontend') }}/js/jquery.magnific-popup.min.js"></script>
    <script src="{{ url('public/frontend') }}/js/magnific-popup-options.js"></script>
    <!-- Main -->
    <script src="{{ url('public/frontend') }}/js/main.js"></script>
    <script src="{{ url('public/frontend') }}/js/sweetalert.js"></script>
    {{-- <script type="text/javascript">
        $(document).ready(function() {
            $('.add-to-cart-success').click(function() {
                var id = $(this).data('id_product');
                var cart_pr_id = $('.cart_pr_id_'+id).val();
                var cart_pr_name = $('.cart_pr_name_'+id).val();
                var cart_pr_price = $('.cart_pr_price_'+id).val();
                var cart_pr_img = $('.cart_pr_img_'+id).val();
                var cart_pr_qty = $('.cart_pr_qty_'+id).val();
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url:'{{url('/add-to-cart')}}',
                    method:'POST',
                    data:{ cart_pr_id:cart_pr_id, cart_pr_name:cart_pr_name, cart_pr_price:cart_pr_price, cart_pr_img:cart_pr_img, cart_pr_qty:cart_pr_qty, _token:_token},
                    success: function(data){
                       
                    }
                });
                swal("Thêm thành công!", "Đã thêm vào giỏ hàng!", "success");
            })
        });
    </script> --}}
    <script type="text/javascript">
        $(document).ready(function() {
            $('.add-to-cart').click(function() {
                var id = $(this).data('id_product');
                var cart_pr_id = $('.cart_pr_id_' + id).val();
                var cart_pr_name = $('.cart_pr_name_' + id).val();
                var cart_pr_img = $('.cart_pr_img_' + id).val();
                var cart_pr_price = $('.cart_pr_price_' + id).val();
                var cart_pr_qty = $('.cart_pr_qty_' + id).val();
                var _token = $('input[name="_token"]').val();


                $.ajax({
                    url: '{{ url('/add-to-cart') }}',
                    method: 'POST',
                    data: {
                        cart_pr_id: cart_pr_id,
                        cart_pr_name: cart_pr_name,
                        cart_pr_img: cart_pr_img,
                        cart_pr_price: cart_pr_price,
                        cart_pr_qty: cart_pr_qty,
                        _token: _token
                    },
                    success: function() {
                        swal({
                                title: "Đã thêm sản phẩm vào giỏ hàng",
                                text: "Bạn có thể mua hàng tiếp hoặc tới giỏ hàng để tiến hành thanh toán",
                                showCancelButton: true,
                                cancelButtonText: "Xem tiếp",
                                confirmButtonClass: "btn-success",
                                confirmButtonText: "Đi đến giỏ hàng",
                                closeOnConfirm: false
                            },
                            function() {
                                window.location.href = "{{ url('/check-out') }}";
                            });

                    }

                });
            });
        });
    </script>



</body>

</html>
