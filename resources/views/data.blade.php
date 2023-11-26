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

    <div class="the-table">
    <h2>You are logged in as {{ Auth::user()->user_name }}</h1>
    <table>
        <thead>
            <tr>
                <th class='nomer'>No</th>
                <th>Username</th>
                <th>Nilai</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $item)
                <tr>
                    <td class='id'>{{ $item->user_id }}</td>
                    <td class='username'>{{ $item->user_name }}</td>
                    <td class='nilai'>{{ $item->nilai }}</td>
                    <td>
                        <input type="hidden" name="user_id" id="user_id" value="{{ $item->user_name }}">
                        <a href="" class="ubahNilai" id="showDiv_{{ $item->user_id }}">Ubah nilai</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>

    <div class="form-container">
        <div class="form-card">
            <h1 class='formH1'>Ubah Nilai</h1>
            <form id="ubahNil" method="POST" action="{{ route('ubahNilai', ['user_id' => 0]) }}">
            @csrf
            <div class="input-group">
                <h2 class="theUser">Username: None</h2>
            </div>
            <div class="input-group">
                <input type="text" placeholder="Masukan nilai" name="valnilai" id="valnilai">
            </div>
            <input type="submit" value="Ubah">
            </form>
        </div>
    </div>

    <script>
        @foreach($data as $item)
        document.getElementById("showDiv_{{ $item->user_id }}").addEventListener("click", function(event) {
            event.preventDefault(); // Prevent the default action of the link
            document.querySelector(".form-container").style.visibility = "visible"; // Show the hidden div
            document.querySelector(".theUser").textContent = `Username: {{ $item->user_name }}`;
            document.getElementById("ubahNil").action = `{{ route('ubahNilai', ['user_id' => $item->user_id]) }}`; // Set the form action based on the user ID
            this.submit();
        });
        @endforeach
    </script>
</body>
</html>