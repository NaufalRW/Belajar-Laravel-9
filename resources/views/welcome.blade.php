<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{ asset('storage/css/welcome.css') }}">

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
        <h1>Welcome, {{ Auth::user()->user_name }}</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sollicitudin metus purus, at elementum dolor cursus a. In et mauris arcu. Nulla aliquet eleifend enim, a facilisis odio tempus eu. Proin vestibulum massa odio, id tempus mi accumsan eu. Morbi auctor odio id tincidunt tristique. Donec nec massa nulla.</p>
    </div>
</body>
</html>