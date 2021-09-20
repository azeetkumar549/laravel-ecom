<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>admin panel</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a href="" class="navbar-brand">Ecom | Admin</a>
            <ul class="navbar-nav">
                <li class="nav-item"><a href="" class="nav-link">Logout</a></li>
            </ul>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <div class="col-2">
                <div class="list-group">
                    <a href="" class="list-group-item list-group-item-action">Dashboard</a>
                    <a href="" class="list-group-item list-group-item-action">Category</a>
                    <a href="" class="list-group-item list-group-item-action">Products</a>
                    <a href="" class="list-group-item list-group-item-action">Add Products</a>
                    <a href="" class="list-group-item list-group-item-action">Orders</a>
                    <a href="" class="list-group-item list-group-item-action bg-danager text-white">Logout</a>
                </div>
            </div>
            <div class="col-10">
                @section('content')
                    @show
            </div>
        </div>
    </div>

    

    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>