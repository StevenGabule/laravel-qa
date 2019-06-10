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

                    @include('layouts._messages')
                    
                    @forelse ($questions as $question)
                        <div class="media">
                            
                            <div class="d-flex flex-column counters">
                                <div class="vote">
                                    <strong>{{ $question->votes_count }}</strong>{{ str_plural('vote', $question->votes_count) }}</div>
                                <div class="status {{ $question->status}}"><strong>{{ $question->answers_count }}</strong>{{ str_plural('answer', $question->answers_count) }}</div>
                                <div class="view">{{ $question->views . " " . str_plural('view', $question->views) }}</div>
                            </div>

                            <div class="media-body">
                                <div class="d-flex align-items-center">
                                    <h3 class="mt-0"><a href="{{ $question->url }}">{{ $question->title }}</a></h3>
                                    <div class="ml-auto">
                                        @can ('update', $question)
                                            <a href="{{ route('questions.edit', $question->id) }}" class="btn btn-sm btn-outline-info">Edit</a>
                                        @endcan

                                        @can ('delete', $question)
                                            <form action="{{ route('questions.destroy', $question->id)}}" class="d-inline" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure to delete this question?')">
                                                    Delete
                                                </button>
                                            </form>
                                        @endcan
                                    </div>
                                </div>
                                <p class="lead">Asked by <a href="{{ $question->user->url }}">{{ $question->user->name }}</a>
                                <small class="text-muted">{{ $question->created_date }}</small></p>
                                {{ $question->excerpt(350) }}
                            </div><!-- end of media body -->
                        </div><!-- end of media -->
                        <hr>
                    @empty

                    <div class="alert alert-warning">
                        <strong>Sorry</strong>, There are no questions available right now!
                    </div>
                            
                    @endforelse

                    {{ $questions->links()}}

                </div><!-- end of card-body -->
            </div><!-- end of card -->
        </div><!-- end of col-md-12 -->
    </div><!-- end of row -->
</div><!-- end of container -->
@endsection
