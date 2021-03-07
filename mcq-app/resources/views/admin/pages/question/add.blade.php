@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">
    <div class="container py-md-5 py-2">
        <form method="POST" action="{{ route('admin.question.store') }}">
            @csrf
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                    <input type="radio" name="radio" aria-label="Radio button for following text input">
                    </div>
                </div>
                <input type="text" class="form-control" aria-label="Text input with radio button">
            </div>
       
            <div class="row">
                <div class="col">
                    <label for="option_1">Option 1</label>
                    <select class="form-control" id="cat_id" name="cat_id" required>
                        <option value=""> -- Select Category -- </option>
                       
                    </select>
                </div>
                <div class="col">
                    <label for="option_1">Option 1</label>
                    <select class="form-control" id="sub_cat_id" name="cat_id" required>
                        <option value=""> -- Select Sub Category -- </option>
                        
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="question">Question</label>
                <textarea class="form-control" id="question" name="question" rows="4"></textarea>
            </div>
            <div class="options">
                <label class="label_option" for="option_2">Option 1</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                        <input type="radio" name="radio" aria-label="Radio button for following text input">
                        </div>
                    </div>
                    <input type="text" class="form-control" name="option_1" id="option_2" placeholder="Type option_1" required>
                </div>
                <label class="label_option" for="option_2">Option 2</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                        <input type="radio" name="radio" aria-label="Radio button for following text input">
                        </div>
                    </div>
                    <input type="text" class="form-control" name="option_2" id="option_2" placeholder="Type option_2" required>
                </div>
                <label class="label_option" for="option_3">Option 3</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                        <input type="radio" name="radio" aria-label="Radio button for following text input">
                        </div>
                    </div>
                    <input type="text" class="form-control" name="option_3" id="option_3" placeholder="Type option_3" required>
                </div>
                <label class="label_option" for="option_4">Option 4</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                        <input type="radio" name="radio" aria-label="Radio button for following text input">
                        </div>
                    </div>
                    <input type="text" class="form-control" name="option_4" id="option_4" placeholder="Type option_4" required>
                </div>
            </div>
            <div class="form-group">
                <label for="explanation">Explanation</label>
                <textarea class="form-control" id="explanation" name="explanation" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Add New Question</button>
        </form>
    </div>
</div>
@endsection