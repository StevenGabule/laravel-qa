@can('accept', $model)

    <a title="Mark this answer as bes answer" class="{{ $model->status }} mt-2" 
        onclick="event.preventDefault();document.getElementById('accept-answer-{{ $model->id }}').submit();">
        <i class="fas fa-check fa-3x"></i>
    </a>

    <form action="{{ route('answers.accept', $model->id) }}" method="POST" id="accept-answer-{{ $model->id }}" class="d-none">
        @csrf
    </form>

@else

    @if ($model->is_best)

    <a title="The question owner accepted this answer as best answer" class="{{ $model->status }} mt-2">
        <i class="fas fa-check fa-3x"></i>
    </a>

    @endif

@endcan