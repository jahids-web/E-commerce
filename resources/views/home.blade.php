@extends('layouts.dashboard')
@section('home')
 active
@endsection
@section('content')
<div class="container">
    <div class="row  gap">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Sale of Last 7 Days</div>
                {{-- {{ __('Dashboard') }} --}}
                <div class="card-body">
                  
                </div>
            </div>
        </div>
    </div>
{{--  --}}
    <div class="row  gap">
      <div class="col-md-12">
          <div class="card">
             
              <div class="card-header">Total Users: {{ $total_users }}</div>
              {{-- {{ __('Dashboard') }} --}}
              <div class="card-body">
                  @if (session('status'))
                      <div class="alert alert-success" role="alert">
                          {{ session('status') }}
                      </div>
                  @endif

                  {{-- {{ __('You are logged in!') }} --}}
                  <table class="table table-striped">

                      <thead>
                        <tr>
                          <th>SL.No</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Created_at</th>
                        </tr>
                      </thead>

                      <tbody>
                        @foreach($users as $index => $user) 
                        <tr>
                            <td>{{ $users->firstItem() +$index }}</td>
                            <td>{{ $user->name}}</td>
                            <td>{{ $user->email}}</td>
                            <td>{{ $user->created_at->format('d/m/Y h:i:s A') }}</td>
                         </tr>
                        @endforeach
                      </tbody>
                    </table>
                    {{ $users->links(   ) }}
              </div>
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
<!--css-->