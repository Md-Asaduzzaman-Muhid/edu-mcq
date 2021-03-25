@extends('user.layouts.app')

@section('content')
<section class="top-statistics py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="statistics-item bg-info text-white text-center py-4">
                    <h3>Number Of User</h3>
                    <h2 class="mb-0">200</h2>
                </div>
            </div>
            <div class="col-md-4">
                <div class="statistics-item bg-info text-white text-center py-4">
                    <h3>Number Of Category</h3>
                    <h2 class="mb-0">{{$categories->count()}}</h2>
                </div>
            </div>
            <div class="col-md-4">
                <div class="statistics-item bg-info text-white text-center py-4">
                    <h3>Number Of Question</h3>
                    <h2 class="mb-0">{{$questions->count()}}</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="question-section py-5">
    <div class="container">
    @foreach($questions as $question)
        <?php $i= 1; ?>
        <div class="question-single border border-dark rounded mb-4 p-4">
            <h4>{{$i++ . '. ' . $question->question}}</h4>
            <ol class="option-list" type="A">
                <li class="pr-4 <?php if($question->answer->answer == 1): echo'text-success font-weight-bold'; endif; ?>">{{$question->option->option_1}}</li>
                <li class="pr-4 <?php if($question->answer->answer == 2): echo'text-success font-weight-bold'; endif; ?>">>{{$question->option->option_2}}</li>
                <li class="pr-4 <?php if($question->answer->answer == 3): echo'text-success font-weight-bold'; endif; ?>">>{{$question->option->option_3}}</li>
                <li class="pr-4 <?php if($question->answer->answer == 4): echo'text-success font-weight-bold'; endif; ?>">>{{$question->option->option_4}}</li>
            </ol>
            <p><span class="font-weight-bold">Explanation:</span> {{$question->answer->explanation}}</p>
        </div>
    @endforeach
    </div>
</section>

@endsection