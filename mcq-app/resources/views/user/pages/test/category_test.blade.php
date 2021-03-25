@extends('user.layouts.app')

@section('content')
<section class="test-section py-5">
    <div class="container">
        <div class="row">
            @foreach($categories as $cat)
                <div class="col-md-4 mb-4">
                    <div class="statistics-item bg-info text-white text-center py-4">
                        <h3>Categories</h3>
                        <h2 class="mb-0">{{$cat->name}}</h2>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>


@endsection