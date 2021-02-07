
@extends('layouts.dashboard')

@section('content')

<div class="container">
    <div class="row gap ">
        {{-- <div class="col-md-8 m-auto">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ url('index.blade') }}">Add Category</a></li>
                  
                </ol>
              </nav>
        </div> --}}
        <div class="col-md-8 m-auto">
            <div class="card">
                <div class="card-header">
                    Edit Category
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('category.update',$category->id) }}" enctype="multipart/form-data">
                        {{ method_field('PUT') }}
                        @csrf
                        <div class="form-group">
                            <label >Category Name</label>
                            <input type="text" class="form-control" value="{{ $category->category_name }}" placeholder="Enter Your Category Name" name="category_name">  
                        </div>
                        <div class="form-group">
                            <label >Category Photo</label>
                            <input type="file" class="form-control"  name="category_photo">  
                        </div>
                       
                        <button type="submit" class="btn btn-success">Edit Category</button>
                     </form>
                    
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