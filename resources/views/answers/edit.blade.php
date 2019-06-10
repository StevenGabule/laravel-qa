@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h1>Editing Answer for question: <strong>{{ $question->title }}</strong></h1>
                    </div>
                    <hr>
                    <form action="{{ route('questions.answers.update', [$question->id, $answer->id])}}" method="post">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                        <textarea name="body" id="body" class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}" rows="7">{{ old('body', $answer->body) }}</textarea>
                        @if ($errors->has('body'))
                            <div class="invalid-feedback">
                            <strong>{{ $errors->first('body') }}</strong>
                            </div>
                        @endif
                        </div><!-- end of form-group --> 
                        <div class="form-group">
                            <button type="submit" class="btn btn-lg btn-outline-primary">Update</button>
                        </div>
                    </form><!-- end of form -->
                    
                </div><!-- end of card body -->
            </div><!-- end of card -->
        </div><!-- end of col-md-12 -->
    </div><!-- end of row -->
</div>
@stop