@extends('admin')
@section('content')
<div class="content" style="margin-top: 50px;">
    <div class="input-form">
        <form action="{{route('updateCategory', $categories['id'])}}" method="POST">
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
            <div class="input-head"><h3>Edit Category</h3></div>
            <div class="input-content">
                <input type="text" name="category" style="width: 100%" placeholder="Enter Category Name"><br><br>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
</div>
</body>
</html>
@endsection