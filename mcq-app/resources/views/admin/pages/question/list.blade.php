@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">
    <div class="container py-md-5 py-2">
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
       
                <tr>
                    <th scope="row">{{$i++}}</th>
                    <td>22</td>
                    <td>11</td>
                    <td><a href="#"><i class="fas fa-edit"></i></a></td>
                    <td><form action="#" method="POST">
                        @csrf
                        <input name="_method" type="hidden" value="POST">
                        <button type="submit"onclick="return confirm('Are you sure?')"><i class="fas fa-trash-alt"></i></button> </form>
                    </td>
                </tr>
           
            </tbody>
        </table> 
    </div>
</div>

@endsection