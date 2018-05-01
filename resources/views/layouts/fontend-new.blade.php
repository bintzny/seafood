<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SeaFood Thailand.</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('fontend-new/vendor/bootstrap/css/bootstrap.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
    <link href="{{asset('fontend-new/css/shop-homepage.css')}}" rel="stylesheet">


</head>

<body style="font-family: 'Kanit', sans-serif;">

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="{{ url('/') }}">SeaFood Thailand.</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{ url('/') }}">หน้าหลัก </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"></a>
            </li>
            @if (Auth::guest())

                <li class="nav-item">
                    <a class="nav-link" href="{{ url('login') }}">เข้าสู่ระบบ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('register') }}">ลงทะเบียน</a>
                </li>

            @else

                <li class="grid"><a href="{{url('/shopping-cart')}}">ตะกร้าสินค้า<i
                                class="material-icons">shopping_cart</i><span
                                class="label label-warning">{{ Session::has('cart') ? Session::get('cart')->totalQty : '' }}</span></a>
                <li class="nav-item">
                    <a href="{{ url('/logout') }}"
                       onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                        <i class="material-icons">exit_to_app</i>
                        ออกจากระบบ
                    </a>

                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>


                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/chkOrder') }}">ออเดอร์ของฉัน</a>
                </li>
                @endif
            <li class="nav-item">
                <a class="nav-link" href="#">ติดต่อเรา</a>
            </li>
        </ul>
    </div>
</nav>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <div class="col-lg-3">
            <h1 class="my-4">ประเภทสินค้า</h1>
            <div class="list-group">
                @foreach(\App\ProductGroup::all() as $productGroup)
                <a href="{{ url('productGroup/'.$productGroup->id) }}" class="@yield($productGroup->productGroupName) list-group-item">{{ $productGroup->productGroupName }}</a>
                @endforeach
            </div>


        </div>




        <!-- /.col-lg-3 -->

        <div class="col-lg-9">

            <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <img class="d-block img-fluid" src="{{asset('fontend/images/bnrr.png')}}" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block img-fluid" src="{{asset('fontend/images/bn5.jpg')}}" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block img-fluid" src="{{asset('fontend/images/bnn.png')}}" alt="Third slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

            <div class="row">



                @yield('content')


            </div>
            <!-- /.row -->

        </div>


        <div class="col-lg-3"> </div>


        <div class="col-lg-9">
            @yield('content2')
        </div>




        <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->

<!-- Footer -->
<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">© 2017 Seafood ทะเลทอง | Design Bintz Siri</p>
    </div>
    <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="{{asset('fontend-new/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('fontend-new/vendor/popper/popper.min.js')}}"></script>
<script src="{{asset('fontend-new/vendor/bootstrap/js/bootstrap.min.js')}}"></script>


@yield('script')
</body>

</html>
