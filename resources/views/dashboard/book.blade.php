<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard Admin</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/admin">
                <div class="sidebar-brand-text mx-3">wikbook</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="/admin">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

			<!-- Nav Item - Users -->
            <li class="nav-item">
                <a class="nav-link" href="#users">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Users</span></a>
            </li>

			<!-- Nav Item - Book -->
            <li class="nav-item">
                <a class="nav-link" href="/book">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Book</span></a>
            </li>

            <!-- Nav Item - Book -->
            <li class="nav-item">
                <a class="nav-link" href="/category">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Category</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Other
            </div>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="/">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Home</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item active">
                <a class="nav-link" href="/logout">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Logout</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

<form action="{{route('store')}}" method="POST">
    @csrf
    @if (Session::get('success'))
            <div class="alert alert-success">
              {{ Session::get('success')}}
            </div>
          @endif
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th><input type="text" name="title" placeholder="Enter Title" required></th>
                            <th><input type="text" name="writter" placeholder="Enter Writter" required></th>
                            <th><input type="text" name="publisher" placeholder="Enter Publisher" required></th>
                            <th><input type="text" name="isbn" placeholder="Enter ISBN" required></th>
                            <th><input type="text" name="synopsis" placeholder="Enter Synopsis" required></th>
                            <th><input type="file" name="cover_book" placeholder="Enter Cover Book" required></th>
                        </tr>
                        <tr>
                            <th>
                                {{-- <select name="category_name">
                                    <option value=""> Fiksi </option>
                                </select> --}}
                                <input type="text" name="category_name" placeholder="Enter Category Name">
                            </th>
                            <th><button class="btn btn-dark" type="submit">SUBMIT</button></th>
                        </tr>
                    </thead> 
            </div>
        </div>
    </div>
    
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Title</th>
                            <th>Writter</th>
                            <th>Publisher</th>
                            <th>ISBN</th>
                            <th>Synopsis</th>
                            <th>Cover Book</th>
                            <th>Category Name</th>
                            <th>Create at</th>
                            <th>action</th>
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
                            <td>{{$book->created_at->format('d/m/y')}}</td>
                            <td><a href="/edit">Edit</a> <a href="/destroy/{id}">Remove</a></td>
                        </tr>
                        <tr>
                        </tbody>
                        @endforeach
                    </table>
            </div>
        </div>
    </div>
</form>

    
</body>
</html>