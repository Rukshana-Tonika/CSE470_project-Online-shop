@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Categroy Page</h4>
            <hr>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- to access the data use $item -->
                    @foreach($category as $item)  
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->description }}</td>
                        <td>
                            <img src="{{ asset('assets/uploads/category/'.$item->image) }}" class="cate-image" alt="Image here">
                        </td>
                        <td>
                            <!-- Edit the "product" -->
                            <a href="{{ url('edit-category/'.$item->id) }}" class="btn btn-primary">Edit</a>
                            <!-- Delete the "Category" -->
                            <a href="{{ url('delete-category/'.$item->id) }}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection