@extends('layouts.dashboard')


@section('content')

<div class="container">
    <div class="row gap">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    list Category
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>SL.No</th>
                            <th>Category Name</th>
                            <th>Added By</th>
                            <th>Photo</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @forelse ($categories as $category)
          
                            <tr>
                                <td>{{ $loop->index +1 }}</td>
                                <td>{{ $category->category_name }}</td>
                                <td>{{ $category->connect_to_user_table->name }}</td>
                                <td>
                                    <img width="70" src="{{ asset('uploads/category') }}/{{ $category->category_photo }}" alt="{{ $category->category_photo }}">
                                </td>
                                <td>
                                    <a href="{{ route('category.edit', $category->id) }}" class="btn btn-info btn-sm">Edit</a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="12" class="text-center">No Data Found</td>
                            </tr>
                            @endforelse
                        </tbody>
                      </table>  
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Add Category
                </div>
                <div class="card-body">
                    {{-- @can('see category')  --}}
                    <form method="post" action="{{ route('category.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label >Category Name</label>
                            <input type="text" class="form-control" placeholder="Enter Your Category Name" name="category_name">  
                        </div>
                        <div class="form-group">
                            <label >Category Photo</label>
                            <input type="file" class="form-control"  name="category_photo">  
                        </div>
                       
                        <button type="submit" class="btn btn-success">Add Category</button>
                     </form>

                    {{-- @else --}}
                    You don't have the permission to see this part
                    {{-- @endcan --}}
                   
                    
                </div>
            </div>
        </div>
    </div>

                   
              
               

@endsection

<style>
  .gap{
    padding-top: 100px;
  }
</style>