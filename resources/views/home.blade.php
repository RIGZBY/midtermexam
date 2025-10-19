@extends('layouts.app')

@section('content')
<div class="text-center">
    <h1 class="mb-4">📦 Inventory Management System</h1>
    <p class="lead">Manage your Products and Categories easily with this Laravel CRUD app.</p>

    <div class="d-flex justify-content-center gap-3 mt-4">
        <a href="{{ route('products.index') }}" class="btn btn-primary btn-lg">Manage Products</a>
        <a href="{{ route('categories.index') }}" class="btn btn-success btn-lg">Manage Categories</a>
    </div>
</div>
@endsection
