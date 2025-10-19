@extends('layouts.app')

@section('title', 'Add Product - Inventory System')

@section('content')
<div class="page-header">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1 class="page-title">
                <i class="fas fa-plus-circle"></i>
                Add Product
            </h1>
            <p class="page-subtitle">Create a new product in your inventory</p>
        </div>
        <a href="{{ route('products.index') }}" class="btn btn-modern">
            <i class="fas fa-arrow-left"></i>
            Back to Products
        </a>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-lg border-0" style="border-radius: 20px;">
            <div class="card-body p-5">
                <form action="{{ route('products.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label for="name" class="form-label fw-bold">
                            <i class="fas fa-tag text-primary"></i>
                            Product Name
                        </label>
                        <input type="text" name="name" class="form-control form-control-lg" 
                               placeholder="Enter product name" required
                               style="border-radius: 15px; border: 2px solid #e9ecef; padding: 15px;">
                    </div>

                    <div class="mb-4">
                        <label for="price" class="form-label fw-bold">
                            <i class="fas fa-dollar-sign text-success"></i>
                            Price
                        </label>
                        <div class="input-group input-group-lg">
                            <span class="input-group-text" style="border-radius: 15px 0 0 15px; border: 2px solid #e9ecef;">₱</span>
                            <input type="number" name="price" value="{{ old('price', $product->price ?? '') }}" 
                                   class="form-control" placeholder="Enter product price" min="0" step="0.01" required
                                   style="border-radius: 0 15px 15px 0; border: 2px solid #e9ecef; padding: 15px;">
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="stock" class="form-label fw-bold">
                            <i class="fas fa-boxes text-warning"></i>
                            Stock Quantity
                        </label>
                        <input type="number" name="stock" class="form-control form-control-lg" 
                               placeholder="Enter stock quantity" min="0" required
                               style="border-radius: 15px; border: 2px solid #e9ecef; padding: 15px;">
                    </div>

                    <div class="mb-4">
                        <label for="category_id" class="form-label fw-bold">
                            <i class="fas fa-folder text-info"></i>
                            Category
                        </label>
                        <select name="category_id" class="form-select form-select-lg" required
                                style="border-radius: 15px; border: 2px solid #e9ecef; padding: 15px;">
                            <option value="">-- Select Category --</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="d-flex gap-3 justify-content-end">
                        <a href="{{ route('products.index') }}" class="btn btn-secondary btn-lg px-4" 
                           style="border-radius: 50px;">
                            <i class="fas fa-times"></i>
                            Cancel
                        </a>
                        <button type="submit" class="btn btn-success-modern btn-lg px-4">
                            <i class="fas fa-save"></i>
                            Save Product
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
