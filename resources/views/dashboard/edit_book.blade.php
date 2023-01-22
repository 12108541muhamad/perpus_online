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
                <input type="text" class="form-control" name="title" placeholder="Enter Title" required>
                <input type="text" class="form-control" name="writter" placeholder="Enter Writter" required>
                <input type="text" class="form-control" name="publisher" placeholder="Enter Publisher" required>
                <input type="text" class="form-control" name="isbn" placeholder="Enter ISBN" required>
                <textarea name="synopsis" class="form-control" cols="138" rows="10" placeholder="Enter Synopsis"></textarea>
                <select class="form-select form-select-sm" name="category_name" id="">
                    <option selected hidden disabled>Category Book</option>
                    @foreach ($categories as $category)
                    <option class="form-select" value="{{$category->category}}">{{$category->category}}</option>
                    @endforeach
                </select><br>
                <label class="form-label" for="formFile">Cover Book</label>
                <input class="form-control form-control-sm" type="file" id="formFile" name="cover_book" required><br>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
</div>
</body>
</html>
@endsection