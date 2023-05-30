<aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="{{route('dashboard')}}" class="brand-link">
        <img src="{{asset('dist/img/medhiartis logo only.png')}}" alt="Medhiartis Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Medhiartis</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <!-- <div class="image">
            <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div> -->
            <div class="info" style="padding-left: 10px;">
                <a href="{{route('dashboard')}}" class="d-block" style="text-align: center;"> Welcome {{ $current_user->name }}</a>
            </div>
        </div>

        

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
               <!-- <li class="nav-item menu-open">
                <a href="{{route('dashboard')}}" class="nav-link active"> -->
                
                <li class="nav-item">
                <a href="{{route('dashboard')}}" class="nav-link {{ Request::routeIs('dashboard') ? 'active' : '' }}">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Dashboard
                    <!--<i class="right fas fa-angle-left"></i>-->
                </p>
                </a>
            </li>

            <li class="nav-item">
                 @if($current_user->user_type == 1)
                    <a href="{{route('users')}}" class="nav-link {{ Request::routeIs('users') ? 'active' : '' }}">
                @else
                    <a href="#" class="nav-link">
                @endif
                <i class="nav-icon fas fa-user"></i>
                <p>    
                    Users
                </p>
                </a>   
            </li>
            <!-- <li class="nav-item">
                <a href="pages/widgets.html" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                    Widgets
                    <span class="right badge badge-danger">New</span>
                </p>
                </a>    
            </li>-->

            @if($current_user->user_type == 1)
                <li class="nav-item">
                    <a href="{{route('glossary')}}" class="nav-link {{ Request::routeIs('glossary') ? 'active' : '' }}">
                        <i class="nav-icon fa fa-list-alt"></i>
                            <p>Glossary</p>
                    </a>   
                </li>
            @endif

            <li class="nav-item">
                @if($current_user->user_type == 1)
                    <a href="{{route('equipments')}}" class="nav-link {{ Request::routeIs('equipments') ? 'active' : '' }}">
                @else
                    <a href="#" class="nav-link">
                @endif
                    <i class="nav-icon fa fa-cog fa-spin fa-3x fa-fw"></i>
                    <p>
                        Equipments
                    </p>
                    </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link {{ Request::routeIs('sheets') ? 'active' : '' }}">
                <i class="nav-icon fas fa-book"></i>
                <p>
                    Sheets
                </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link {{ Request::routeIs('catalogs') ? 'active' : '' }}">
                <i class="nav-icon fas fa-book-open"></i>
                <p>
                    Catalogs
                </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link {{ Request::routeIs('orders') ? 'active' : ''}}">
                <i class="nav-icon fas fa-cart-arrow-down"></i>
                <p>
                    Orders
                </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link" >
                    <i class="nav-icon fas fa-sign-out-alt"></i>
                    <p>
                        Logout
                    </p>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
            </form>
                </li>
            <!-- <br> 
            <form method="POST" action="{{ route('logout') }}" class="nav-item">
                @csrf 
                <div style="padding-left: 20px;">
                    <button type="submit" style="padding-left: 15px; padding-right: 15px;">Log Out</button>
                </div>
            </form> -->
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
  </aside>