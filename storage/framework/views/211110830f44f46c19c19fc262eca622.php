

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
                                <form name="categoryForm" id="categoryForm" <?php if(empty($category['id'])): ?> action="<?php echo e(url('admin/add-edit-category')); ?>" <?php else: ?> action="<?php echo e(url('admin/add-edit-category/'.$category['id'])); ?>" <?php endif; ?> method="post" enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>
                                    <div class="form-group">
                                        <label for="category_name">Category Name*</label>
                                        <input type="text" class="form-control" id="category_name" name="category_name" placeholder="Enter Category Name" <?php if(!empty($category['category_name'])): ?> value="<?php echo e($category['category_name']); ?>" <?php else: ?> value="<?php echo e(old('category_name')); ?>" <?php endif; ?>>
                                    </div>
                                    <div class="form-group">
                                        <label for="category_name">Category Level (Parent Category)*</label>
                                        <select name="parent_id" class="form-control">
                                            <option value="">Select</option>
                                            <option value="0" <?php if(($category['parent_id']==0)): ?> selected="" <?php endif; ?>>Main Category</option>
                                            <?php $__currentLoopData = $getCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option <?php if(isset($category['parent_id'])&&$category['parent_id']==$cat['id']): ?> selected <?php endif; ?> value="<?php echo e($cat['id']); ?>"><?php echo e($cat['category_name']); ?></option>
                                                <?php if(!empty($cat['subcategories'])): ?>
                                                    <?php $__currentLoopData = $cat['subcategories']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($subcat['id']); ?>" <?php if(isset($category['parent_id'])&&$category['parent_id']==$subcat['id']): ?> selected <?php endif; ?>>&nbsp;&nbsp;&nbsp;&nbsp;&raquo;&raquo;<?php echo e($subcat['category_name']); ?></option>
                                                        <?php if(!empty($subcat['subcategories'])): ?>
                                                            <?php $__currentLoopData = $subcat['subcategories']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subsubcat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e($subsubcat['id']); ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&raquo;&raquo;<?php echo e($subsubcat['category_name']); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="category_image">Category Image*</label>
                                        <input type="file" class="form-control" id="category_image" name="category_image" placeholder="Enter Category Name">
                                        <?php if(!empty($category['category_image'])): ?>
                                            <a target="_blank" href="<?php echo e(url('front/images/categories/'.$category['category_image'])); ?>"><img style="width: 50px; margin: 10px" src="<?php echo e(asset('front/images/categories/'.$category['category_image'])); ?>"></a>
                                            <a style="color: #3f6ed3" class="confirmDelete" title="Delete Category Image" href="javascript:void(0)" record="category-image" recordid="<?php echo e($category['id']); ?>">
                                                <i style="color: #fff" class="fas fa-trash"></i>
                                            </a>
                                        <?php endif; ?>

                                    </div>
                                    <div class="form-group">
                                        <label for="category_discount">Category Discount*</label>
                                        <input type="text" class="form-control" id="category_discount" name="category_discount" placeholder="Enter Category Discount" <?php if(!empty($category['category_discount'])): ?> value="<?php echo e($category['category_discount']); ?>" <?php else: ?> value="<?php echo e(old('category_discount')); ?>" <?php endif; ?>>
                                    </div>
                                    <div class="form-group">
                                        <label for="url">Category URL*</label>
                                        <input type="text" class="form-control" id="url" name="url" placeholder="Enter Category URL" <?php if(!empty($category['url'])): ?> value="<?php echo e($category['url']); ?>" <?php else: ?> value="<?php echo e(old('url')); ?>" <?php endif; ?>>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Category Description*</label>
                                        <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter Category Description"><?php if(!empty($category['description'])): ?> <?php echo e($category['description']); ?> <?php else: ?> <?php echo e(old('description')); ?> <?php endif; ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="meta_title">Meta Title</label>
                                        <input class="form-control" id="meta_title" name="meta_title" rows="3" placeholder="Enter Meta Title" <?php if(!empty($category['meta_title'])): ?> value="<?php echo e($category['meta_title']); ?>" <?php else: ?> value="<?php echo e(old('meta_title')); ?>" <?php endif; ?>>
                                    </div>
                                    <div class="form-group">
                                        <label for="meta_descriptions">Meta Description</label>
                                        <input class="form-control" id="meta_descriptions" name="meta_descriptions" rows="3" placeholder="Enter Meta Description" <?php if(!empty($category['meta_descriptions'])): ?> value="<?php echo e($category['meta_descriptions']); ?>" <?php else: ?> value="<?php echo e(old('meta_descriptions')); ?>" <?php endif; ?>>
                                    </div>
                                    <div class="form-group">
                                        <label for="meta_keywords">Meta Keywords</label>
                                        <input class="form-control" id="meta_keywords" name="meta_keywords" rows="3" placeholder="Enter Meta Keywords" <?php if(!empty($category['meta_keywords'])): ?> value="<?php echo e($category['meta_keywords']); ?>" <?php else: ?> value="<?php echo e(old('meta_keywords')); ?>" <?php endif; ?>>
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

<?php echo $__env->make('admin.layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\dt_shop-v2\resources\views/admin/categories/add_edit_category.blade.php ENDPATH**/ ?>