@extends('layouts.dashboard')

@section('title', 'Create Product')
@section('home', route('product.index'))


@section('d-content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Create Product</h3>
    </div>
    <div class="card-body">
        <form method="post" action="{{ route('product.create') }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="name_ar">Name Arabic</label>
                        <input type="text" class="form-control" name="name_ar" id="name_ar" placeholder="Please Enter Product Arabic" value="{{ old('name_ar') }}">
                        @error('name_ar')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="name_en">Name Arabic</label>
                        <input type="text" class="form-control" name="name_en" id="name_en" placeholder="Please Enter Product English" value="{{ old('name_en') }}">
                        @error('name_en')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="text" class="form-control" name="price" id="price" placeholder="Please Enter Product Price" value="{{ old('price') }}">
                @error('price')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="quantity">Quantity</label>
                <input type="number" class="form-control" name="quantity" id="quantity" placeholder="Please Enter Product Quantity" value="{{ old('quantity') }}">
                @error('quantity')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="subcategory_id">Sub Category</label>
                        <select class="custom-select" name="subcategory_id" id="subcategory_id">
                            @foreach ($subcategories as $category)
                                <option value="{{ $category->id }}">{{ $category->name_ar }}</option>
                            @endforeach
                        </select>
                        @error('subcategory_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="brand_id ">Brand</label>
                        <select class="custom-select" name="brand_id" id="brand_id">
                            @foreach ($brands as $brand)
                                <option value="{{ $brand->id }}" >{{ $brand->name_ar }}</option>
                            @endforeach
                        </select>
                        @error('brand_id')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="detials_ar">Description Arabic</label>
                        <textarea  class="form-control" name="detials_ar" id="detials_ar" >{{ old('detials_ar') }}</textarea>
                        @error('detials_ar')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="detials_eg">Description English</label>
                        <textarea  class="form-control" name="detials_en" id="detials_en" >{{ old('detials_en') }}</textarea>
                        @error('detials_en')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="custom-file mb-3">
                <input type="file" class="custom-file-input" name="photo" id="photo">
                <label class="custom-file-label" for="photo">Choose file</label>
                 @error('photo')
                        <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-check">
                <input class="form-check-input" name="status" type="checkbox" {{ old('status') ? 'checked' : ''}} >
                <label class="form-check-label">Status</label>
                @error('status')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
</div>
@endsection

@section('script')
<script src="../../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
@endsection

