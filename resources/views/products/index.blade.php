@extends('layouts.app')

@section('title', 'Products - Inventory System')

@section('content')
<div class="page-header">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1 class="page-title">
                <i class="fas fa-box"></i>
                Products
            </h1>
            <p class="page-subtitle">Manage your product inventory</p>
        </div>
        <a href="{{ route('products.create') }}" class="btn btn-success-modern">
            <i class="fas fa-plus"></i>
            Add Product
        </a>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success alert-modern">
        <i class="fas fa-check-circle"></i>
        {{ session('success') }}
    </div>
@endif

<div class="table-modern">
    <table class="table table-hover">
        <thead>
            <tr>
                <th><i class="fas fa-hashtag"></i> ID</th>
                <th><i class="fas fa-tag"></i> Name</th>
                <th><i class="fas fa-dollar-sign"></i> Price</th>
                <th><i class="fas fa-boxes"></i> Stock</th>
                <th><i class="fas fa-folder"></i> Category</th>
                <th><i class="fas fa-calendar"></i> Created</th>
                <th><i class="fas fa-cogs"></i> Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($products as $product)
                <tr>
                    <td><span class="badge bg-primary">{{ $product->id }}</span></td>
                    <td>
                        <strong>{{ $product->name }}</strong>
                    </td>
                    <td>
                        <span class="text-success fw-bold">₱{{ number_format($product->price, 2) }}</span>
                    </td>
                    <td>
                        <span class="badge {{ $product->stock > 10 ? 'bg-success' : ($product->stock > 0 ? 'bg-warning' : 'bg-danger') }}">
                            {{ $product->stock }} {{ $product->stock == 1 ? 'item' : 'items' }}
                        </span>
                    </td>
                    <td>
                        <span class="badge bg-info">
                            {{ $product->category->name ?? 'Uncategorized' }}
                        </span>
                    </td>
                    <td>{{ $product->created_at->format('M d, Y') }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning-modern btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('products.destroy', $product->id) }}" 
                                  method="POST" 
                                  style="display:inline-block"
                                  onsubmit="return confirm('Are you sure you want to delete this product?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger-modern btn-sm" type="submit">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center py-5">
                        <div class="text-muted">
                            <i class="fas fa-box-open fa-3x mb-3"></i>
                            <h5>No products found</h5>
                            <p>Start by adding your first product!</p>
                            <a href="{{ route('products.create') }}" class="btn btn-modern">
                                <i class="fas fa-plus"></i>
                                Add Product
                            </a>
                        </div>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
