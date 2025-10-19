@extends('layouts.app')

@section('title', 'Edit Product - Inventory System')

@section('content')
<div class="page-header">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1 class="page-title">
                <i class="fas fa-edit"></i>
                Edit Product
            </h1>
            <p class="page-subtitle">Update product information</p>
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
                <form action="{{ route('products.update', $product->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="name" class="form-label fw-bold">
                            <i class="fas fa-tag text-primary"></i>
                            Product Name
                        </label>
                        <input type="text" name="name" value="{{ $product->name }}" 
                               class="form-control form-control-lg" required
                               style="border-radius: 15px; border: 2px solid #e9ecef; padding: 15px;">
                    </div>

                    <div class="mb-4">
                        <label for="price" class="form-label fw-bold">
                            <i class="fas fa-dollar-sign text-success"></i>
                            Price
                        </label>
                        <div class="input-group input-group-lg">
                            <span class="input-group-text" style="border-radius: 15px 0 0 15px; border: 2px solid #e9ecef;">₱</span>
                            <input type="number" step="0.01" name="price" value="{{ $product->price }}" 
                                   class="form-control" required
                                   style="border-radius: 0 15px 15px 0; border: 2px solid #e9ecef; padding: 15px;">
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="stock" class="form-label fw-bold">
                            <i class="fas fa-boxes text-warning"></i>
                            Stock Quantity
                        </label>
                        <input type="number" name="stock" value="{{ $product->stock }}" 
                               class="form-control form-control-lg" min="0" required
                               style="border-radius: 15px; border: 2px solid #e9ecef; padding: 15px;">
                    </div>

                    <div class="mb-4">
                        <label for="category_id" class="form-label fw-bold">
                            <i class="fas fa-folder text-info"></i>
                            Category
                        </label>
                        <select name="category_id" class="form-select form-select-lg" required
                                style="border-radius: 15px; border: 2px solid #e9ecef; padding: 15px;">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="d-flex gap-3 justify-content-end">
                        <a href="{{ route('products.index') }}" class="btn btn-secondary btn-lg px-4" 
                           style="border-radius: 50px;">
                            <i class="fas fa-times"></i>
                            Cancel
                        </a>
                        <button type="submit" class="btn btn-warning-modern btn-lg px-4">
                            <i class="fas fa-save"></i>
                            Update Product
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
