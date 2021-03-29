@extends('user.layouts.app')

@section('content')
<section class="test-result py-2">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-4 mb-4">
                <div class="result-item bg-primary text-center py-3">
                   <h4>Exam ID</h4>
                   <h3>{{1000 + $test_result[0]->id ?? 0}}</h3>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="result-item bg-primary text-center py-3">
                    <h4>Your Score</h4>
                   <h3>{{$test_result[0]->result ?? 0}} out of 10</h3>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="result-item bg-primary text-center py-3">
                   <h4>Exam Date</h4>
                   <h3>{{\Carbon\Carbon::parse($test_result[0]->created_at)->format('d-m-Y h:i') ?? 0}}</h3>
                </div>
            </div>
        </div>
    </div>
</section>


<section>
    <div class="container">
        <div class="result-items">
            <table class="table table-hover table-bordered text-center">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Exam ID</th>
                        <th scope="col">Score</th>
                        <th scope="col">Time</th>
                        <th scope="col">Comment</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($test_result as $result)
                    <tr>
                        <td>{{1000 + $result->id}}</td>
                        <td>{{$result->result}}</td>
                        <td>{{\Carbon\Carbon::parse($result->created_at)->format('d-m-Y h:i')}}</td>
                        <td>@if($result->result > 7) Superb @elseif($result->result > 4 && $result->result < 8): Great Job @elseif($result->result > 1 && $result->result < 5) Improving @else Time to learn @endif</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
    </div>
</section>

@endsection