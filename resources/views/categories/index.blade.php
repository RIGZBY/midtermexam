@extends('layouts.app')

@section('title', 'Categories - Inventory System')

@section('content')
<div class="page-header">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1 class="page-title">
                <i class="fas fa-tags"></i>
                Categories
            </h1>
            <p class="page-subtitle">Organize your products with categories</p>
        </div>
        <a href="{{ route('categories.create') }}" class="btn btn-success-modern">
            <i class="fas fa-plus"></i>
            Add Category
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
                <th><i class="fas fa-calendar"></i> Created</th>
                <th><i class="fas fa-cogs"></i> Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($categories as $category)
                <tr>
                    <td><span class="badge bg-primary">{{ $category->id }}</span></td>
                    <td>
                        <strong>{{ $category->name }}</strong>
                    </td>
                    <td>{{ $category->created_at->format('M d, Y') }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning-modern btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('categories.destroy', $category->id) }}" 
                                  method="POST" 
                                  style="display:inline-block"
                                  onsubmit="return confirm('Are you sure you want to delete this category?')">
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
                    <td colspan="4" class="text-center py-5">
                        <div class="text-muted">
                            <i class="fas fa-tags fa-3x mb-3"></i>
                            <h5>No categories found</h5>
                            <p>Start by creating your first category!</p>
                            <a href="{{ route('categories.create') }}" class="btn btn-modern">
                                <i class="fas fa-plus"></i>
                                Add Category
                            </a>
                        </div>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
