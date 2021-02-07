@extends('layouts.dashboard')

@section('addproduct')
    active
@endsection

@section('content')

<div class="container">
    <div class="row gap">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    list Product
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>SL.No</th>
                            <th>Coupon Name</th>
                            <th>Coupon Amount</th>
                            <th>Validity Till</th>
                            <th>Validity Status</th>
                            <th>Invalid in Days</th>
                            <th>Created At</th>
                         
                          </tr>
                        </thead>
                        <tbody>
                            @forelse ($coupons as $coupon)
                            <tr>
                                <td>{{ $loop->index +1 }}</td>
                                <td>{{ $coupon->coupon_name }}</td>
                                <td>{{ $coupon->discount_amount }}</td>  
                                <td>{{ $coupon->validity_till }}</td>
                                <td>
                                    @if ($coupon->validity_till >= \Carbon\Carbon::now()->format('y-m-d'))
                                        good
                                    @else
                                        bad

                                    @endif
                                </td> 
                                <td>
                                 @if ($coupon->validity_till >= \Carbon\Carbon::now()->format('y-m-d'))
                                 <span class="badge bg-success text-white">{{ \Carbon\Carbon::parse($coupon->validity_till)->diffInDays(\Carbon\Carbon::now()->format('y-m-d')) }}Days left</span> 
                                @else
                                <span class="badge bg-danger text-white"> Expired{{ \Carbon\Carbon::parse($coupon->validity_till)->diffInDays(\Carbon\Carbon::now()->format('y-m-d')) }}Days ago</span> 

                                @endif
                                 
                                </td> 

                                <td>{{ $coupon->created_at }}</td> 
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

        <div class="col-md-3">
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
                    <form method="POST" action="{{ route('coupon.store') }}" >
                        @csrf
                        <div class="form-group">
                            <label >Coupon Name</label>
                            <input type="text" class="form-control" placeholder="----" name="coupon_name">  
                        </div>

                        <div class="form-group">
                            <label >Discount Amount (%)</label>
                            <input type="text" class="form-control" placeholder="----" name="discount_amount">  
                        </div>

                        <div class="form-group">
                            <label >Validity Till</label>
                            <input type="date" class="form-control"  name="validity_till" >  
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