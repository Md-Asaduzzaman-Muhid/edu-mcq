@extends('user.layouts.app')

@section('content')
<section class="test-section py-2">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-4 mb-4">
                <div class="statistics-item bg-info text-white text-center py-4">
                    <h2 class="mb-0">{{$category->name}}</h2>
                    <p id="test_timer"></p>
                    <p id="currentTime"></p>
                </div>
            </div>
        </div>
    </div>
</section>
@if (\Session::has('error'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <ul class="mb-0">
            <li>{!! \Session::get('error') !!}</li>
        </ul>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
<section class="take-test-section">
    <div class="container">
            <form action="{{route('test.take')}}" method="post" class="form">
                @csrf
                <input type="hidden" id="category" name="category" value="{{$category->id}}">
                @foreach($questions as $question)
                <div class="question-single question-{{$rank}}">
                    <h4>{{$rank++.'. '.$question->question}}</h4>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="question[{{$question->id}}][]" id="test_answer_1_{{$question->id}}" value="1">
                        <label class="form-check-label" for="test_answer_1_{{$question->id}}">
                        {{$question->option->option_1}}
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="question[{{$question->id}}][]" id="test_answer_2_{{$question->id}}" value="2">
                        <label class="form-check-label" for="test_answer_2_{{$question->id}}">
                        {{$question->option->option_2}}
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="question[{{$question->id}}][]" id="test_answer_3_{{$question->id}}" value="3">
                        <label class="form-check-label" for="test_answer_3_{{$question->id}}">
                        {{$question->option->option_3}}
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="question[{{$question->id}}][]" id="test_answer_4_{{$question->id}}" value="4">
                        <label class="form-check-label" for="test_answer_4_{{$question->id}}">
                        {{$question->option->option_4}}
                        </label>
                    </div>
                    
                </div>
                @endforeach
                <button type="submit" class="btn btn-primary">End Test</button>
            </form> 
    </div>
</section>


  
   <script>
  
        // var qt = JSON.parse('<?php echo json_encode($questions) ?>');
        // console.log(qt[0].answer);
        // console.log(qt[0].answer.answer);




        // let dateNow = new Date();
        // let hour = dateNow.getUTCHours();
        // let minute = dateNow.getUTCMinutes();
        // let second = dateNow.getUTCSeconds();

        // let finish_time = dateNow.getUTCMinutes()+ 20;

        // document.getElementById("currentTime").innerHTML = hour +":"+ minute +":"+ second;

        

        // // Set the date we're counting down to
        // // var countDownDate = new Date("Jan 7, 2022 15:37:25").getTime();

        // var countDownDate = new Date("Jan 7, 2022 "+hour+":"+minute+":"+second).getTime();
        // // Update the count down every 1 second
        // var x = setInterval(function() {

        // // Get today's date and time
        // var now = new Date().getTime();
            
        // // Find the distance between now and the count down date
        // var distance = countDownDate - now;
            
        // // Time calculations for days, hours, minutes and seconds
        // // var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        // // var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        // var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        // var seconds = Math.floor((distance % (1000 * 60)) / 1000);
            
        // // Output the result in an element with id="demo"
        // document.getElementById("test_timer").innerHTML = seconds + "s ";
            
        // // If the count down is over, write some text 
        // if (distance < 0) {
        //     clearInterval(x);
        //     document.getElementById("test_timer").innerHTML = "EXPIRED";
        // }
        // }, 1000);
        </script>
</section>

@endsection