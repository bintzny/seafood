<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
    <title>Seafood</title>
    <link href="{{asset('fontend/css/bootstrap.css')}}" rel="stylesheet" type="text/css" media="all"/>
    <!--jQuery(necessary for Bootstrap's JavaScript plugins)-->
    <script src="{{asset('fontend/js/jquery-1.11.0.min.js')}}"></script>
    <!--Custom-Theme-files-->
    <!--theme-style-->
    <link href="{{asset('fontend/css/style.css')}}" rel="stylesheet" type="text/css" media="all"/>
    <!--//theme-style-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="keywords" content="Luxury Watches Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design"/>
    <script type="application/x-javascript"> addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);
        function hideURLbar() {
            window.scrollTo(0, 1);
        } </script>
    <!--start-menu-->
    <script src="{{asset('fontend/js/simpleCart.min.js')}}"></script>
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link href="{{asset('fontend/css/memenu.css')}}" rel="stylesheet" type="text/css" media="all"/>
    <script type="text/javascript" src="{{asset('fontend/js/memenu.js')}}"></script>
    <script>$(document).ready(function () {
            $(".memenu").memenu();
        });</script>
    <!--dropdown-->
    <script src="{{asset('fontend/js/jquery.easydropdown.js')}}"></script>
</head>
<body>
<!--top-header-->
<div class="top-header">
    <div class="container">
        {{--<div class="top-header-main">--}}
        {{--<div class="col-md-6 top-header-left">--}}
        {{--<div class="drop">--}}
        {{--<div class="box">--}}
        {{--<select tabindex="4" class="dropdown drop">--}}
        {{--<option value="" class="label">Dollar :</option>--}}
        {{--<option value="1">Dollar</option>--}}
        {{--<option value="2">Euro</option>--}}
        {{--</select>--}}
        {{--</div>--}}
        {{--<div class="box1">--}}
        {{--<select tabindex="4" class="dropdown">--}}
        {{--<option value="" class="label">English :</option>--}}
        {{--<option value="1">English</option>--}}
        {{--<option value="2">French</option>--}}
        {{--<option value="3">German</option>--}}
        {{--</select>--}}
        {{--</div>--}}
        {{--<div class="clearfix"></div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<div class="col-md-6 top-header-left">--}}
        {{--<div class="cart box_1">--}}
        {{--<a href="checkout.html">--}}
        {{--<div class="total">--}}
        {{--<span class="simpleCart_total"></span></div>--}}
        {{--<img src="{{asset('fontend/images/cart-1.png')}}" alt="" />--}}
        {{--</a>--}}
        {{--<p><a href="javascript:;" class="simpleCart_empty">Empty Cart</a></p>--}}
        {{--<div class="clearfix"> </div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<div class="clearfix"></div>--}}
        {{--</div>--}}
    </div>
</div>
<!--top-header-->
<!--start-logo-->
<div class="logo">
    <a href="index.html"><h1>SeaFood</h1></a>
</div>
<!--start-logo-->
<!--bottom-header-->
<div class="header-bottom">
    <div class="container">
        <div class="header">
            <div class="col-md-9 header-left">
                <div class="top-nav">
                    <ul class="memenu skyblue">
                        <li class="active"><a href="/">หน้าหลัก</a></li>
                        <li class="grid"><a href="#">สินค้าและบริการ</a>
                            <div class="mepanel">
                                <div class="row">
                                    <div class="col1 me-one">
                                        <h3>กุ้ง</h3>
                                        <ul>
                                            <li><a href="products.html">กุ้งขาว</a></li>
                                            <li><a href="products.html">กุ้งนิ่ม</a></li>
                                            <li><a href="products.html">กุ้งใหญ่</a></li>
                                            <li><a href="products.html">กุ้งกุรา</a></li>
                                            <li><a href="products.html"></a></li>
                                            <li><a href="products.html"></a></li>
                                            <li><a href="products.html"></a></li>
                                            <li><a href="products.html"></a></li>
                                        </ul>
                                    </div>
                                    <div class="col1 me-one">
                                        <h3>ปลาหมึก</h3>
                                        <ul>
                                            <li><a href="products.html">ปลาหมึกกล้วย</a></li>
                                            <li><a href="products.html">ปลาหมึกดำ</a></li>
                                            <li><a href="products.html"></a></li>
                                            <li><a href="products.html"></a></li>
                                            <li><a href="products.html"></a></li>
                                            <li><a href="products.html"></a></li>
                                        </ul>
                                    </div>
                                    <div class="col1 me-one">
                                        <h3>ปลา</h3>
                                        <ul>
                                            <li><a href="products.html"></a></li>
                                            <li><a href="products.html"></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="grid"><a href="{{url('/shopping-cart')}}">ตะกร้าสินค้า<i
                                        class="material-icons">shopping_cart</i><span
                                        class="label label-warning">{{ Session::has('cart') ? Session::get('cart')->totalQty : '' }}</span></a>
                            {{--<div class="mepanel">--}}
                            {{--<div class="row">--}}
                            {{--<div class="col1 me-one">--}}
                            {{--<h4>Shop</h4>--}}
                            {{--<ul>--}}
                            {{--<li><a href="products.html">New Arrivals</a></li>--}}
                            {{--<li><a href="products.html">Blazers</a></li>--}}
                            {{--<li><a href="products.html">Swem Wear</a></li>--}}
                            {{--<li><a href="products.html">Accessories</a></li>--}}
                            {{--<li><a href="products.html">Handbags</a></li>--}}
                            {{--<li><a href="products.html">T-Shirts</a></li>--}}
                            {{--<li><a href="products.html">Watches</a></li>--}}
                            {{--<li><a href="products.html">My Shopping Bag</a></li>--}}
                            {{--</ul>--}}
                            {{--</div>--}}
                            {{--<div class="col1 me-one">--}}
                            {{--<h4>Style Zone</h4>--}}
                            {{--<ul>--}}
                            {{--<li><a href="products.html">Shoes</a></li>--}}
                            {{--<li><a href="products.html">Watches</a></li>--}}
                            {{--<li><a href="products.html">Brands</a></li>--}}
                            {{--<li><a href="products.html">Coats</a></li>--}}
                            {{--<li><a href="products.html">Accessories</a></li>--}}
                            {{--<li><a href="products.html">Trousers</a></li>--}}
                            {{--</ul>--}}
                            {{--</div>--}}
                            {{--<div class="col1 me-one">--}}
                            {{--<h4>Popular Brands</h4>--}}
                            {{--<ul>--}}
                            {{--<li><a href="products.html">499 Store</a></li>--}}
                            {{--<li><a href="products.html">Fastrack</a></li>--}}
                            {{--<li><a href="products.html">Casio</a></li>--}}
                            {{--<li><a href="products.html">Fossil</a></li>--}}
                            {{--<li><a href="products.html">Maxima</a></li>--}}
                            {{--<li><a href="products.html">Timex</a></li>--}}
                            {{--<li><a href="products.html">TomTom</a></li>--}}
                            {{--<li><a href="products.html">Titan</a></li>--}}
                            {{--</ul>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                        </li>
                        <li class="grid"><a href="#">ติดต่อเรา</a>
                            {{--<div class="mepanel">--}}
                            {{--<div class="row">--}}
                            {{--<div class="col1 me-one">--}}
                            {{--<h4>Shop</h4>--}}
                            {{--<ul>--}}
                            {{--<li><a href="products.html">New Arrivals</a></li>--}}
                            {{--<li><a href="products.html">Blazers</a></li>--}}
                            {{--<li><a href="products.html">Swem Wear</a></li>--}}
                            {{--<li><a href="products.html">Accessories</a></li>--}}
                            {{--<li><a href="products.html">Handbags</a></li>--}}
                            {{--<li><a href="products.html">T-Shirts</a></li>--}}
                            {{--<li><a href="products.html">Watches</a></li>--}}
                            {{--<li><a href="products.html">My Shopping Bag</a></li>--}}
                            {{--</ul>--}}
                            {{--</div>--}}
                            {{--<div class="col1 me-one">--}}
                            {{--<h4>Style Zone</h4>--}}
                            {{--<ul>--}}
                            {{--<li><a href="products.html">Shoes</a></li>--}}
                            {{--<li><a href="products.html">Watches</a></li>--}}
                            {{--<li><a href="products.html">Brands</a></li>--}}
                            {{--<li><a href="products.html">Coats</a></li>--}}
                            {{--<li><a href="products.html">Accessories</a></li>--}}
                            {{--<li><a href="products.html">Trousers</a></li>--}}
                            {{--</ul>--}}
                            {{--</div>--}}
                            {{--<div class="col1 me-one">--}}
                            {{--<h4>Popular Brands</h4>--}}
                            {{--<ul>--}}
                            {{--<li><a href="products.html">499 Store</a></li>--}}
                            {{--<li><a href="products.html">Fastrack</a></li>--}}
                            {{--<li><a href="products.html">Casio</a></li>--}}
                            {{--<li><a href="products.html">Fossil</a></li>--}}
                            {{--<li><a href="products.html">Maxima</a></li>--}}
                            {{--<li><a href="products.html">Timex</a></li>--}}
                            {{--<li><a href="products.html">TomTom</a></li>--}}
                            {{--<li><a href="products.html">Titan</a></li>--}}
                            {{--</ul>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                        </li>
                        <li class="grid"><a href="typo.html">เข้าสู่ระบบ</a>
                        </li>
                        <li class="grid"><a href="contact.html">ลงทะเบียน</a>
                        </li>
                    </ul>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="col-md-3 header-right">
                <div class="search-bar">
                    <input type="text" value="Search" onfocus="this.value = '';"
                           onblur="if (this.value == '') {this.value = 'Search';}">
                    <input type="submit" value="">
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!--bottom-header-->
<!--banner-starts-->
<div class="bnr" id="home">
    <div  id="top" class="callbacks_container">
        <ul class="rslides" id="slider4">
            <li>
                <img src="{{asset('fontend/images/bnrr.png')}}" alt=""/>
            </li>
            <li>
                <img src="{{asset('fontend/images/bn5.jpg')}}" alt=""/>
            </li>
            <li>
                <img src="{{asset('fontend/images/bnn.png')}}" alt=""/>
            </li>
        </ul>
    </div>
    <div class="clearfix"> </div>
</div>

<!--banner-ends-->
<!--Slider-Starts-Here-->
<script src="{{asset('fontend/js/responsiveslides.min.js')}}"></script>
<script>
    // You can also use "$(window).load(function() {"
    $(function () {
        // Slideshow 4
        $("#slider4").responsiveSlides({
            auto: true,
            pager: true,
            nav: true,
            speed: 500,
            namespace: "callbacks",
            before: function () {
                $('.events').append("<li>before event fired.</li>");
            },
            after: function () {
                $('.events').append("<li>after event fired.</li>");
            }
        });

    });
</script>
<!--End-slider-script-->
<!--about-starts-->
{{--<div class="about">--}}
{{--<div class="container">--}}
{{--<div class="about-top grid-1">--}}
{{--<div class="col-md-4 about-left">--}}
{{--<figure class="effect-bubba">--}}
{{--<img class="img-responsive" src="{{asset('fontend/images/abt-1.jpg')}}" alt=""/>--}}
{{--<figcaption>--}}
{{--<h2>Nulla maximus nunc</h2>--}}
{{--<p>In sit amet sapien eros Integer dolore magna aliqua</p>--}}
{{--</figcaption>--}}
{{--</figure>--}}
{{--</div>--}}
{{--<div class="col-md-4 about-left">--}}
{{--<figure class="effect-bubba">--}}
{{--<img class="img-responsive" src="{{asset('fontend/images/abt-2.jpg')}}" alt=""/>--}}
{{--<figcaption>--}}
{{--<h4>Mauris erat augue</h4>--}}
{{--<p>In sit amet sapien eros Integer dolore magna aliqua</p>--}}
{{--</figcaption>--}}
{{--</figure>--}}
{{--</div>--}}
{{--<div class="col-md-4 about-left">--}}
{{--<figure class="effect-bubba">--}}
{{--<img class="img-responsive" src="{{asset('fontend/images/abt-3.jpg')}}" alt=""/>--}}
{{--<figcaption>--}}
{{--<h4>Cras elit mauris</h4>--}}
{{--<p>In sit amet sapien eros Integer dolore magna aliqua</p>--}}
{{--</figcaption>--}}
{{--</figure>--}}
{{--</div>--}}
{{--<div class="clearfix"></div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
<!--about-end-->
<br>
<br>
<br>
<h1 class="text-center"></h1>
<div class="container">
    @yield('content')
</div>
<!--product-starts-->

<!--product-end-->
<!--information-starts-->
<div class="information">
    <div class="container">
        <div class="infor-top">
            <div class="col-md-3 infor-left">
                <h3>Follow Us</h3>
                <ul>
                    <li><a href="https://www.facebook.com/bintz.siri"><span class="fb"></span><h6>Facebook</h6></a></li>
                </ul>
            </div>
            <div class="col-md-3 infor-left">
                <h3>Information</h3>
                <ul>
                    <li><a href="#"><p></p></a></li>
                    <li><a href="#"><p></p></a></li>
                    <li><a href="#"><p></p></a></li>
                    <li><a href="contact.html"><p></p></a></li>
                    <li><a href="#"><p></p></a></li>
                </ul>
            </div>
            <div class="col-md-3 infor-left">
                <h3>My Account</h3>
                <ul>
                    <li><a href="account.html"><p></p></a></li>
                    <li><a href="#"><p></p></a></li>
                    <li><a href="#"><p></p></a></li>
                    <li><a href="#"><p></p></a></li>
                    <li><a href="#"><p></p></a></li>
                </ul>
            </div>
            <div class="col-md-3 infor-left">
                <h3>Store Information</h3>
                <h4>ตุ๊กทะเลทอง
                    <span>อาหารทะเลทุกชนิด</span>
                    ตลาดทะเลไทย จ.สมุทราสาคร</h4>
                <h5>087-5897468</h5>
                <p><a href="mailto:example@email.com">Chaisiri_Lekprasert@hotmail.com</a></p>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!--information-end-->
<!--footer-starts-->
<div class="footer">
    <div class="container">
        <div class="footer-top">
            {{--<div class="col-md-6 footer-left">--}}
            {{--<form>--}}
            {{--<input type="text" value="Enter Your Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Enter Your Email';}">--}}
            {{--<input type="submit" value="Subscribe">--}}
            {{--</form>--}}
            {{--</div>--}}
            <div class="col-md-8 footer-right">© 2017 Seafood ทะเลทอง | Design Bintz Siri <a href="#" target="_blank">Seafood</a>
                <p></p>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!--footer-end-->
</body>
</html>