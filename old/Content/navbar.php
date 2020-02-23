
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header"> 
                <ul class="nav navbar-top-links navbar-left hidden-xs">
                    <li>
                        <form role="search" class="app-search hidden-xs">
                            <input type="text" placeholder="Search..." class="form-control">
                            <a href=""><i class="fa fa-search"></i></a>
                        </form>
                    </li>
                </ul>
                <ul class="nav navbar-top-links navbar-right pull-right">
                    <li class="dropdown"> 
                        <a class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-lg"></i> <b>Hello, MobileM</b>
                        </a>
                        <ul class="dropdown-menu">
                            <li> <a href="#"> Profile </a> </li>
                            <li> <a href="#"> Settings </a> </li>
                            <li> <a href="#"> Logout </a> </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- Left navbar-header -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse slimscrollsidebar">
                <div class="user-profile">
                    <div class="dropdown user-pro-body">
                        <div>
                            <img src="../../images/Icon Mobile M.png" alt="user-img" class="img-responsive">
                        </div>
                    </div>
                </div>
                <ul class="nav" id="side-menu">                    
                    <li> 
					<a href="Dashboard" class="waves-effect active"><i data-icon="Q" class="linea-icon linea-basic fa-fw"></i><span class="hide-menu">Dashboard</span></a> 
					</li>
					
                    <li> 
                        <a href="#" class="waves-effect">
                            <i class="linea-icon linea-basic fa-list" data-icon="v"></i>
                            <span class="hide-menu"> Product Catalog 
                                <span class="fa arrow"></span>
                            </span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li> <a href="AddNewProduct">Add New Product</a> </li>
                            <li> <a href="AllProduct">All Products</a> </li>
                            <li> <a href="AllProduct?type=instock">In Stock</a> </li>
                            <li> <a href="AllProduct?type=outofstock">Out of Stock</a> </li>
                        </ul>
                    </li>
                   <li> 
                        <a href="#" class="waves-effect">
                            <i class="linea-icon linea-basic fa-list" data-icon="v"></i>
                            <span class="hide-menu"> Orders 
                                <span class="fa arrow"></span>
                            </span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li> <a href="NewOrders">New Orders</a> </li>
                            <li> <a href="AllOrders?type=inprocess">Order in Process</a> </li>
                            <li> <a href="AllOrders?type=delivered">Delivered Orders</a> </li>
                            <li> <a href="AllOrders?type=canceled">Calnceled Orders</a> </li>
                            <li> <a href="AllOrders">All Orders</a> </li>
                        </ul>
                    </li>
                    <li> 
                        <a href="#" class="waves-effect">
                            <i class="linea-icon linea-basic fa-list" data-icon="v"></i>
                            <span class="hide-menu"> Old Mobile Ads 
                                <span class="fa arrow"></span>
                            </span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li> <a href="AllAds">All Ads</a> </li>
                            <li> <a href="AllAds?type=running">Running Ads</a> </li>
                            <li> <a href="AllAds?type=outdated">Outdated Ads</a> </li>
                        </ul>
                    </li>
                    <li> 
                        <a href="#" class="waves-effect">
                            <i class="linea-icon linea-basic fa-list" data-icon="v"></i>
                            <span class="hide-menu"> Customers 
                                <span class="fa arrow"></span>
                            </span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li> <a href="AllCustomers">All Customers</a> </li>
                            <li> <a href="AllCustomers?type=unverified">Unverified Customers</a> </li>
                        </ul>
                    </li>
                    <li> 
                        <a href="#" class="waves-effect">
                            <i class="linea-icon linea-basic fa-list" data-icon="v"></i>
                            <span class="hide-menu"> Utilities 
                                <span class="fa arrow"></span>
                            </span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li> <a href="Categories">Manage Categories</a> </li>
                            <li> <a href="Brands">Manage Brands</a> </li>
                     
                        </ul>
                    </li>
                    
                    
                </ul>
            </div>
        </div>
        <!-- Left navbar-header end -->