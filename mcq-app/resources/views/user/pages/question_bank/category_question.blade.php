@extends('user.layouts.app')

@section('content')
<section class="test-section py-2">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-4 mb-4">
                <div class="statistics-item bg-info text-white text-center py-4">

                    <h2 class="mb-0">{{$category->name}}</h2>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="test-section py-5">
    <div class="container">
    @foreach($questions as $question)
        <div class="question-single border border-dark rounded mb-4 p-4">
            <h4>{{$rank++.'. '.$question->question}}</h4>
            <ol class="option-list" type="A">
                <li class="pr-4 <?php if($question->answer->answer == 1): echo'text-success font-weight-bold'; endif; ?>">{{$question->option->option_1}}</li>
                <li class="pr-4 <?php if($question->answer->answer == 2): echo'text-success font-weight-bold'; endif; ?>">>{{$question->option->option_2}}</li>
                <li class="pr-4 <?php if($question->answer->answer == 3): echo'text-success font-weight-bold'; endif; ?>">>{{$question->option->option_3}}</li>
                <li class="pr-4 <?php if($question->answer->answer == 4): echo'text-success font-weight-bold'; endif; ?>">>{{$question->option->option_4}}</li>
            </ol>
            <p><span class="font-weight-bold">Explanation:</span> {{$question->answer->explanation}}</p>
        </div>
    @endforeach
    {{ $questions->links('pagination::bootstrap-4') }}
    </div>

</section>

@endsection