@extends('admin')
@section('content')
    <div class="content" style="margin-top: 60px">
        <div class="content-head"><h2>Hello, {{Auth::user()->name}}</h2></div>
        <div class="content-body"><p>Ini adalah <strong>Admin Dashboard</strong>. Kamu dapat menambah atau mengedit data di halaman ini.</p></div>
    </div>
</body>
</html>
@endsection