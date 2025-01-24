@extends('Backend.layouts.master')
@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h3>Edit Category</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.category.update',$category->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="" class="form-label">Category Name *</label>
                            <input type="text" class="form-control" name="category_name" value="{{ $category->category_name }}">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Image *</label>
                            <input type="file" class="form-control" name="image">
                            <img src="{{ asset($category->image) }}" alt="" width="70">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Status </label>
                            <select name="status" id="" class="form-select">
                                <option {{ $category->status == 1 ? 'selected' : '' }} value="1">Active</option>
                                <option {{ $category->status == 0 ? 'selected' : '' }} value="0">Deactive</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
