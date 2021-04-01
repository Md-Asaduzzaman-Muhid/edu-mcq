@extends('layouts.auth')

@section('content')
<section class="feature-section">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="{{ asset('img/carousel/slide1.webp') }}" alt="First slide">
                <div class="carousel-caption d-none d-md-block py-5">
                    <h3>Education is free</h3>
                    <p>Learn and develop skill</p>
                    <a href="#" class="btn btn-common">Read More</a>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{ asset('img/carousel/slide2.webp') }}" alt="Second slide">
                <div class="carousel-caption d-none d-md-block py-5">
                    <h3>Education is free</h3>
                    <p>Learn and develop skill</p>
                    <a href="#" class="btn btn-common">Read More</a>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{ asset('img/carousel/slide3.webp') }}" alt="Third slide">
                <div class="carousel-caption d-none d-md-block py-5">
                    <h3>Education is free</h3>
                    <p>Learn and develop skill</p>
                    <a href="#" class="btn btn-common">Read More</a>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</section>
<section class="study-equal-section pb-5">
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