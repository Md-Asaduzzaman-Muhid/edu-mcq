@extends('user.layouts.app')

@section('content')

<section class="take-test-section py-5">
    <div class="container">       
        @for($i = 0; $i <= 20; $i++)
            @if(isset($answers[$i]))
            <div class="question-single mb-md-5 mb-3">
                <h4>{{ ($i+1). $answers[$i]['question']}}</h4>
                <div class="form-check @if($answers[$i]['correct'] == 1) bg-success @endif">
                    <input class="form-check-input" type="radio" id="test_answer_1_{{$i}}" value="1" disabled checked>
                    <label class="form-check-label" for="test_answer_1_{{$i}}">
                    {{ $answers[$i]['option1']}}
                    </label>
                </div>
                <div class="form-check @if($answers[$i]['correct'] == 2) bg-success @endif">
                    <input class="form-check-input" type="radio" id="test_answer_2_{{$i}}" value="2" disabled>
                    <label class="form-check-label" for="test_answer_2_{{$i}}">
                    {{ $answers[$i]['option3']}}
                    </label>
                </div>
                <div class="form-check @if($answers[$i]['correct'] == 3) bg-success @endif">
                    <input class="form-check-input" type="radio" id="test_answer_3_{{$i}}" value="3" disabled>
                    <label class="form-check-label" for="test_answer_3_{{$i}}">
                    {{ $answers[$i]['option3']}}
                    </label>
                </div>
                <div class="form-check @if($answers[$i]['correct'] == 4) bg-success @endif">
                    <input class="form-check-input" type="radio" id="test_answer_4_{{$i}}" value="4" disabled>
                    <label class="form-check-label" for="test_answer_4_{{$i}}">
                    {{ $answers[$i]['option4']}}
                    </label>
                </div>
            </div>
            @endif
        @endfor 
        <div class="btn-wrapper text-center">
        <a href="{{route('test.result')}}" class="btn btn-primary">See Your Result Statistics</a>
        </div>
      
    </div>
</section>

</section>

@endsection