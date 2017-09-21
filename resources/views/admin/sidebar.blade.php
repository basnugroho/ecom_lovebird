<div class="col-md-3">
    <div class="panel panel-default panel-flush">
        <div class="panel-heading">
            Sidebar
        </div>

        <div class="panel-body">
            <ul class="nav" role="tablist">
                <li role="presentation">
                    <a href="{{ route('admin.profile') }}">
                        Dashboard
                    </a>
                    <a href="{{ route('customers.index') }}">
                        Pelanggan
                    </a>
                    <a href="{{ route('products.index') }}">
                        Produk
                    </a>
                    <a href="{{ route('categories.index') }}">
                        Kategori Produk
                    </a>
                    <a href="{{ route('orders.index') }}">
                        Pesanan
                    </a>
                    <a href="">
                        Pengaturan
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
