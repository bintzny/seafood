<aside class="app-sidebar" id="sidebar">
    <div class="sidebar-header">
        <a class="sidebar-brand" href="#"><span class="highlight">{{ config('app.name', 'Laravel') }}</span> Admin</a>
        <button type="button" class="sidebar-toggle">
            <i class="fa fa-times"></i>
        </button>
    </div>
    <div class="sidebar-menu">
        <ul class="sidebar-nav">
            <li class="active">
                <a href="{{ url('admin/') }}">
                    <div class="icon">
                        <i class="fa fa-tasks" aria-hidden="true"></i>
                    </div>
                    <div class="title">หน้าแรก</div>
                </a>
            </li>
            <li class="active">
                <a href="{{url('admin/productgroup')}}">
                    <div class="icon">
                        <i class="fa fa-navicon" aria-hidden="true"></i>
                    </div>
                    <div class="title">ประเภทสินค้า</div>
                </a>
            </li>
            <li class="active">
                <a href="{{url('admin/product')}}">
                    <div class="icon">
                        <i class="fa fa-plus-square" aria-hidden="true"></i>
                    </div>
                    <div class="title">ข้อมูลสินค้า</div>
                </a>
            </li>
            <li class="active">
                <a href="{{url('admin/customer')}}">
                    <div class="icon">
                        <i class="fa fa-male" aria-hidden="true"></i>
                    </div>
                    <div class="title">ข้อมูลลูกค้า</div>
                </a>
            </li>
            <li class="active">
                <a href="{{url('admin/orders')}}">
                    <div class="icon">
                        <i class="fa fa-newspaper-o" aria-hidden="true"></i>
                    </div>
                    <div class="title">ข้อมูลประเภทสินค้า</div>
                </a>
            </li>
            <li class="active">
                <a href="{{url('admin/stock')}}">
                    <div class="icon">
                        <i class="fa fa-cubes" aria-hidden="true"></i>
                    </div>
                    <div class="title">คลังสินค้า & สต๊อก</div>
                </a>
            </li>
        </ul>
    </div>
    {{--<div class="sidebar-footer">--}}
        {{--<ul class="menu">--}}
            {{--<li>--}}
                {{--<a href="/" class="dropdown-toggle" data-toggle="dropdown">--}}
                    {{--<i class="fa fa-cogs" aria-hidden="true"></i>--}}
                {{--</a>--}}
            {{--</li>--}}
        {{--</ul>--}}
    {{--</div>--}}
</aside>