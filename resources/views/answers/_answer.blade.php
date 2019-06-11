<div class="media post">

    @include('shared._vote', [
        'model' => $answer
    ])
        
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

                    {{-- @include('shared._author', [
                        'model' => $answer,
                        'label' => 'answered'
                    ]) --}}

                    <user-info :model="{{ $answer }}" label="answered"></user-info>

                </div><!-- end of col-4 -->
        </div><!-- end of row -->
    </div><!-- end of media body -->
</div><!-- end of media -->