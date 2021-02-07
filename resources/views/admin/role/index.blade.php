@extends('layouts.dashboard')

@section('#')
    active
@endsection

@section('content')

<div class="container">
    <div class="row gap">
        <div class="col-md-8">
            <div class="card ">
                <div class="card-header">
                    Role list
                </div>
                <div class="card-body ">
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>SL.No</th>
                            <th>Role Name</th>
                            <th>Permissions</th> 
                          </tr>
                        </thead>
                        <tbody>
                            @forelse ($roles as $role)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $role->name }}</td>
                                <td>
                                @foreach($role->getPermissionNames() as $permission)
                                <li>{{ $permission }}</li> 
                                @endforeach
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
                {{--  --}}
             
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Add Role
                </div>
                <div class="card-body">
                    {{-- @if ($errors->all())
                        <div class="alert alert-danger">
                            @foreach ($errors->all()as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </div>
                    @endif --}}
                    <form method="post" action="{{ route('role.add') }}" >
                        @csrf
                        
                        <div class="form-group">
                            <label >Roll Name</label>
                            <input type="text" class="form-control"  name="role_name">  
                        </div>
                        <div class="form-group">
                            <label >Select Permissions</label>
                            <br>
                            @foreach($permissions as $permission)
                            <label class="ckbox">
                                <ul>
                                    <li>
                                        <input type="checkbox" name="permission[]" value="{{ $permission->name }}">
                                <span>{{ $permission->name }}</span>
                                    </li>
                                </ul>                                
                            </label>
                            @endforeach
                        </div>
                        <button type="submit" class="btn btn-info">Add Role</button>
                     </form>
                    
                </div>
            </div>
        </div>

        {{--  --}}


<div class="container">
    <div class="row">
        <div class="card col-md-8">
            <div class="card-header ">
                <h3>User list</h3>  
               </div>
               <div class="card-body ">
                   <table class="table table-striped">
                       <thead>
                         <tr>
                           <th>SL.No</th>
                           <th>User Name</th>
                           <th>User Role</th> 
                           <th>Permissions</th> 
                           <th>Action</th> 
                         </tr>
                       </thead>
                       <tbody>
                           @forelse ($users as $user)
                           <tr>
                               <td>{{ $loop->index + 1 }}</td>
                               <td>{{ $user->name }}</td>
                               <td>
                                   @foreach($user->getRoleNames() as $role)
                                       <li>{{ $role }}</li>
                                   @endforeach                                 
                               </td>
                               <td>
                                   @foreach($user->getAllPermissions() as $permission)
                                   <li>{{ $permission->name }}</li>
                                   @endforeach
                                </td>     
                                
                                <td>
                                    <a href="{{ url('role/permission/edit') }}/{{ $user->id }}" class="btn btn-info">Edit</a>
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

        {{--  --}}

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                  Asign Role
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('role.assign') }}" >
                        @csrf
                        <div class="form-group">
                            <label >User Name</label>
                            <select class="form-control" name="user_id">
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label >Role Name</label>
                            <select class="form-control" name="role_name">
                                @foreach($roles as $role)
                                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <button type="submit" class="btn btn-info">Assign Role</button>
                     </form>
                    
                </div>
            </div>
        </div>
    </div>
          
</div>

        {{--  --}}
        
        
        </div>
    </div>

                   
              
               

@endsection

<style>
  .gap{
    padding-top: 100px;
  }
</style>