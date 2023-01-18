@extends('admin')
@section('content')
<div class="content" style="margin-top: 50px;">
    <div class="input-form">
        <form action="{{route('store')}}" method="POST">
            @csrf
            <div class="input-head"><h3>Create Book</h3></div>
            <div class="input-content">
                <input type="text" name="title" style="width: 33%" placeholder="Enter Title" required>
                <input type="text" name="writter" style="width: 33%" placeholder="Enter Writter" required>
                <input type="text" name="publisher" style="width: 33.3%" placeholder="Enter Publisher" required><br><br>
                <input type="text" name="isbn" style="width: 49.8%" placeholder="Enter ISBN" required>
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