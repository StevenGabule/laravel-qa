@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h2>{{ $question->title}}</h2>   
                        <div class="ml-auto">
                            <a href="{{ route('questions.index') }}" class="btn btn-outline-secondary">Back to all questions</a>
                        </div>
                    </div>
                </div><!-- end of card header -->
                <div class="card-body">
                    {!! $question->body_html !!}
                    <div class="float-right">
                        <span class="text-muted">Answered {{ $question->created_date }}</span>
                        <div class="media mt-2">
                            <a href="{{ $question->user->avatar }}" class="pr-2">
                                <img src="{{ $question->user->avatar }}" alt="">
                            </a>
                            <div class="media-body mt-1">
                            <a href="{{ $question->user->url }}">{{ $question->user->name }}</a>
                            </div>
                        </div>
                    </div><!-- end of float-right -->
                </div><!-- end of card-body -->
            </div><!-- end of card -->
        </div><!-- end of col-md-12 -->
    </div><!-- end of row -->
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h2>{{ $question->answers_count . " " . str_plural('Answer', $question->answers_count) }}</h2>
                    </div>
                    <hr>
                    @foreach ($question->answers as $answer)
                        <div class="media">
                            <div class="media-body">
                                {!! $answer->body_html !!}
                                <div class="float-right">
                                    <span class="text-muted">Answered {{ $answer->created_date }}</span>
                                    <div class="media mt-2">
                                        <a href="{{ $answer->user->avatar }}" class="pr-2">
                                            <img src="{{ $answer->user->avatar }}" alt="">
                                        </a>
                                        <div class="media-body mt-1">
                                        <a href="{{ $answer->user->url }}">{{ $answer->user->name }}</a>
                                        </div>
                                    </div>
                                </div><!-- end of float-right -->
                            </div><!-- end of media body -->
                        </div><!-- end of media -->
                        <hr>
                    @endforeach
                </div><!-- end of card body -->
            </div><!-- end of card -->
        </div><!-- end of col-md-12 -->
    </div><!-- end of row -->
</div><!-- end of container -->
@endsection
