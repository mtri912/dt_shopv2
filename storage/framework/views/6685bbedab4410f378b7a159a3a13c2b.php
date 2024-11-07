

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
                                    <?php if(Session::has('success_message')): ?>
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <strong>Success:</strong> <?php echo e(Session::get('success_message')); ?>

                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    <?php endif; ?>
                                <form name="productForm" id="productForm" <?php if(empty($product['id'])): ?> action="<?php echo e(url('admin/add-edit-product')); ?>" <?php else: ?> action="<?php echo e(url('admin/add-edit-product/'.$product['id'])); ?>" <?php endif; ?> method="post" enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>
                                        <div class="form-group">
                                            <label for="category_id">Select Category*</label>
                                            <select name="category_id" class="form-control">
                                                <option value="">Select</option>
                                                <?php $__currentLoopData = $getCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option <?php if(!empty(@old('category_id')) && $cat['id']==@old('category_id')): ?> selected="" <?php elseif(!empty($product['category_id']) && $product['category_id']==$cat['id']): ?> selected="" <?php endif; ?> value="<?php echo e($cat['id']); ?>"><?php echo e($cat['category_name']); ?></option>
                                                    <?php if(!empty($cat['subcategories'])): ?>
                                                        <?php $__currentLoopData = $cat['subcategories']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option <?php if(!empty(@old('category_id')) && $subcat['id']==@old('category_id')): ?> selected="" <?php elseif(!empty($product['category_id']) && $product['category_id']==$subcat['id']): ?> selected="" <?php endif; ?> value="<?php echo e($subcat['id']); ?>">&nbsp;&nbsp;&nbsp;&nbsp;&raquo;&raquo;<?php echo e($subcat['category_name']); ?></option>
                                                            <?php if(!empty($subcat['subcategories'])): ?>
                                                                <?php $__currentLoopData = $subcat['subcategories']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subsubcat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <option <?php if(!empty(@old('category_id')) && $subsubcat['id']==@old('category_id')): ?> selected="" <?php elseif(!empty($product['category_id']) && $product['category_id']==$subsubcat['id']): ?> selected="" <?php endif; ?> value="<?php echo e($subsubcat['id']); ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&raquo;&raquo;<?php echo e($subsubcat['category_name']); ?></option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            <?php endif; ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="brand_id">Select Brand*</label>
                                            <select name="brand_id" id="brand_id" class="form-control">
                                                <option value="">Select</option>
                                                <?php $__currentLoopData = $getBrands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($brand['id']); ?>" <?php if(!empty($product['brand_id'] && $product['brand_id']==$brand['id'])): ?> selected="" <?php endif; ?>><?php echo e($brand['brand_name']); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="product_name">Product Name*</label>
                                            <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Enter Product Name" <?php if(!empty($product['product_name'])): ?> value="<?php echo e($product['product_name']); ?>" <?php else: ?> value="<?php echo e(@old('product_name')); ?>" <?php endif; ?>>
                                        </div>
                                        <div class="form-group">
                                            <label for="product_code">Product Code*</label>
                                            <input type="text" class="form-control" id="product_code" name="product_code" placeholder="Enter Product Code" <?php if(!empty($product['product_code'])): ?> value="<?php echo e($product['product_code']); ?>" <?php else: ?> value="<?php echo e(@old('product_code')); ?>" <?php endif; ?>>
                                        </div>
                                        <div class="form-group">
                                            <label for="product_color">Product Color*</label>
                                            <input type="text" class="form-control" id="product_color" name="product_color" placeholder="Enter Product Color" <?php if(!empty($product['product_color'])): ?> value="<?php echo e($product['product_color']); ?>" <?php else: ?> value="<?php echo e(@old('product_color')); ?>" <?php endif; ?>>
                                        </div>
                                        <?php $familyColors = \App\Models\Color::colors() ?>
                                        <div class="form-group">
                                            <label for="family_color">Family Color*</label>
                                            <select class="form-control" id="family_color" name="family_color">
                                                <option value="">Select</option>
                                                <?php $__currentLoopData = $familyColors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($color['color_name']); ?>" <?php if(!empty(@old('family_color')) && @old('family_color')==$color['color_name']): ?> selected="" <?php elseif(!empty($product['family_color']) && $product['family_color']==$color['color_name']): ?> selected="" <?php endif; ?>><?php echo e($color['color_name']); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="group_code">Group Code</label>
                                            <input type="text" class="form-control" id="group_code" name="group_code" placeholder="Enter Group Code" <?php if(!empty($product['group_code'])): ?> value="<?php echo e($product['group_code']); ?>" <?php else: ?> value="<?php echo e(@old('group_code')); ?>" <?php endif; ?>>
                                        </div>
                                        <div class="form-group">
                                            <label for="product_price">Product Price*</label>
                                            <input type="text" class="form-control" id="product_price" name="product_price" placeholder="Enter Product Price" <?php if(!empty($product['product_price'])): ?> value="<?php echo e($product['product_price']); ?>" <?php else: ?> value="<?php echo e(@old('product_price')); ?>" <?php endif; ?>>
                                        </div>
                                        <div class="form-group">
                                            <label for="product_discount">Product Discount (%)</label>
                                            <input type="text" class="form-control" id="product_discount" name="product_discount" placeholder="Enter Product Discount (%)" <?php if(!empty($product['product_discount'])): ?> value="<?php echo e($product['product_discount']); ?>" <?php else: ?> value="<?php echo e(@old('product_discount')); ?>" <?php endif; ?>>
                                        </div>
                                        <div class="form-group">
                                            <label for="product_weight">Product Weight</label>
                                            <input type="text" class="form-control" id="product_weight" name="product_weight" placeholder="Enter Product Weight" <?php if(!empty($product['product_weight'])): ?> value="<?php echo e($product['product_weight']); ?>" <?php else: ?> value="<?php echo e(@old('product_weight')); ?>" <?php endif; ?>>
                                        </div>
                                        <div class="form-group">
                                            <label for="product_images">Product Images (Recommend Size: 1040 x 1200)</label>
                                            <input type="file" class="form-control" id="product_images" name="product_images[]" multiple="">
                                            <table cellpadding="10" cellspacing="10" border="1" style="margin: 5px;"><tr>
                                                    <?php $__currentLoopData = $product['images']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <td style="background-color: #f9f9f9";>
                                                            <a target="_blank" href="<?php echo e(url('front/images/products/large/'.$image['image'])); ?>"><img style="width: 60px" src="<?php echo e(asset('front/images/products/small/'.$image['image'])); ?>"></a>&nbsp;
                                                            <input type="hidden" name="image[]" value="<?php echo e($image['image']); ?>">
                                                            <input style="width: 30px" type="text" name="image_sort[]" value="<?php echo e($image['image_sort']); ?>">
                                                            <a style="color: #3f6ed3" class="confirmDelete" title="Delete Product Image" href="javascript:void(0)" record="product-image" recordid="<?php echo e($image['id']); ?>">
                                                                <i class="fas fa-trash"></i>
                                                            </a>
                                                        </td>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="form-group">
                                            <label for="product_video">Product Video (Recommend Size: Less than 2 MB)</label>
                                            <input type="file" class="form-control" id="product_video" name="product_video">
                                            <?php if(!empty($product['product_video'])): ?>
                                                <a target="_blank" href="<?php echo e(url('front/videos/products/'.$product['product_video'])); ?>" style="color: #ccc">View</a> |
                                                <a style="color: #ccc" class="confirmDelete" title="Delete Product Video" href="javascript:void(0)" record="product-video" recordid="<?php echo e($product['id']); ?>">
                                                    Delete
                                                </a>
                                            <?php endif; ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Added Attributes</label>
                                            <table style="background-color: #52585e; width: 100%;" cellpadding="5">
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Size</th>
                                                    <th>SKU</th>
                                                    <th>Price</th>
                                                    <th>Stock</th>
                                                    <th>Action</th>
                                                </tr>
                                                <?php $__currentLoopData = $product['attributes']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <input type="hidden" name="attributeId[]" value="<?php echo e($attribute['id']); ?>">
                                                    <tr>
                                                        <td><?php echo e($attribute['id']); ?></td>
                                                        <td><?php echo e($attribute['size']); ?></td>
                                                        <td><?php echo e($attribute['sku']); ?></td>
                                                        <td>
                                                            <input style="width: 100px;" type="number" name="price[]" value="<?php echo e($attribute['price']); ?>">
                                                        </td>
                                                        <td>
                                                            <input style="width: 100px;" type="number" name="stock[]" value="<?php echo e($attribute['stock']); ?>">
                                                        </td>
                                                        <td>
                                                            <?php if($attribute['status'] == 1): ?>
                                                                <a class="updateAttributeStatus" id="attribute-<?php echo e($attribute['id']); ?>" attribute_id="<?php echo e($attribute['id']); ?>" style="color: #3f6ed3" href="javascript:void(0)">
                                                                    <i class="fas fa-toggle-on" status="Active"></i>
                                                                </a>
                                                            <?php else: ?>
                                                                <a class="updateAttributeStatus" id="attribute-<?php echo e($attribute['id']); ?>" attribute_id="<?php echo e($attribute['id']); ?>" style="color: grey" href="javascript:void(0)">
                                                                    <i class="fas fa-toggle-off" status="Inactive"></i>
                                                                </a>
                                                            <?php endif; ?>
                                                            &nbsp;&nbsp;
                                                            <a style="color: #3f6ed3" class="confirmDelete" title="Delete Attribute" href="javascript:void(0)" record="attribute" recordid="<?php echo e($attribute['id']); ?>">
                                                                <i class="fas fa-trash"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </table>
                                        </div>
                                        <div class="form-group">
                                            <label>Product Attributes</label>
                                            <div class="field_wrapper">
                                                <div>
                                                    <input type="text" name="size[]" id="size" placeholder="Size" style="width: 120px"/>
                                                    <input type="text" name="sku[]" id="sku" placeholder="SKU" style="width: 120px"/>
                                                    <input type="text" name="price[]" id="price" placeholder="Price" style="width: 120px"/>
                                                    <input type="text" name="stock[]" id="stock" placeholder="Stock" style="width: 120px"/>
                                                    <a href="javascript:void(0);" class="add_button" title="Add field">Add</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="material">Material</label>
                                            <select class="form-control" id="material" name="material">
                                                <option value="">Select</option>
                                                <?php $__currentLoopData = $productFilters['materialArray']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $material): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($material); ?>" <?php if(!empty(@old('material')) && @old('material')==$material): ?> selected="" <?php elseif(!empty($product['material']) && $product['material']==$material): ?> selected="" <?php endif; ?>><?php echo e($material); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="sleeve">Sleeve</label>
                                            <select class="form-control" id="sleeve" name="sleeve">
                                                <option value="">Select</option>
                                                <?php $__currentLoopData = $productFilters['sleeveArray']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sleeve): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($sleeve); ?>" <?php if(!empty(@old('sleeve')) && @old('sleeve')==$sleeve): ?> selected="" <?php elseif(!empty($product['sleeve']) && $product['sleeve']==$sleeve): ?> selected="" <?php endif; ?>><?php echo e($sleeve); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="pattern">Pattern</label>
                                            <select class="form-control" id="pattern" name="pattern">
                                                <option value="">Select</option>
                                                <?php $__currentLoopData = $productFilters['patternArray']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pattern): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($pattern); ?>" <?php if(!empty(@old('pattern')) && @old('pattern')==$pattern): ?> selected="" <?php elseif(!empty($product['pattern']) && $product['pattern']==$pattern): ?> selected="" <?php endif; ?>><?php echo e($pattern); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="fit">Fit</label>
                                            <select class="form-control" id="fit" name="fit">
                                                <option value="">Select</option>
                                                <?php $__currentLoopData = $productFilters['fitArray']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($fit); ?>" <?php if(!empty(@old('fit')) && @old('fit')==$fit): ?> selected="" <?php elseif(!empty($product['fit']) && $product['fit']==$fit): ?> selected="" <?php endif; ?>><?php echo e($fit); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="occasion">Occasion</label>
                                            <select class="form-control" id="occasion" name="occasion">
                                                <option value="">Select</option>
                                                <?php $__currentLoopData = $productFilters['occasionArray']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $occasion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($occasion); ?>" <?php if(!empty(@old('occasion')) && @old('occasion')==$occasion): ?> selected="" <?php elseif(!empty($product['occasion']) && $product['occasion']==$occasion): ?> selected="" <?php endif; ?>><?php echo e($occasion); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea type="text" class="form-control" id="description" name="description" placeholder="Enter Product Description"><?php if(!empty($product['description'])): ?> <?php echo e($product['description']); ?> <?php else: ?> <?php echo e(@old('description')); ?> <?php endif; ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="wash_care">Wash Care</label>
                                            <input type="text" class="form-control" id="wash_care" name="wash_care" placeholder="Enter Product Wash Care" <?php if(!empty($product['wash_care'])): ?> value="<?php echo e($product['wash_care']); ?>" <?php else: ?> value="<?php echo e(@old('wash_care')); ?>" <?php endif; ?>>
                                        </div>
                                        <div class="form-group">
                                            <label for="search_keywords">Search Keywords</label>
                                            <textarea class="form-control" id="search_keywords" name="search_keywords" placeholder="Enter Product Search Keywords"> <?php if(!empty($product['search_keywords'])): ?> <?php echo e($product['search_keywords']); ?> <?php else: ?> <?php echo e(@old('search_keywords')); ?> <?php endif; ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="meta_title">Meta Title</label>
                                            <input class="form-control" id="meta_title" name="meta_title" rows="3" placeholder="Enter Meta Title" <?php if(!empty($product['meta_title'])): ?> value="<?php echo e($product['meta_title']); ?>" <?php else: ?> value="<?php echo e(@old('meta_title')); ?>" <?php endif; ?>>
                                        </div>
                                        <div class="form-group">
                                            <label for="meta_description">Meta Description</label>
                                            <input class="form-control" id="meta_description" name="meta_description" rows="3" placeholder="Enter Meta Description" <?php if(!empty($product['meta_description'])): ?> value="<?php echo e($product['meta_description']); ?>" <?php else: ?> value="<?php echo e(@old('meta_description')); ?>" <?php endif; ?>>
                                        </div>
                                        <div class="form-group">
                                            <label for="meta_keywords">Meta Keywords</label>
                                            <input class="form-control" id="meta_keywords" name="meta_keywords" rows="3" placeholder="Enter Meta Keywords" <?php if(!empty($product['meta_keywords'])): ?> value="<?php echo e($product['meta_keywords']); ?>" <?php else: ?> value="<?php echo e(@old('meta_keywords')); ?>" <?php endif; ?>>
                                        </div>
                                        <div class="form-group">
                                            <label for="is_featured">Featured Item</label>
                                            <input type="checkbox"  id="is_featured" name="is_featured" value="Yes" <?php if(!empty($product['is_featured']) && $product['is_featured']=="Yes"): ?> checked="" <?php endif; ?>>
                                        </div>
                                        <div class="form-group">
                                            <label for="is_bestseller">Best Seller</label>
                                            <input type="checkbox"  id="is_bestseller" name="is_bestseller" value="Yes" <?php if(!empty($product['is_bestseller']) && $product['is_bestseller']=="Yes"): ?> checked="" <?php endif; ?>>
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

<?php echo $__env->make('admin.layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\dt_shop-v2\resources\views/admin/products/add_edit_product.blade.php ENDPATH**/ ?>