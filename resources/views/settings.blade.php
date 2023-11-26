<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{ asset('storage/css/setting.css') }}">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <title>@yield('title', $title)</title>

</head>
<body>
    
    <div class="sidebar">
        <h1><i class='bx bx-home'></i> Home</h1>
        <a href="{{ url('/') }}">Dashboard</a>
        <a href="{{ url('/settings') }}">Settings</a>
        <a href="{{ url('/profile') }}">Profile</a>
        <a href="{{ url('/data') }}">All Data</a>
    </div>

    <div class="main-content">
        <a href="{{ route('logout') }}">Logout</a>
    </div>
</body>
</html>