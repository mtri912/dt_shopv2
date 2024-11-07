

<?php $__env->startSection('content'); ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><?php echo e($title); ?></h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active"><?php echo e($title); ?></li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- SELECT2 EXAMPLE -->
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title"><?php echo e($title); ?></h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <?php if($errors->any()): ?>
                                    <div class="alert alert-danger">
                                        <ul>
                                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li><?php echo e($error); ?></li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    </div>
                                <?php endif; ?>
                                <form name="brandForm" id="brandForm" <?php if(empty($brand['id'])): ?> action="<?php echo e(url('admin/add-edit-brand')); ?>" <?php else: ?> action="<?php echo e(url('admin/add-edit-brand/'.$brand['id'])); ?>" <?php endif; ?> method="post" enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>
                                    <div class="form-group">
                                        <label for="brand_name">Brand Name*</label>
                                        <input type="text" class="form-control" id="brand_name" name="brand_name" placeholder="Enter Brand Name" <?php if(!empty($brand['brand_name'])): ?> value="<?php echo e($brand['brand_name']); ?>" <?php else: ?> value="<?php echo e(old('brand_name')); ?>" <?php endif; ?>>
                                    </div>
                                    <div class="form-group">
                                        <label for="brand_image">Brand Image*</label>
                                        <input type="file" class="form-control" id="brand_image" name="brand_image">
                                        <?php if(!empty($brand['brand_image'])): ?>
                                            <a target="_blank" href="<?php echo e(url('front/images/brands/'.$brand['brand_image'])); ?>"><img style="width: 50px; margin: 10px" src="<?php echo e(asset('front/images/brands/'.$brand['brand_image'])); ?>"></a>
                                            <a style="color: #3f6ed3" class="confirmDelete" title="Delete Brand Image" href="javascript:void(0)" record="brand-image" recordid="<?php echo e($brand['id']); ?>">
                                                <i style="color: #fff" class="fas fa-trash"></i>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="brand_logo">Brand Logo*</label>
                                        <input type="file" class="form-control" id="brand_logo" name="brand_logo">
                                        <?php if(!empty($brand['brand_logo'])): ?>
                                            <a target="_blank" href="<?php echo e(url('front/images/brands/'.$brand['brand_logo'])); ?>"><img style="width: 50px; margin: 10px" src="<?php echo e(asset('front/images/brands/'.$brand['brand_logo'])); ?>"></a>
                                            <a style="color: #3f6ed3" class="confirmDelete" title="Delete Brand Logo" href="javascript:void(0)" record="brand-logo" recordid="<?php echo e($brand['id']); ?>">
                                                <i style="color: #fff" class="fas fa-trash"></i>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="brand_discount">Brand Discount*</label>
                                        <input type="text" class="form-control" id="brand_discount" name="brand_discount" placeholder="Enter Brand Discount" <?php if(!empty($brand['brand_discount'])): ?> value="<?php echo e($brand['brand_discount']); ?>" <?php else: ?> value="<?php echo e(old('brand_discount')); ?>" <?php endif; ?>>
                                    </div>
                                    <div class="form-group">
                                        <label for="url">Brand URL*</label>
                                        <input type="text" class="form-control" id="url" name="url" placeholder="Enter Brand URL" <?php if(!empty($brand['url'])): ?> value="<?php echo e($brand['url']); ?>" <?php else: ?> value="<?php echo e(old('url')); ?>" <?php endif; ?>>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Brand Description*</label>
                                        <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter Brand Description"><?php if(!empty($brand['description'])): ?> <?php echo e($brand['description']); ?> <?php else: ?> <?php echo e(old('description')); ?> <?php endif; ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="meta_title">Meta Title</label>
                                        <input class="form-control" id="meta_title" name="meta_title" rows="3" placeholder="Enter Meta Title" <?php if(!empty($brand['meta_title'])): ?> value="<?php echo e($brand['meta_title']); ?>" <?php else: ?> value="<?php echo e(old('meta_title')); ?>" <?php endif; ?>>
                                    </div>
                                    <div class="form-group">
                                        <label for="meta_description">Meta Description</label>
                                        <input class="form-control" id="meta_description" name="meta_description" rows="3" placeholder="Enter Meta Description" <?php if(!empty($brand['meta_description'])): ?> value="<?php echo e($brand['meta_description']); ?>" <?php else: ?> value="<?php echo e(old('meta_description')); ?>" <?php endif; ?>>
                                    </div>
                                    <div class="form-group">
                                        <label for="meta_keywords">Meta Keywords</label>
                                        <input class="form-control" id="meta_keywords" name="meta_keywords" rows="3" placeholder="Enter Meta Keywords" <?php if(!empty($brand['meta_keywords'])): ?> value="<?php echo e($brand['meta_keywords']); ?>" <?php else: ?> value="<?php echo e(old('meta_keywords')); ?>" <?php endif; ?>>
                                    </div>
                                    <div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card -->

                <!-- SELECT2 EXAMPLE -->
                <div class="card card-default">

                </div>
                <!-- /.card -->

            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\dt_shop-v2\resources\views/admin/brands/add_edit_brand.blade.php ENDPATH**/ ?>