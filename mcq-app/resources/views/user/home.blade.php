@extends('user.layouts.app')

@section('content')
<section class="top-statistics py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="statistics-item bg-info text-white text-center py-4">
                    <h3>Number Of User</h3>
                    <h2 class="mb-0">{{$total_user}}</h2>
                </div>
            </div>
            <div class="col-md-4">
                <div class="statistics-item bg-info text-white text-center py-4">
                    <h3>Number Of Category</h3>
                    <h2 class="mb-0">{{$categories}}</h2>
                </div>
            </div>
            <div class="col-md-4">
                <div class="statistics-item bg-info text-white text-center py-4">
                    <h3>Number Of Question</h3>
                    <h2 class="mb-0">{{$questions}}</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="study-equal-section py-5">
    <div class="d-flex min-h-300">
        <div class="w-50 bg-dark d-flex align-items-center justify-content-center">
            <div class="study-equal-item text-center text-white p-3">
                <h3>Online Test</h3>
                <p>Increse your confidence</p>
                <a class="btn-common btn" href="{{ route('test') }}">Give a Test</a>
            </div>
        </div>
        <div class="w-50 bg-dark" style="background-image: url({{ asset('img/user/static/study1.webp') }});background-position: center center;
    background-size: cover;"></div>
    </div>
    <div class="d-flex min-h-300">
        <div class="w-50 bg-dark" style="background-image: url({{ asset('img/user/static/study2.webp') }});background-position: center center;
    background-size: cover;"></div>
        <div class="w-50 bg-dark d-flex align-items-center justify-content-center">
            <div class="study-equal-item text-center text-white p-3">
                <h3>Study question</h3>
                <p>Organized question reduce your learning time </p>
                <a class="btn btn-common" href="{{ route('question.bank') }}">Question Bank</a>
            </div>
        </div>
    </div>
</section>


@endsection