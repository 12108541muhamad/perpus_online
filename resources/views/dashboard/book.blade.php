@extends('admin')
@section('content')
<div class="content" style="margin-top: 50px;">
    <a href="/createBook" class="btn btn-primary">Create</a>
    <a href="/createBook" class="btn btn-primary">Download Excel</a>
    <table id="example" class="table table-striped" style="width:100%; margin-top: 20px">
        <thead>
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Writter</th>
                <th>Publisher</th>
                <th>ISBN</th>
                <th>Synopsis</th>
                <th>Cover Book</th>
                <th>Category Book</th>
                <th>Action</th>
            </tr>
        </thead>
        @foreach ($books as $book)
        <tbody>
            <tr>
                <td>{{$book->id}}</td>
                <td>{{$book->title}}</td>
                <td>{{$book->writter}}</td>
                <td>{{$book->publisher}}</td>
                <td>{{$book->isbn}}</td>
                <td>{{$book->synopsis}}</td>
                <td>{{$book->cover_book}}</td>
                <td>{{$book->category_name}}</td>
                <td>
                    <a href="{{route('editBook', $book['id'])}}" class="btn btn-primary">Edit</a>
                    <form action="{{route('destroyBook', $book->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-primary">Delete</button>
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