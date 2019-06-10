<a onclick="event.preventDefault();document.getElementById('favorite-question-{{ $model->id }}').submit();"
    title="Click to mark as favorite question (Click again to undo)" 
    class="favorite mt-2 {{ Auth::guest() ? 'off' : ($model->is_favorited ? 'favorited' : '') }}">
    
    <i class="fas fa-star fa-3x"></i>

    <span class="favorites-count">{{ $model->favorites_count}}</span>    

</a>   

<form action="/questions/{{ $model->id }}/favorites" method="POST" id="favorite-question-{{ $model->id }}" class="d-none">
    
    @csrf

    @if($model->is_favorited)
        @method('DELETE')
    @endif

</form>