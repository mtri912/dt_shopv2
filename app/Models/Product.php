<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function category() {
        return $this->belongsTo('App\Models\Category','category_id')->with('parentcategory');
    }

    public function brand() {
        return $this->belongsTo('App\Models\Brand','brand_id');
    }

    public static function productsFilters() {

        // Product Filters
        $productFilters['materialArray'] = array('Cotton','Polyester','Wool');
        $productFilters['sleeveArray'] = array('Full Sleeve','Half Sleeve','Short Sleeve');
        $productFilters['patternArray'] = array('Checked','Plain','Printed','Self','Solid');
        $productFilters['fitArray'] = array('Regular','Slim');
        $productFilters['occasionArray'] = array('Casual','Formal');
        return $productFilters;
    }

    public function images() {
        return $this->hasMany('App\Models\ProductsImage');
    }

    public function attributes() {
        return $this->hasMany('App\Models\ProductsAttribute');
    }

//    public static function  getAttributePrice($product_id, $size) {
//        $attributePrice = ProductsAttribute::where(['product_id'=>$product_id,'size'=>$size])->first()->toArray();
//        // For Getting Product Discount
//        $productDetails = Product::select(['product_discount','category_id','brand_id'])->where('id',$product_id)->first();
//        // For Getting Category Discount
//        $categoryDetails = Category::select(['category_discount'])->where('id',$productDetails['category_id'])->first();
//        // For Getting Brand Discount
//        $brandDetails = Brand::select(['brand_discount'])->where('id',$productDetails['brand_id'])->first();
//
//        if ($productDetails) {
//            $productDetails = $productDetails->toArray();
//        } else {
//            $productDetails = [];
//        }
//
//        if ($categoryDetails) {
//            $categoryDetails = $categoryDetails->toArray();
//        } else {
//            $categoryDetails = [];
//        }
//
//        if ($brandDetails) {
//            $brandDetails = $brandDetails->toArray();
//        } else {
//            $brandDetails = [];
//        }
//
//        if (isset($productDetails['product_discount']) && $productDetails['product_discount'] > 0) {
//            // 1st case if there is any Product Discount
//            $discount = $attributePrice['price'] * $productDetails['product_discount'] / 100;
//            $discount_percent = $productDetails['product_discount'];
//            $final_price = $attributePrice['price'] - $discount;
//        } elseif (isset($categoryDetails['category_discount']) && $categoryDetails['category_discount'] > 0) {
//            // 2nd case if there is any Category Discount
//            $discount = $attributePrice['price'] * $categoryDetails['category_discount'] / 100;
//            $discount_percent = $categoryDetails['category_discount'];
//            $final_price = $attributePrice['price'] - $discount;
//        } elseif (isset($brandDetails['brand_discount']) && $brandDetails['brand_discount'] > 0) {
//            // 3rd case if there is any Brand Discount
//            $discount = $attributePrice['price'] * $brandDetails['brand_discount'] / 100;
//            $discount_percent = $brandDetails['brand_discount'];
//            $final_price = $attributePrice['price'] - $discount;
//        } else {
//            // If there is no discount
//            $discount = 0;
//            $discount_percent = 0;
//            $final_price = $attributePrice['price'];
//        }
//
//        return array(
//            'product_price' => $attributePrice['price'],
//            'final_price' => $final_price,
//            'discount' => $discount,
//            'discount_percent' => $discount_percent
//        );
//    }

    public static function getAttributePrice($product_id, $size) {
        $attributePrice = ProductsAttribute::where(['product_id' => $product_id, 'size' => $size])->first();
        if ($attributePrice) {
            $attributePrice = $attributePrice->toArray();
        } else {
            // Xử lý trường hợp không tìm thấy thuộc tính sản phẩm
            return [
                'product_price' => 0,
                'final_price' => 0,
                'discount' => 0,
                'discount_percent' => 0
            ];
        }

        // Lấy chi tiết sản phẩm
        $productDetails = Product::select(['product_discount', 'category_id', 'brand_id'])->where('id', $product_id)->first();
        if ($productDetails) {
            $productDetails = $productDetails->toArray();
        } else {
            $productDetails = [];
        }

        // Lấy chi tiết danh mục (nếu có)
        if (!empty($productDetails) && isset($productDetails['category_id'])) {
            $categoryDetails = Category::select(['category_discount'])->where('id', $productDetails['category_id'])->first();
            if ($categoryDetails) {
                $categoryDetails = $categoryDetails->toArray();
            } else {
                $categoryDetails = [];
            }
        } else {
            $categoryDetails = [];
        }

        // Lấy chi tiết thương hiệu (nếu có)
        if (!empty($productDetails) && isset($productDetails['brand_id'])) {
            $brandDetails = Brand::select(['brand_discount'])->where('id', $productDetails['brand_id'])->first();
            if ($brandDetails) {
                $brandDetails = $brandDetails->toArray();
            } else {
                $brandDetails = [];
            }
        } else {
            $brandDetails = [];
        }

        if (isset($productDetails['product_discount']) && $productDetails['product_discount'] > 0) {
            // Trường hợp có giảm giá sản phẩm
            $discount = $attributePrice['price'] * $productDetails['product_discount'] / 100;
            $discount_percent = $productDetails['product_discount'];
            $final_price = $attributePrice['price'] - $discount;
        } elseif (isset($categoryDetails['category_discount']) && $categoryDetails['category_discount'] > 0) {
            // Trường hợp có giảm giá danh mục
            $discount = $attributePrice['price'] * $categoryDetails['category_discount'] / 100;
            $discount_percent = $categoryDetails['category_discount'];
            $final_price = $attributePrice['price'] - $discount;
        } elseif (isset($brandDetails['brand_discount']) && $brandDetails['brand_discount'] > 0) {
            // Trường hợp có giảm giá thương hiệu
            $discount = $attributePrice['price'] * $brandDetails['brand_discount'] / 100;
            $discount_percent = $brandDetails['brand_discount'];
            $final_price = $attributePrice['price'] - $discount;
        } else {
            // Trường hợp không có giảm giá
            $discount = 0;
            $discount_percent = 0;
            $final_price = $attributePrice['price'];
        }

        return [
            'product_price' => $attributePrice['price'],
            'final_price' => $final_price,
            'discount' => $discount,
            'discount_percent' => $discount_percent
        ];
    }

    public static function productStatus($product_id){
        $productStatus = Product::select('status')->where('id', $product_id)->first();
        return $productStatus->status;
    }

    public static function getProductDetails($product_id) {
        $getProductDetails = Product::where('id',$product_id)->first()->toArray();
        return $getProductDetails;
    }

    public static function  getAttributeDetails($product_id, $size) {
        $getAttributeDetails = ProductsAttribute::where(['product_id'=>$product_id,'size'=>$size])->first()->toArray();
        return $getAttributeDetails;
    }

    public static function getProductImage($product_id){
        $image = "";
        $productImageCount = ProductsImage::select('product_id',$product_id)->count();
        if ($productImageCount>0) {
            $getProductImage = ProductsImage::select('image')->where('product_id',$product_id)->orderBy('image_sort','asc')->first();
            $image = $getProductImage->image;

        }
        return $image;
    }
}
