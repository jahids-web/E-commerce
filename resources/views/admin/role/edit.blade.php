@extends('layouts.dashboard')

@section('#')
    active
@endsection

@section('content')

<div class="container">
    <div class="row gap">
        <div class="col-md-4 m-auto">
            <div class="card">
                <div class="card-header">
                   Change Permission - {{ $user->name }}
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('role.permission.edit.post') }}" >
                        @csrf
                        <div class="form-group">
                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                            <label >Select Permissions</label>
                            <br>
                            @foreach($permissions as $permission)
                            <label class="ckbox">
                                <ul>
                                    <li>
                                        <input {{ ($user->hasPermissionTo($permission->name)) ? "checked":""}} type="checkbox" name="permission[]" value="{{ $permission->name }}">
                                <span>{{ $permission->name }}</span>
                                    </li>
                                </ul>                                
                            </label>
                            @endforeach
                        </div>
                        <button type="submit" class="btn btn-info">Change Permissions</button>
                     </form>
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