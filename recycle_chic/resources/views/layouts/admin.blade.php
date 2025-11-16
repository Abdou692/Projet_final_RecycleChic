<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard Admin')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* Custom Styles for Admin Layout */
        body {
            background-color: #f4f4f4;
        }

        .admin-sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            height: 100%;
            background-color: #343a40;
            color: white;
            padding-top: 20px;
        }

        .admin-sidebar a {
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            display: block;
        }

        .admin-sidebar a:hover {
            background-color: #495057;
        }

        .admin-content {
            margin-left: 250px;
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="admin-sidebar">
        <h4 class="text-center text-white">Admin</h4>
        <ul class="nav flex-column">
            
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.categories.index') }}">
                     <i class="fas fa-list"></i>  Gestion des catégories
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.produits.index') }}">
                     <i class="fas fa-list"></i>  Gestion des produits
                </a>
            </li>
            <li class="nav-item">
            <form action="{{ route('admin.logout') }}" method="POST">
    @csrf
    <button type="submit" class="btn btn-danger">Déconnexion</button>
</form>
            </li>
        </ul>
    </div>

    <div class="admin-content">
        @yield('content')
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    @yield('scripts') <!-- Important pour charger DataTables correctement -->
</body>
</html>
