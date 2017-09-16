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
                        Customers
                    </a>
                    <a href="{{ route('products.index') }}">
                        Products
                    </a>
                    <a href="{{ route('categories.index') }}">
                        Categories
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
