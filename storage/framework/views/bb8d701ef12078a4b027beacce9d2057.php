<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo e(url('admin/dashboard')); ?>" class="brand-link">
        <img src="<?php echo e(asset('admin/images/AdminLTELogo.png')); ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Admin Panel</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <?php if(!empty(Auth::guard('admin')->user()->image)): ?>
                <img src="<?php echo e(asset('admin/images/photos/'.Auth::guard('admin')->user()->image)); ?>" class="img-circle elevation-2" alt="User Image">
                <?php else: ?>
                    <img src="<?php echo e(asset('admin/images/no-user.png')); ?>" class="img-circle elevation-2" alt="User Image">
                <?php endif; ?>
            </div>
            <div class="info">
                <a href="#" class="d-block"><?php echo e(Auth::guard('admin')->user()->name); ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <?php if(Session::get('page') === "dashboard" ): ?>
                    <?php $active = "active" ?>
                <?php else: ?>
                    <?php $active = "" ?>
                <?php endif; ?>
                <li class="nav-item">
                    <a href="<?php echo e(url('admin/dashboard')); ?>" class="nav-link <?php echo e($active); ?>">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <?php if(Auth::guard('admin')->user()->type=="admin"): ?>

                    <?php if(Session::get('page') === "update-password" || Session::get('page') === "update-details" || Session::get('page') === "subadmins"): ?>
                        <?php $active = "active" ?>
                    <?php else: ?>
                        <?php $active = "" ?>
                    <?php endif; ?>
                    <li class="nav-item menu-open">
                        <a href="#" class="nav-link <?php echo e($active); ?>">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                Admin Management
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <?php if(Session::get('page') === "update-password"): ?>
                                <?php $active = "active" ?>
                            <?php else: ?>
                                <?php $active = "" ?>
                            <?php endif; ?>
                            <li class="nav-item">
                                <a href="<?php echo e(url('admin/update-password')); ?>" class="nav-link <?php echo e($active); ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Update Admin Password</p>
                                </a>
                            </li>
                                <?php if(Session::get('page') === "update-details"): ?>
                                    <?php $active = "active" ?>
                                <?php else: ?>
                                    <?php $active = "" ?>
                                <?php endif; ?>
                            <li class="nav-item">
                                <a href="<?php echo e(url('admin/update-details')); ?>" class="nav-link <?php echo e($active); ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Update Admin Details</p>
                                </a>
                            </li>
                                <?php if(Session::get('page') === "subadmins"): ?>
                                    <?php $active = "active" ?>
                                <?php else: ?>
                                    <?php $active = "" ?>
                                <?php endif; ?>
                                <li class="nav-item">
                                    <a href="<?php echo e(url('admin/subadmins')); ?>" class="nav-link <?php echo e($active); ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Subadmins
                                        </p>
                                    </a>
                                </li>
                        </ul>
                    </li>
                <?php endif; ?>

                <?php if(Session::get('page') === "cms-pages"): ?>
                    <?php $active = "active" ?>
                <?php else: ?>
                    <?php $active = "" ?>
                <?php endif; ?>
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link <?php echo e($active); ?>">
                        <i class="nav-icon fas fa-file"></i>
                        <p>
                            Pages Management
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <?php if(Session::get('page') === "cms-pages"): ?>
                            <?php $active = "active" ?>
                        <?php else: ?>
                            <?php $active = "" ?>
                        <?php endif; ?>
                        <li class="nav-item">
                            <a href="<?php echo e(url('admin/cms-pages')); ?>" class="nav-link <?php echo e($active); ?>">
                                <i class="nav-icon fas fa-copy"></i>
                                <p>
                                    CMS Pages
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>

                <?php if(Session::get('page') === "categories" || Session::get('page') === "products" || Session::get('page') === "brands"): ?>
                    <?php $active = "active" ?>
                <?php else: ?>
                    <?php $active = "" ?>
                <?php endif; ?>
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link <?php echo e($active); ?>">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Catalogue Management
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <?php if(Session::get('page') === "categories"): ?>
                            <?php $active = "active" ?>
                        <?php else: ?>
                            <?php $active = "" ?>
                        <?php endif; ?>
                        <li class="nav-item">
                            <a href="<?php echo e(url('admin/categories')); ?>" class="nav-link <?php echo e($active); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Categories</p>
                            </a>
                        </li>
                            <?php if(Session::get('page') === "brands"): ?>
                                <?php $active = "active" ?>
                            <?php else: ?>
                                <?php $active = "" ?>
                            <?php endif; ?>
                            <li class="nav-item">
                                <a href="<?php echo e(url('admin/brands')); ?>" class="nav-link <?php echo e($active); ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Brand</p>
                                </a>
                            </li>
                            <?php if(Session::get('page') === "products"): ?>
                                <?php $active = "active" ?>
                            <?php else: ?>
                                <?php $active = "" ?>
                            <?php endif; ?>
                            <li class="nav-item">
                                <a href="<?php echo e(url('admin/products')); ?>" class="nav-link <?php echo e($active); ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Product</p>
                                </a>
                            </li>
                    </ul>
                </li>
                <?php if(Session::get('page') === "users"): ?>
                    <?php $active = "active" ?>
                <?php else: ?>
                    <?php $active = "" ?>
                <?php endif; ?>
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link <?php echo e($active); ?>">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Users Management
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <?php if(Session::get('page') === "users"): ?>
                            <?php $active = "active" ?>
                        <?php else: ?>
                            <?php $active = "" ?>
                        <?php endif; ?>
                        <li class="nav-item">
                            <a href="<?php echo e(url('admin/users')); ?>" class="nav-link <?php echo e($active); ?>">
                                <i class="nav-icon fas fa-file"></i>
                                <p>
                                    Users
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>

                <?php if(Session::get('page') === "orders"): ?>
                    <?php $active = "active" ?>
                <?php else: ?>
                    <?php $active = "" ?>
                <?php endif; ?>
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link <?php echo e($active); ?>">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Order Management
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <?php if(Session::get('page') === "orders"): ?>
                            <?php $active = "active" ?>
                        <?php else: ?>
                            <?php $active = "" ?>
                        <?php endif; ?>
                        <li class="nav-item">
                            <a href="<?php echo e(url('admin/orders')); ?>" class="nav-link <?php echo e($active); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Orders</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <?php if(Session::get('page') === "banners"): ?>
                    <?php $active = "active" ?>
                <?php else: ?>
                    <?php $active = "" ?>
                <?php endif; ?>
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link <?php echo e($active); ?>">
                        <i class="nav-icon fas fa-image"></i>
                        <p>
                            Banners Management
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <?php if(Session::get('page') === "banners"): ?>
                            <?php $active = "active" ?>
                        <?php else: ?>
                            <?php $active = "" ?>
                        <?php endif; ?>
                        <li class="nav-item">
                            <a href="<?php echo e(url('admin/banners')); ?>" class="nav-link <?php echo e($active); ?>">
                                <i class="nav-icon fas fa-file"></i>
                                <p>
                                    Banners
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>

                <?php if(Session::get('page') === "coupons"): ?>
                    <?php $active = "active" ?>
                <?php else: ?>
                    <?php $active = "" ?>
                <?php endif; ?>
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link <?php echo e($active); ?>">
                        <i class="nav-icon fas fa-dollar-sign"></i>
                        <p>
                            Coupons Management
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <?php if(Session::get('page') === "coupons"): ?>
                            <?php $active = "active" ?>
                        <?php else: ?>
                            <?php $active = "" ?>
                        <?php endif; ?>
                        <li class="nav-item">
                            <a href="<?php echo e(url('admin/coupons')); ?>" class="nav-link <?php echo e($active); ?>">
                                <i class="nav-icon fas fa-file"></i>
                                <p>
                                    Coupons
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
<?php /**PATH D:\xampp\htdocs\dt_shop-v2\resources\views/admin/layout/sidebar.blade.php ENDPATH**/ ?>