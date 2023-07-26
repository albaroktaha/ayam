<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <h3>Menu</h3>
        <ul class="nav side-menu">
            <li><a href="/dashboard"><i class="fa fa-home"></i>Dashboard</a></li>
            <li>
                <a>
                    <i class="fa fa-cubes"></i> Product 
                    <span class="fa fa-chevron-down"></span>
                </a>
                <ul class="nav child_menu">
                    @if(Auth::user()->roles == "Distributor")
                    <li>
                        <a href="/product-distributor/create"><i class="fa fa-plus-circle"></i>Add Product</a>
                    </li>
                    <li>
                        <a href="/product-distributor"><i class="fa fa-eye"></i>Show All Products</a>
                    </li>
                    @elseif(Auth::user()->roles == "Admin")
                    <li>
                        <a href="/product/create"><i class="fa fa-plus-circle"></i>Add Product</a>
                    </li>
                    <li>
                        <a href="/product"><i class="fa fa-eye"></i>Show All Products</a>
                    </li>
                    @endif
                </ul>
            </li>
            @if(Auth::user()->roles == "Admin")
            <li><a href="/stock"><i class="fa fa-folder-open"></i> Stock</a></li>
            <li><a href="/orders"><i class="fa fa-shopping-cart"></i> Orders</a></li>
            @elseif(Auth::user()->roles == "Distributor")
            <li><a href="/orders-distributor"><i class="fa fa-shopping-cart"></i> Orders</a></li>
            @endif

            <li>
                <a>
                    <i class="fa fa-book"></i> Reports 
                    <span class="fa fa-chevron-down"></span>
                </a>
                <ul class="nav child_menu">
                    @if(Auth::user()->roles == "Admin")
                    <li>
                        <a href="/income"><i class="fa fa-thumbs-up"></i>Income</a>
                    </li>
                    <li>
                        <a href="/outcome"><i class="fa fa-thumbs-down"></i>Outcome</a>
                    </li>
                    @endif
                </ul>
            </li>

            {{-- <li><a href="/change_password"><i class="fa fa-wrench"></i> Change Password</a></li> --}}
        </ul>
    </div>

</div>
