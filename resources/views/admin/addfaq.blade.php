
@extends('layouts.dashboard')

@section('content')

<div class="container">
  
  <div class="row gap">
    <div class="col-md-12">
      <div class="card">
          <div class="card-header">
              Add FAQ
          </div>
          <div class="card-body">
              <form method="POST" action="{{ url('add/faq/post') }}">
                  @csrf
                  <div class="form-group">
                    <label >Question</label>
                    <input type="text" class="form-control" placeholder="Enter Your Question" name="faq_question">
                    @error('faq_question')
                    <small class="text-danger">The Faq Question field is requred.</small>
                    @enderror
                    
                  </div>
                  <div class="form-group">
                      <label >Answer</label>
                      <textarea class="form-control" rows="4" name="faq_answer"></textarea>
                      @error('faq_answer')
                      <small class="text-danger">The Faq Answer field is requred.</small>
                      @enderror
                    </div>
                  <button type="submit" class="btn btn-success">Add FAQ</button>
                </form>
              
          </div>
      </div>
  </div>
  </div>

  {{--  --}}
    <div class="row">
        <div class="col-md-12">
         {{-- massege-start --}}
          @if(session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
          @endif

          @if(session('deletestatus'))
          <div class="alert alert-danger" role="alert">
            {{ session('deletestatus') }}
          </div>
          @endif
          {{-- massege-end --}}
            <div class="card">
                <div class="card-header">
                    list FAQ
                </div>
                <div class="card-body">
                    <table class="table table-striped">

                        <thead>
                          <tr>
                            <th>SL.No</th>
                            <th>Question</th>
                            <th>Answer</th>
                            <th>Created At</th>
                            <th>Last Updated At</th>
                            <th>Action</th>
                          </tr>
                        </thead>

                        <tbody>
                         @forelse($faqs as $faq)
          
                        <tr>
                             <td>{{ $loop->index +1 }}</td>
                             <td>{{ $faq->faq_question }}</td>
                             <td>{{ $faq->faq_answer }}</td>

                             <td>
                              @if (isset($faq->created_at))
                              {{ $faq->created_at->format('d/m/Y h:i:s A') }}
                              @else
                              -
                              @endif
                            </td>

                            <td>
                              @if (isset($faq->updated_at))
                              {{ $faq->updated_at->diffForHumans() }}
                              @else
                              -
                              @endif
                              
                            </td>

                             <td>
                              
                              <div class="btn-group" role="group" aria-label="Basic example">
                               
                                <a href="{{ url('faq/edit') }}/{{ $faq->id }}" type="button" class="btn btn-outline-info">Edit</a>
                                <a href="{{ url('faq/delete') }}/{{ $faq->id }}" type="button" class="btn btn-outline-danger">Soft Delete</a>
                                
                              </div>
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
{{--  --}}<br><br>
          <div class="card">
            <div class="card-header">
                list Soft Deleted FAQ
          </div>
          <div class="card-body">
              <table class="table table-striped">

                  <thead>
                    <tr>
                      <th>SL.No</th>
                      <th>Question</th>
                      <th>Answer</th>
                      <th>Created At</th>
                      <th>Last Updated At</th>
                      <th>Action</th>
                    </tr>
                  </thead>

                  <tbody>
                  @forelse($soft_deleted_faqs as $soft_deleted_faq)

                  <tr>
                      <td>{{ $loop->index +1 }}</td>
                      <td>{{ $soft_deleted_faq ->faq_question }}</td>
                      <td>{{ $soft_deleted_faq->faq_answer }}</td>
                      <td>{{ $soft_deleted_faq->created_at }}</td>
                      <td>{{ $soft_deleted_faq->updated_at }}</td>
                      {{-- <td>
                        @if (isset($faq->created_at))
                        {{ $faq->created_at->format('d/m/Y h:i:s A') }}
                        @else
                        -
                        @endif
                      </td>

                      <td>
                        @if (isset($faq->updated_at))
                        {{ $faq->updated_at->diffForHumans() }}
                        @else
                        -
                        @endif
                        
                      </td> --}}

                      <td>
                        
                        <div class="btn-group" role="group" aria-label="Basic example">
                        
                          <a href="{{ url('faq/restore') }}/{{ $soft_deleted_faq->id }}" type="button" class="btn btn-outline-success">Restore</a>
                          <a href="{{ url('faq/hard/delete') }}/{{ $soft_deleted_faq->id }}" type="button" class="btn btn-outline-danger">Hard Delete</a>
                          
                        </div>
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
    
    </div>
  
</div>


@endsection

<style>
    .gap{
      padding-top: 100px;
    }
</style>