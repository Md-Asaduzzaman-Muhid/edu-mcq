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
<section class="take-test-section">
    <div class="container">
    <h4>Question</h4>
        <form action="{{route('test.take')}}" method="post">
            @csrf
            <div class="form-check">
                <input class="form-check-input" type="radio" name="answer" id="testAnswer1" value="option1">
                <label class="form-check-label" for="testAnswer1">
                    Default radio
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="answer" id="testAnswer2" value="option2">
                <label class="form-check-label" for="testAnswer2">
                    Second default radio
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="answer" id="testAnswer3" value="option3">
                <label class="form-check-label" for="testAnswer3">
                    Third default radio
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="answer" id="testAnswer4" value="option4">
                <label class="form-check-label" for="testAnswer4">
                    Fourth default radio
                </label>
            </div>
            <button type="submit" class="btn btn-primary">Next Question</button>
        </form>
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
   <script>
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