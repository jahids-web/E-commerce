@extends('layouts.dashboard')

@section('addproduct')
    active
@endsection

@section('content')

<div class="container">
    <div class="row gap">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    list Product
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>SL.No</th>
                            <th>Product Name</th>
                            <th>Product Price</th>
                            <th>Product Thumbnail Photo</th> 
                           <th>Product Multiple Photo</th>
                         
                          </tr>
                        </thead>
                        <tbody>
                            @forelse ($products as $product)
                            <tr>
                                <td>{{ $loop->index +1 }}</td>
                                <td>{{ $product->product_name }}</td>
                                <td>{{ $product->product_price }}</td>
                                <td>
                                    <img width="70" src="{{ asset('uploads/product_thumbnail') }}/{{ $product->product_thumbnail_photo }}" alt="Not Found">
                                </td>
                                <td>
                                @forelse($product->get_multiple_photos as $multiple_photo)
                                    <img width="70" src="{{ asset('uploads/product_multiple') }}/{{ $multiple_photo->multiple_photo_name }}" alt="Not Found">
                                    <br>
                                    <br>
                                    @empty
                                    <span>No Multiple Photo</span>
                                @endforelse
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
                    Add Product
                </div>
                <div class="card-body">
                    {{-- @if ($errors->all())
                        <div class="alert alert-danger">
                            @foreach ($errors->all()as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </div>
                    @endif --}}
                    <form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="form-group">
                            <label > Category Name</label>
                            <select  class="form-control" name="category_id">
                                <option value="">-Select One-</option>
                                
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label >Product Name</label>
                            <input type="text" class="form-control" placeholder="Enter Your Product Name" name="product_name">  
                        </div>

                        <div class="form-group">
                            <label >Product price</label>
                            <input type="text" class="form-control" placeholder="Enter Your Product price" name="product_price">  
                        </div>

                        <div class="form-group">
                            <label >Product Quantity</label>
                            <input type="text" class="form-control" placeholder="Enter Your Product price" name="product_quantity">  
                        </div>

                        <div class="form-group">
                            <label >Product Short Description</label>
                            <textarea name="product_short_description" class="form-control" rows="4" cols="40"></textarea>
                           
                        </div>

                        <div class="form-group">
                            <label >Product Long Description</label>
                            <textarea name="product_long_description" class="form-control" rows="4" cols="40"></textarea>
                        </div>

                        <div class="form-group">
                            <label >Product Thumbnail Photo</label>
                            <input type="file" class="form-control"  name="product_thumbnail_photo">  
                        </div>
                        <div class="form-group">
                            <label >Product Multiple Photos</label>
                            <input type="file" class="form-control"  name="product_multiple_photos[]" multiple>  
                        </div>
                       
                        <button type="submit" class="btn btn-success">Add Product</button>
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