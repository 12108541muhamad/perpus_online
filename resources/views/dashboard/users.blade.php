@extends('admin')
@section('content')

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
<table id="example" class="table table-striped" style="width:100%; margin-top: 40px">
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Address</th>
            <th>No Hp</th>
            <th>Role</th>
            <th>Created at</th>
            <th>Action</th>
        </tr>
    </thead>
    @foreach ($users as $user)
    <tbody>
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->address}}</td>
            <td>{{$user->no_hp}}</td>
            <td>{{$user->role}}</td>
            <td>{{$user->created_at->format('d/m/y')}}</td>
            <td><a href="{{route('editUser', $user['id'])}}" class="btn btn-primary">Edit</a></td>
        </tr>
</table>
@endforeach

</body>
</html>
@endsection