@extends('dashboard.layout.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2>categorys Categories</h2>
    </div>
    @if (session('success'))
        <div class="alert alert-success  col-lg-6">
            {{ session('success') }}
        </div>
    @endif
    <div class="table-responsive col-lg-6">
        <a href="/dashboard/categories/create" class="btn btn-primary">Create new category</a>
        <table class="table table-striped table-sm mt-4">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Category Name</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $category->name }}</td>
                        <td>
                            <a href="/dashboard/categories/{{ $category->id }}" class="badge bg-warning"><span
                                    data-feather="edit"></span></a>
                            <form action="/dashboard/categories/{{ $category->id }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><span
                                        data-feather="trash-2"></span></button>
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection
