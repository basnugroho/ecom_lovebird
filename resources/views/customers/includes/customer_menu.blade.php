<div class="col-md-3">
    <!-- *** CUSTOMER MENU ***
_________________________________________________________ -->
    <div class="panel panel-default sidebar-menu">

        <div class="panel-heading">
            <h3 class="panel-title">Navigasi Pelanggan</h3>
        </div>

        <div class="panel-body">

            <ul class="nav nav-pills nav-stacked">
                <li>
                    <a href="{{ route('customer.orders')}}"><i class="fa fa-list"></i> Pesanan</a>
                </li>
                <li>
                    <a href="{{ route('account')}}"><i class="fa fa-user"></i> Akun</a>
                </li>
                <!-- <li class="active">
                    <a href="customer-wishlist.html"><i class="fa fa-heart"></i> My wishlist</a>
                </li> -->
                <li>
                    <a href="{{ url('logout') }}"><i class="fa fa-sign-out"></i> Logout</a>
                </li>
            </ul>
        </div>

    </div>
    <!-- /.col-md-3 -->

    <!-- *** CUSTOMER MENU END *** -->
</div>