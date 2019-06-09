@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h2>All Questions</h2>   
                        <div class="ml-auto">
                            <a href="{{ route('questions.create') }}" class="btn btn-outline-secondary">Ask Question</a>
                        </div>
                    </div>
                </div><!-- end of card header -->
                <div class="card-body">
                    @foreach ($questions as $question)
                        <div class="media">
                            
                            <div class="d-flex flex-column counters">
                                <div class="vote">
                                    <strong>{{ $question->votes }}</strong>{{ str_plural('vote', $question->votes) }}</div>
                                <div class="status {{ $question->status}}"><strong>{{ $question->answers }}</strong>{{ str_plural('answer', $question->answers) }}</div>
                                <div class="view">{{ $question->views . " " . str_plural('view', $question->views) }}</div>
                            </div>

                            <div class="media-body">
                                <h3 class="mt-0"><a href="{{ $question->url }}">{{ $question->title }}</a></h3>
                                <p class="lead">Asked by <a href="{{ $question->user->url }}">{{ $question->user->name }}</a>
                                <small class="text-muted">{{ $question->created_date }}</small></p>
                                {{ str_limit($question->body, 250) }}
                            </div><!-- end of media body -->
                        </div><!-- end of media -->
                        <hr>
                    @endforeach
                    {{ $questions->links()}}
                </div><!-- end of card-body -->
            </div><!-- end of card -->
        </div><!-- end of col-md-12 -->
    </div><!-- end of row -->
</div><!-- end of container -->
@endsection