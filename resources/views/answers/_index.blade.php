@if ($answersCount > 0)

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

                 @include('answers._answer', ['answer' => $answer])
                @endforeach
                
            </div><!-- end of card body -->
        </div><!-- end of card -->
    </div><!-- end of col-md-12 -->
</div><!-- end of row -->

@endif

