@extends('admin')
@section('content')
<div class="content" style="margin-top: 50px;">
    <div class="input-form">
        <form action="{{route('updateBook', $wikbooks['id'])}}" method="POST">
            @csrf

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
            @endif

            @method('PATCH')
            <div class="input-head"><h3>Edit Book</h3></div>
            <input type="text" name="title" style="width: 33%" placeholder="Enter Title">
                <input type="text" name="writter" style="width: 33%" placeholder="Enter Writter">
                <input type="text" name="publisher" style="width: 33.3%" placeholder="Enter Publisher"><br><br>
                <input type="text" name="isbn" style="width: 49.8%" placeholder="Enter ISBN">
                <select style="width: 49.8%; height: 28px;" name="category_name" id="">
                    @foreach ($categories as $category)
                    <option value="{{$category->category}}">{{$category->category}}</option>
                    @endforeach
                </select><br><br>
                <textarea name="synopsis" cols="138" rows="10" placeholder="Enter Synopsis"></textarea><br><br>
                <input type="file" name="cover_book" required><br>
                <label for="">Cover Book</label><br><br>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
</div>
</body>
</html>
@endsection