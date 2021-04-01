@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="container py-md-5 py-2">
            <form action="{{ route('admin.concept.store') }}" class="form" method="POST">
            @csrf
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <select class="form-control" id="catSelcet" name="category">
                                <option value = "0">Select Category</option>
                                @foreach($categories as $category)
                                <option value = "{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <select class="form-control" id="subCatSelcet" name="sub_category">
                                <option value = "0">Select Sub Category</option>
                                @foreach($sub_categories as $sub_category)
                                <option value = "{{$sub_category->id}}">{{$sub_category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="title" name="title" placeholder="Title of the concept">
                </div>
                <div class="form-group">
                    <textarea class="form-control textarea" id="description" name="description" rows="5">{{ old('description') }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary mb-2">Confirm Save</button>
            </form>
        </div>
    </div>
   

@endsection