
<?php $__env->startSection('content'); ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Products</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Products</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <?php if(Session::has('success_message')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success:</strong> <?php echo e(Session::get('success_message')); ?>

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Products</h3>
                                <?php if($productsModule['edit_access']==1 || $productsModule['full_access']==1): ?>
                                    <a style="max-width: 150px; float: right; display: inline-block;" href="<?php echo e(url('admin/add-edit-product')); ?>" class="btn btn-block btn-primary">Add Product</a>
                                <?php endif; ?>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="products" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Product Name</th>
                                        <th>Product Code</th>
                                        <th>Product Color</th>
                                        <th>Product Price</th>
                                        <th>Category</th>
                                        <th>Parent Category</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($product['id']); ?></td>
                                            <td><?php echo e($product['product_name']); ?></td>
                                            <td><?php echo e($product['product_code']); ?></td>
                                            <td><?php echo e($product['product_color']); ?></td>
                                            <td><?php echo e(number_format($product['final_price'], 0, ',', '.') . ' VND'); ?></td>
                                            <td><?php echo e($product['category']['category_name']); ?></td>
                                            <td>
                                                <?php if(isset($product['category']['parentcategory']['category_name'])): ?>
                                                    <?php echo e($product['category']['parentcategory']['category_name']); ?>

                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if($productsModule['edit_access']==1 || $productsModule['full_access']==1): ?>
                                                    <?php if($product['status'] == 1): ?>
                                                        <a class="updateProductStatus" id="product-<?php echo e($product['id']); ?>" product_id="<?php echo e($product['id']); ?>" style="color: #3f6ed3" href="javascript:void(0)">
                                                            <i class="fas fa-toggle-on" status="Active"></i>
                                                        </a>
                                                    <?php else: ?>
                                                        <a class="updateProductStatus" id="product-<?php echo e($product['id']); ?>" product_id="<?php echo e($product['id']); ?>" style="color: grey" href="javascript:void(0)">
                                                            <i class="fas fa-toggle-off" status="Inactive"></i>
                                                        </a>
                                                    <?php endif; ?>
                                                    &nbsp;&nbsp;
                                                <?php endif; ?>
                                                    <?php if($productsModule['edit_access']==1 || $productsModule['full_access']==1): ?>
                                                    <a style="color: #3f6ed3" href="<?php echo e(url('admin/add-edit-product/'.$product['id'])); ?>" >
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    &nbsp;&nbsp;
                                                    <?php endif; ?>
                                                    <?php if($productsModule['full_access']==1): ?>
                                                    <a style="color: #3f6ed3" class="confirmDelete" title="Delete Product" href="javascript:void(0)" record="product" recordid="<?php echo e($product['id']); ?>">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                    <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\dt_shop-v2\resources\views/admin/products/products.blade.php ENDPATH**/ ?>