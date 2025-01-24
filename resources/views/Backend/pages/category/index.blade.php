@extends('Backend.layouts.master')
@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card">
                <div class="card-header">
                    <h3>Category List</h3>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if (session('delete'))
                        <div class="alert alert-danger">{{ session('delete') }}</div>
                    @endif
                    <a href="{{ route('admin.category.create') }}" class="mb-3 btn btn-sm btn-primary" style="float: right"><i
                            data-feather="plus"></i>
                        Add Category</a>
                    <table class="table">
                        <tr>
                            <th>SL</th>
                            <th>Category Name</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        @forelse ($categories as $category)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $category->category_name }}</td>
                                <td><img src="{{ asset($category->image) }}" alt=""></td>
                                <td>
                                    @if ($category->status == 1)
                                        <div class="text-white badge bg-success">Active</div>
                                    @else
                                        <div class="text-white badge bg-danger">Deactive</div>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex justify-content-start">
                                        <a href="{{ route('admin.category.edit', $category->id) }}"
                                            class="mx-2 text-white btn btn-icon btn-primary"><i data-feather="edit"></i></a>
                                        <form action="{{ route('admin.category.destroy', $category->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-white btn btn-icon btn-danger"><i
                                                    data-feather="trash"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-danger">No Category Available!</td>
                            </tr>
                        @endforelse
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
