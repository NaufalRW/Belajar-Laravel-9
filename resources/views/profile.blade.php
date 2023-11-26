<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{ asset('storage/css/profile.css') }}">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <title>@yield('title', $title)</title>

</head>
<body>
    
    @php
        $nilai = 'Belum Lulus';
        if(Auth::user()->nilai >= 90 && Auth::user()->nilai <= 100) {
            $nilai = 'A+';
        } else if(Auth::user()->nilai >= 70 && Auth::user()->nilai <= 89) {
            $nilai = 'A';
        } else if(Auth::user()->nilai >= 50 && Auth::user()->nilai <= 69) {
            $nilai = 'B';
        } else if(Auth::user()->nilai >= 10 && Auth::user()->nilai <= 49) {
            $nilai = 'C';
        } else if(Auth::user()->nilai >= 0 && Auth::user()->nilai <= 9) {
            $nilai = 'Tidak Lulus';
        }
    @endphp

    <div class="sidebar">
        <h1><i class='bx bx-home'></i> Home</h1>
        <a href="{{ url('/') }}">Dashboard</a>
        <a href="{{ url('/settings') }}">Settings</a>
        <a href="{{ url('/profile') }}">Profile</a>
        <a href="{{ url('/data') }}">All Data</a>
    </div>

    <div class="main-content">
        <div class="circle-profile">
            <img src="https://studio.mrngroup.co/storage/app/media/Prambors/Editorial%203/Anime-20230828121723.webp?tr=w-100" alt="">
        </div>
        <div class="the-profile">
            <p>Username = {{ Auth::user()->user_name }}</p>
            <p>Email = example@gmail.com</p>
            <p>Created at = {{ Auth::user()->created_at }}</p>
            <p>Nilai = {{ $nilai }}</p>
        </div>
    </div>
</body>
</html>