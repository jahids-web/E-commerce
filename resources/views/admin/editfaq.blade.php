@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row gap">
        <div class="col-md-6 m-auto">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ url('add/faq') }}">Add Faq</a></li>
                  <li class="breadcrumb-item active" aria-current="page">{{ $faq->faq_question }}</li>
                </ol>
              </nav>
        </div>
    </div>
<div class="row">
    <div class="col-md-6 m-auto">
        <div class="card">
            <div class="card-header">
                Edit FAQ
            </div>
            <div class="card-body">
                <form method="POST" action="{{ url('faq/edit/post') }}">
                    @csrf
                    <input type="hidden" name="faq_id" value="{{ $faq->id }}">
                    <div class="form-group">
                      <label >Question</label>
                      <input type="text" class="form-control" value="{{ $faq->faq_question }}" placeholder="Enter Your Question" name="faq_question">
                     
                      
                    </div>
                    <div class="form-group">
                        <label >Answer</label>
                        <textarea class="form-control" rows="4" name="faq_answer">{{ $faq->faq_answer }}</textarea>
                        
                      </div>
                    <button type="submit" class="btn btn-warning">Edit FAQ</button>
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