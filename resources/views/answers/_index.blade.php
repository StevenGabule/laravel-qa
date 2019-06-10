<div class="row mt-3">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h2>{{ $answersCount . " " . str_plural('Answer', $answersCount) }}</h2>
                </div>
                <hr>
                @include('layouts._messages')
                @foreach ($answers as $answer)
                    <div class="media">
                        <div class="d-flex flex-column vote-controls">
                            <a title="This answer is useful" 
                                class="vote-up {{ Auth::guest() ? 'off' : '' }}" 
                                onclick="event.preventDefault();document.getElementById('up-vote-answer-{{ $answer->id }}').submit();">
                                <i class="fas fa-caret-up fa-3x"></i>
                            </a>
                            <form id="up-vote-answer-{{ $answer->id }}" action="/answers/{{ $answer->id }}/vote" method="POST" >
                                @csrf
                                <input type="hidden" name="vote" value="1">
                            </form>

                            <span class="votes-count">{{ $answer->votes_count }}</span>
                            
                            <a class="vote-down {{ Auth::guest() ? 'off' : '' }}"
                            onclick="event.preventDefault();document.getElementById('down-vote-answer-{{ $answer->id }}').submit();"
                            title="This answer is not useful" >
                                    <i class="fas fa-caret-down fa-3x"></i>
                            </a>
                            <form action="/answers/{{ $answer->id }}/vote" method="POST" id="down-vote-answer-{{ $answer->id }}">
                                @csrf
                                <input type="hidden" name="vote" value="-1">
                            </form>
                            @can('accept', $answer)
                            <a title="Mark this answer as bes answer" 
                                class="{{ $answer->status }} mt-2" 
                                onclick="event.preventDefault();document.getElementById('accept-answer-{{ $answer->id }}').submit();">
                                <i class="fas fa-check fa-3x"></i>
                            </a>
                            <form action="{{ route('answers.accept', $answer->id) }}" method="POST" id="accept-answer-{{ $answer->id }}" class="d-none">
                                @csrf
                            </form>
                            @else
                                @if ($answer->is_best)
                                <a title="The question owner accepted this answer as best answer" 
                                    class="{{ $answer->status }} mt-2">
                                    <i class="fas fa-check fa-3x"></i>
                                </a>
                                @endif
                            @endcan

                       
                        </div><!-- end of d flex -->
                        
                        <div class="media-body">
                            {!! $answer->body_html !!}
                                <div class="row">
                                    <div class="col-4">
                                        <div class="ml-auto">
                                            @can ('update', $answer)
                                                <a href="{{ route('questions.answers.edit', [$question->id, $answer->id]) }}" class="btn btn-sm btn-outline-info">Edit</a>
                                            @endcan
    
                                            @can ('delete', $answer)
                                                <form action="{{ route('questions.answers.destroy', [$question->id, $answer->id])}}" class="d-inline" method="post">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure to delete this question?')">
                                                        Delete
                                                    </button>
                                                </form>
                                            @endcan
                                        </div>
                                    </div><!-- end of col-4 -->

                                    <div class="col-4"></div><!-- end of col-4 -->
                                    <div class="col-4">
                                            <span class="text-muted">Answered {{ $answer->created_date }}</span>
                                            <div class="media mt-2">
                                                <a href="{{ $answer->user->avatar }}" class="pr-2">
                                                    <img src="{{ $answer->user->avatar }}" alt="">
                                                </a>
                                                <div class="media-body mt-1">
                                                <a href="{{ $answer->user->url }}">{{ $answer->user->name }}</a>
                                                </div>
                                            </div>
                                        </div><!-- end of col-4 -->
                                </div><!-- end of row -->
                            </div><!-- end of media body -->
                        </div><!-- end of media -->
                    <hr>
                @endforeach
                
            </div><!-- end of card body -->
        </div><!-- end of card -->
    </div><!-- end of col-md-12 -->
</div><!-- end of row -->