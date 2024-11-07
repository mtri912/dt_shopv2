
<?php $__env->startSection('content'); ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Categories </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Categories</li>
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
                                <h3 class="card-title">Categories</h3>
                                <?php if($categoriesModule['edit_access']==1 || $categoriesModule['full_access']==1): ?>
                                    <a style="max-width: 150px; float: right; display: inline-block;" href="<?php echo e(url('admin/add-edit-category')); ?>" class="btn btn-block btn-primary">Add Category</a>
                                <?php endif; ?>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="categories" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Parent Category</th>
                                        <th>URL</th>
                                        <th>Created on</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($category['id']); ?></td>
                                                <td><?php echo e($category['category_name']); ?></td>
                                                <td>
                                                    <?php if(isset($category['parentcategory']['category_name'])): ?>
                                                        <?php echo e($category['parentcategory']['category_name']); ?>

                                                    <?php endif; ?>
                                                </td>
                                                <td><?php echo e($category['url']); ?></td>
                                                <td><?php echo e(date("F j,Y, g:i a", strtotime($category['created_at']))); ?></td>
                                                <td>
                                                    <?php if($categoriesModule['edit_access']==1 || $categoriesModule['full_access']==1): ?>
                                                        <?php if($category['status'] == 1): ?>
                                                            <a class="updateCategoryStatus" id="category-<?php echo e($category['id']); ?>" category_id="<?php echo e($category['id']); ?>" style="color: #3f6ed3" href="javascript:void(0)">
                                                                <i class="fas fa-toggle-on" status="Active"></i>
                                                            </a>
                                                        <?php else: ?>
                                                            <a class="updateCategoryStatus" id="category-<?php echo e($category['id']); ?>" category_id="<?php echo e($category['id']); ?>" style="color: grey" href="javascript:void(0)">
                                                                <i class="fas fa-toggle-off" status="Inactive"></i>
                                                            </a>
                                                        <?php endif; ?>
                                                        &nbsp;&nbsp;
                                                    <?php endif; ?>
                                                        <?php if($categoriesModule['edit_access']==1 || $categoriesModule['full_access']==1): ?>
                                                        <a style="color: #3f6ed3" href="<?php echo e(url('admin/add-edit-category/'.$category['id'])); ?>" >
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        &nbsp;&nbsp;
                                                        <?php endif; ?>
                                                        <?php if($categoriesModule['full_access']==1): ?>
                                                        <a style="color: #3f6ed3" class="confirmDelete" title="Delete Category" href="javascript:void(0)" record="category" recordid="<?php echo e($category['id']); ?>">
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

<?php echo $__env->make('admin.layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\dt_shop-v2\resources\views/admin/categories/categories.blade.php ENDPATH**/ ?>