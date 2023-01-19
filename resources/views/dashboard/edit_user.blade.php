@extends('admin')
@section('content')
<div class="content" style="margin-top: 50px;">
    <div class="input-form">
        <form action="{{route('updateUser', $users['id'])}}" method="POST">
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
            <div class="input-head"><h3>Edit User</h3></div>
            <div class="input-content">
                <input type="text" name="name" style="width: 49%" placeholder="Enter Name">
                <input type="text" name="address" style="width: 49%" placeholder="Enter Address"><br><br>
                <input type="text" name="no_hp" style="width: 49%" placeholder="Enter No Hp">
                <select style="width: 49%; height: 28px;" name="role">
                    <option value="admin">admin</option>
                    <option value="user">user</option>
                </select><br><br>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
</div>
</body>
</html>
@endsection