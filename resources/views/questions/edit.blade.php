@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h2>Ask Question</h2>   
                        <div class="ml-auto">
                            <a href="{{ route('questions.index') }}" class="btn btn-outline-secondary">Back to all questions</a>
                        </div>
                    </div>
                </div><!-- end of card header -->
                <div class="card-body">
                    <form action="{{ route('questions.update', $question->id)}}" method="post">
                        {{ method_field('PUT')}}
                        @include('questions._form', ['buttonText' => 'Update question'])
                    </form><!-- end of form -->
                </div><!-- end of card-body -->
            </div><!-- end of card -->
        </div><!-- end of col-md-12 -->
    </div><!-- end of row -->
</div><!-- end of container -->
@endsection
