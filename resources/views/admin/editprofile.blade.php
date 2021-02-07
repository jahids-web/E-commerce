@extends('layouts.dashboard')

@section('content')
<div class="container">
<div class="row gap">
    <div class="col-md-6 m-auto">
      @if (session('password_change_success'))
      <div class="alert alert-success">
        {{ session('password_change_success') }}
      </div>
      @endif
        <div class="card">
            <div class="card-header">
                Chamge Password
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('changepassword') }}">
                    @csrf
                    <input type="hidden" name="faq_id" value="">
                    <div class="form-group">
                      <label >Old Password</label>
                      <input type="password" class="form-control" value="" placeholder="Enter Your old password" name="old_password">  
                    </div>

                    <div class="form-group">
                        <label>New Password</label>
                        <input type="password" class="form-control" value="" placeholder="Enter Your new password" name="password">  
                      </div>

                      <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" class="form-control" value="" placeholder="Enter Your confirm password" name="password_confirmation">  
                      </div>
                    <button type="submit" class="btn btn-info">Change</button>
                  </form>
                  <br>
                  @if($errors->all())
                  <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                 </div>
                  @endif
                  
                
            </div>
        </div>
    </div>
</div>
</div>



<style>
    .gap{
      padding-top: 200px;
    }
</style>

@endsection