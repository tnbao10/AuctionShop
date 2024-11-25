<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('store.detail') }}" class="brand-link">
        <img src={{asset("client/images/logo/logo-dendo-cocaybua.png")}} alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">Audit Management</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src={{asset("admin/img/user2-160x160.jpg")}} class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::guard('nguoidung')->user()->nd_hoten ?? 'Admin'}}</a>
            </div>
        </div>



        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               @if (\Auth::guard('nguoidung')->check() || (\Auth::guard('quantrivien')->check() && \Session::has('ch_id')))
                <li class="nav-item">
                    <a href="{{ route('product.index') }}" class="nav-link
                        @if (Request::segment(1) == 'san-pham')
                            active
                        @endif
                    ">
                        <i class="nav-icon fas fa-barcode"></i>
                        <p>
                            Sản phẩm
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('type.index') }}" class="nav-link
                        @if (Request::segment(1) == 'loai-san-pham')
                            active
                        @endif
                        ">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Loại sản phẩm
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('category.index') }}" class="nav-link
                        @if (Request::segment(1) == 'danh-muc')
                            active
                        @endif
                        ">
                        <i class="nav-icon fas fa-columns"></i>
                        <p>
                            Danh mục
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('brand.index') }}" class="nav-link
                        @if (Request::segment(1) == 'thuong-hieu')
                            active
                        @endif
                    ">
                        <i class="nav-icon fas fa-tree"></i>
                        <p>
                            Thương hiệu
                        </p>
                    </a>
                </li>
                <li class="nav-header h3">Cửa hàng</li>
                <li class="nav-item">
                    <a href="{{ route('order.getList') }}" class="nav-link">
                        <i class="nav-icon fas fa-inbox"></i>
                        <p>
                            Đơn hàng
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('store.info') }}" class="nav-link">
                        <i class="nav-icon fas fa-store"></i>
                        <p>
                            Thông Tin Sàn Đấu Giá
                        </p>
                    </a>
                </li>

                @endif
                @if (\Auth::guard('quantrivien')->check())
                <li class="nav-item">
                    <a href="{{ route('post.index') }}" class="nav-link
                        @if (Request::segment(1) == 'bai-viet')
                            active
                        @endif
                    ">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Bài viết
                        </p>
                    </a>
                </li>
                @endif
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            Thống kê
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    
                    <ul class="nav nav-treeview">
                        @if (\Auth::guard('nguoidung')->check() || (\Auth::guard('quantrivien')->check() && \Session::has('ch_id')))
                        <li class="nav-item">
                            <a href="{{route('stat.revenue')}}" class="nav-link">
                                <i class="far fa-circle nav-icon text-danger"></i>
                                <p>Doanh thu</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('stat.product')}}" class="nav-link">
                                <i class="far fa-circle nav-icon text-info"></i>
                                <p>Sản phẩm bán được</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('stat.order')}}" class="nav-link">
                                <i class="far fa-circle nav-icon text-info"></i>
                                <p>Đơn hàng</p>
                            </a>
                        </li>
                        @endif
                        @if (\Auth::guard('quantrivien')->check())
                        <li class="nav-item">
                            <a href="{{route('stat.user')}}" class="nav-link">
                                <i class="far fa-circle nav-icon text-info"></i>
                                <p>Người dùng đăng ký</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('stat.store')}}" class="nav-link">
                                <i class="far fa-circle nav-icon text-info"></i>
                                <p>Top cửa hàng</p>
                            </a>
                        </li>
                        @endif

                    </ul>
                </li>
                @if (\Auth::guard('quantrivien')->check())
                <li class="nav-header h3">Chức năng Admin</li>
                <li class="nav-item">
                    <a href="{{ route('listStore') }}" class="nav-link
                    ">
                        <i class="nav-icon fas">🏪</i>
                        <p>
                            Danh sách cửa hàng
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('listUser') }}" class="nav-link
                    ">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Danh sách người dùng
                        </p>
                    </a>
                </li>
                @endif
                <li class="nav-header">Đăng Xuất</li>
                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link
                    ">
                        <i class="nav-icon fas fa-pause"></i>
                        <p>
                            Đăng xuất
                        </p>
                    </a>
                </li>
                
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
