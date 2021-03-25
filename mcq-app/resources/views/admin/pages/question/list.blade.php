@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">
    <div class="container py-md-5 py-2">
        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Category</th>
                    <th scope="col">Question</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php $i=1 ?>
                    @foreach($categories as $cat)
                        @foreach($cat->question as $question)
                            
                            <tr>
                                <th scope="row">{{$i++}}</th>
                                <td>{{$cat->name}}</td>
                                <td>{{$question->question}}</td>
                                <td><a href="#"><i class="fas fa-edit"></i></a></td>
                                <td><form action="{{ route('admin.question.destroy' , $question->id)}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button type="submit"onclick="return confirm('Are you sure?')"><i class="fas fa-trash-alt"></i></button> </form>
                                </td>
                            </tr>
                        @endforeach
                    @endforeach
            </tbody>
        </table> 

        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Sub Category</th>
                    <th scope="col">Question</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php $i=1 ?>
                    @foreach($sub_categories as $sub_cat)
                        @foreach($sub_cat->question as $question)
                            
                            <tr>
                                <th scope="row">{{$i++}}</th>
                                <td>{{$sub_cat->name}}</td>
                                <td>{{$question->question}}</td>
                                <td><a href="#"><i class="fas fa-edit"></i></a></td>
                                <td><form action="{{ route('admin.question.destroy' , $question->id)}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button type="submit"onclick="return confirm('Are you sure?')"><i class="fas fa-trash-alt"></i></button> </form>
                                </td>
                            </tr>
                        @endforeach
                    @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection