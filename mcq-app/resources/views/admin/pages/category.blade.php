@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">
    <div class="container py-md-5 py-2">            
        <div class="row">
            <div class="col-md-6">
                <form method="POST" action="{{ route('admin.category.store') }} ">
                @csrf
                    <div class="form-group">
                        <label for="category"> Category</label>
                        <input type="text" class="form-control" name="category" id="category" placeholder="Enter Category" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Add New Category</button>
                </form>
            </div>
            <div class="col-md-6">
                <form method="POST" action="{{ route('admin.sub_cat') }}">
                @csrf
                    <div class="form-group">
                        <label for="cat_id">Select Category</label>
                        <select class="form-control" id="cat_id" name="cat_id" required>
                            <option value=""> -- Select Category -- </option>
                            @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="sub_category">Sub Category</label>
                        <input type="text" class="form-control" name="sub_category" id="sub_category" placeholder="Enter Category" required>
                    </div>
          
                    <button type="submit" class="btn btn-primary">Add New Sub-Category</button>
                </form>
            </div>
        </div>
    </div>
    

    <div class="container">
        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Category</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
            <?php $i=1 ?>
                @foreach($categories as $category)
                <tr>
                    <th scope="row">{{$i++}}</th>
                    <td>{{$category->name}}</td>
                    <td><a href="#"><i class="fas fa-edit"></i></a></td>
                    <td><form action="{{ route('admin.category.destroy' , $category->id)}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <input name="_method" type="hidden" value="DELETE">
                        <button type="submit"onclick="return confirm('Are you sure?')"><i class="fas fa-trash-alt"></i></button> </form>
                    </td>
                </tr>
                @endforeach 
            </tbody>
        </table>

        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Category</th>
                    <th scope="col">Sub Category</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php $i=1 ?>
                @foreach($sub_categories as $sub_category)
                <tr>
                    <th scope="row">{{$i++}}</th>
                    <td>{{$sub_category->category->name ?? 'Null'}}</td>
                    <td>{{$sub_category->name}}</td>
                    <td><a href="#"><i class="fas fa-edit"></i></a></td>
                    <td><form action="{{ route('admin.sub_cat.destroy' ,[$sub_category->id])}}" method="POST">
                        @csrf
                        <input name="_method" type="hidden" value="POST">
                        <button type="submit"onclick="return confirm('Are you sure?')"><i class="fas fa-trash-alt"></i></button> </form>
                    </td>
                </tr>
                @endforeach 
            </tbody>
        </table> 
    </div>
</div>

@endsection