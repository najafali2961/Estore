<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="active">
                    <a href="{{route('dashboard')}}"><img src="{{asset('assets/img/icons/dashboard.svg')}}" alt="img"><span>
                            Dashboard</span> </a>
                </li>
                <li class="submenu">
                    <a href="javascript:void(0);"><img src="{{asset('assets/img/icons/product.svg')}}"
                            alt="img"><span> Product</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{route('admin.product.index')}}">Product List</a></li>
                        <li><a href="{{route('admin.product.create')}}">Add Product</a></li>
                        <li><a href="{{route('admin.category.index')}}">Category List</a></li>
                        <li><a href="{{route('admin.category.create')}}">Add Category</a></li>
                        <li><a href="{{route('admin.subcategory.index')}}">Sub Category List</a></li>
                        <li><a href="{{route('admin.subcategory.create')}}">Add Sub Category</a></li>
                        <li><a href="{{route('admin.brand.index')}}">Brand List</a></li>
                        <li><a href="{{route('admin.brand.create')}}">Add Brand</a></li>

                    </ul>
                </li>

                <li class="submenu">
                    <a href="javascript:void(0);"><img src="{{asset('assets/img/icons/users1.svg')}}" alt="img"><span>
                            People</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{route('admin.customer.index')}}">Customer List</a></li>
                        <li><a href="{{route('admin.customer.create')}}">Add Customer </a></li>
                        <li><a href="{{route('admin.supplier.index')}}">Supplier List</a></li>
                        <li><a href="{{route('admin.supplier.create')}}">Add Supplier </a></li>

                    </ul>
                </li>
                <li class="submenu">
                    <a href="javascript:void(0);"><img src="{{asset('assets/img/icons/sales1.svg')}}" alt="img"><span>
                            Sale</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{route('admin.pos.index')}}">Add To Cart</a></li>
                        <li><a href="{{route('admin.cart.index')}}">Cart</a></li>
                        <li><a href="{{route('admin.sale.index')}}">Sale</a></li>


                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
