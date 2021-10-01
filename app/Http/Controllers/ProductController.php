<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;

class ProductController extends Controller {

    public function index() {
        return view('product.index', [
            'products' => Product::all()
        ]);
    }

    public function create() {
        return view('product.create', [
            'brands' => Brand::all(),
            'subcategories' => Category::all()
        ]);
    }

    public function store() {
        $attributes = request()->validate([
            'name_ar' => 'required|string|max:150|min:5|unique:products,name_ar',
            'name_en' => 'required|string|max:150|min:5|unique:products,name_en',
            'price' => 'required|numeric|max:9999999999.999|min:0.0',
            'quantity' => 'required|integer|max:99999999999|min:1',
            'photo' => 'required|image',
            'detials_ar' => 'required|string|max:500|min:5',
            'detials_en' => 'required|string|max:500|min:5',
            'status' => 'required|accepted',
            'subcategory_id' => 'required|integer|max:99999999999|min:0|exists:subcategories,id',
            'brand_id' => 'required|integer|max:99999999999|min:0|exists:brands,id'
        ]);

        $attributes['status'] = (bool)$attributes['status'];
        $attributes['photo'] = request()->file('photo')->store('products');
        
        Product::create($attributes);

        return redirect(route('product.create'));
    }


    public function edit($id) {
        $product = Product::find($id);


        if ($product != null) {
            return view('product.edit', [
                'product' => $product,
                'brands' => Brand::all(),
                'subcategories' => Category::all()
            ]);
        }
        else {
            return redirect(route('product.index'));
        }
    }


    public function update($id) {
        $attributes = request()->validate([
            'name_ar' => 'required|string|max:150|min:5|unique:products,name_ar,name_ar',
            'name_en' => 'required|string|max:150|min:5|unique:products,name_en,name_en',
            'price' => 'required|numeric|max:9999999999.999|min:0.0',
            'quantity' => 'required|integer|max:99999999999|min:1',
            'photo' => 'required|image',
            'detials_ar' => 'required|string|max:500|min:5',
            'detials_en' => 'required|string|max:500|min:5',
            'status' => 'required|accepted',
            'subcategory_id' => 'required|integer|max:99999999999|min:0|exists:subcategories,id',
            'brand_id' => 'required|integer|max:99999999999|min:0|exists:brands,id'
        ]);

        $product = Product::find($id);

        if ($product != null) {
    
            $path = request()->file('photo')->store('products');
            $attributes['status'] = (bool)$attributes['status'];
            $attributes['photo'] = $path;
            
            $product->update($attributes);

            return redirect(route('product.edit', $id));
        }
        else {
            return redirect(route('product.index'));
        }
    }

    public function delete($id) {
        $product = Product::find($id);

    
        if ($product != null) {
            $product->delete();

            return redirect(route('product.index'));
        }
        else {
            return redirect(route('product.index'));
        }
    }
    
}