@extends('layouts.app')

@section('title', 'Add Category - Inventory System')

@section('content')
<div class="page-header">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1 class="page-title">
                <i class="fas fa-plus-circle"></i>
                Add Category
            </h1>
            <p class="page-subtitle">Create a new category for organizing products</p>
        </div>
        <a href="{{ route('categories.index') }}" class="btn btn-modern">
            <i class="fas fa-arrow-left"></i>
            Back to Categories
        </a>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-lg border-0" style="border-radius: 20px;">
            <div class="card-body p-5">
                <form action="{{ route('categories.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-4">
                        <label for="name" class="form-label fw-bold">
                            <i class="fas fa-tag text-primary"></i>
                            Category Name
                        </label>
                        <input type="text" name="name" class="form-control form-control-lg" 
                               placeholder="Enter category name" required
                               style="border-radius: 15px; border: 2px solid #e9ecef; padding: 15px;">
                    </div>

                    <div class="d-flex gap-3 justify-content-end">
                        <a href="{{ route('categories.index') }}" class="btn btn-secondary btn-lg px-4" 
                           style="border-radius: 50px;">
                            <i class="fas fa-times"></i>
                            Cancel
                        </a>
                        <button type="submit" class="btn btn-success-modern btn-lg px-4">
                            <i class="fas fa-save"></i>
                            Save Category
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
