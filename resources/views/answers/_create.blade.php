<div class="row mt-3">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h3>Your answer</h3>
                </div>
                <hr>
                <form action="{{ route('questions.answers.store', $question->id)}}" method="post">
                    @csrf
                    <div class="form-group">
                    <textarea name="body" id="body" class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}" rows="7"></textarea>
                    @if ($errors->has('body'))
                        <div class="invalid-feedback">
                        <strong>{{ $errors->first('body') }}</strong>
                        </div>
                    @endif
                    </div><!-- end of form-group --> 
                    <div class="form-group">
                        <button type="submit" class="btn btn-lg btn-outline-primary">Submit</button>
                    </div>
                </form><!-- end of form -->
                
            </div><!-- end of card body -->
        </div><!-- end of card -->
    </div><!-- end of col-md-12 -->
</div><!-- end of row -->