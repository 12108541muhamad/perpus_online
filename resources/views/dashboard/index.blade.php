@extends('admin')
@section('content')
    <div class="content" style="margin-top: 60px">
        <div class="content-head"><h2>Hello, {{Auth::user()->name}}</h2></div>
        <div class="content-body"><p>Berikut buku yang kami sediakan:</p></div>

        <div class="book-container" style="padding-left:20px;">
            <div class="book-head" style="padding-bottom:20px;">
                <select name="category" style="padding: 3px 5px 3px 5px" id="">
                    <option value="" hidden>Category</option>
                    @foreach ($categories as $category)
                    <option value="{{$category->category}}">{{$category->category}}</option>
                    @endforeach
                </select>
            </div>
            @foreach ($wikbooks as $book)
            <div class="row" style="border:solid;">
                <div class="book col" style="padding-right:70px; display:grid; grid-tamplate-colums: auto auto auto;">
                    <div class="book-head"><h4>{{$book->title}}</h4></div>
                    <div class="book-cover"><img src="https://d1csarkz8obe9u.cloudfront.net/posterpreviews/yellow-business-leadership-book-cover-design-template-dce2f5568638ad4643ccb9e725e5d6ff.jpg?ts=1637017516" alt=""></div>
                    <div class="book-foot">
                        <a href="" class="btn btn-primary">Download</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</body>
</html>
@endsection