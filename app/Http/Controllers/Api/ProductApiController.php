<?php

namespace App\Http\Controllers\Api;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use App\Http\Controllers\Api\ApiController;

class ProductApiController extends ApiController
{
   public function getAll()
   {
      $products = Product::all();



      return $this->jsonSuccess(['products' => $products], 'Success');
   }

   public function get($id)
   {
      $product = Product::find($id);

      if ($product == null) {
         return $this->jsonError(404);
      }

      return $this->jsonSuccess(['products' => [$product]], 'Success');
   }

   public function create()
   {
      $brands = Brand::all();
      $categories = Category::all();
      $subCategories = Subcategory::all();

      return $this->jsonSuccess((object)[
         'brands' => $brands,
         'category' => $categories,
         'Subcategory' => $subCategories
      ], 'Success');
   }

   public function store()
   {
      $attributes = request()->validate([
         'name_ar' => 'required|string|max:150|min:5|unique:products,name_ar',
         'name_en' => 'required|string|max:150|min:5|unique:products,name_en',
         'price' => 'required|numeric|max:9999999999.999|min:0.0',
         'quantity' => 'required|integer|max:99999999999|min:1',
         'detials_ar' => 'required|string|max:500|min:5',
         'detials_en' => 'required|string|max:500|min:5',
         'status' => 'required|accepted',
         'subcategory_id' => 'required|integer|max:99999999999|min:0|exists:subcategories,id',
         'brand_id' => 'required|integer|max:99999999999|min:0|exists:brands,id'
      ]);


      $attributes['status'] = (bool)$attributes['status'];

      $product = Product::create($attributes);

      return $this->jsonSuccess([
         'product' => $product
      ], 'Success');
   }

   public function edit($id, $store)
   {
      $attributes = request()->validate([
         'name_ar' => 'required|string|max:150|min:5|unique:products,name_ar',
         'name_en' => 'required|string|max:150|min:5|unique:products,name_en',
         'price' => 'required|numeric|max:9999999999.999|min:0.0',
         'quantity' => 'required|integer|max:99999999999|min:1',
         'detials_ar' => 'required|string|max:500|min:5',
         'detials_en' => 'required|string|max:500|min:5',
         'status' => 'required|accepted',
         'subcategory_id' => 'required|integer|max:99999999999|min:0|exists:subcategories,id',
         'brand_id' => 'required|integer|max:99999999999|min:0|exists:brands,id'
      ]);

      $product = Product::find($id);

      if ($product != null) {
         $attributes['status'] = (bool)$attributes['status'];

         $product->update($attributes);

         return $this->jsonSuccess([
            'product' => $product
         ], 'Success');
      }

      return $this->jsonError(404);
   }

   public function delete($id)
   {
      $product = Product::find($id);

      if ($product == null) {
         return $this->jsonError(404);
      }

      $product->delete();
      $this->jsonSuccess([], 'Success');
   }
}
