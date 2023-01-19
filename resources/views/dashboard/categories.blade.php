@extends('admin')
@section('content')
<div class="content" style="margin-top: 50px;">
    <div class="input-form">
        <form action="{{route('categoriesCreate')}}" method="POST">
            @csrf
            @if (Session::get('successDelete'))
            <div class="alert alert-success">
                {{ Session::get('successDelete')}}
            </div>
            @endif
            @if (Session::get('successUpdate'))
                <div class="alert alert-success">
                {{ Session::get('successUpdate')}}
                </div>
            @endif
            <h3>Create Category</h3>
            <input type="text" name="category" placeholder="Enter Category Name" required>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <table id="example" class="table table-striped" style="width:100%; margin-top: 20px">
        <thead>
            <tr>
                <th>Id</th>
                <th>No</th>
                <th>Category</th>
                <th>Action</th>
            </tr>
        </thead>
        @foreach ($categories as $category)
        <tbody>
            <tr>
                <td>{{$category->id}}</td>
                <td>{{$category->id}}</td>
                <td>{{$category->category}}</td>
                <td>
                    <form action="">
                        <a href="{{route('editCategory', $category['id'])}}" class="btn btn-dark">Edit</a>
                        <a href="" class="btn btn-dark">Delete</a>
                    </form>
                </td>
            </tr>
        </tbody>
        @endforeach
    </table>
</div>
</body>
</html>
@endsection