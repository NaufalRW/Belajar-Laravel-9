@extends('app')
@section('content')
<div class="form-container">
   <div class="form-card">
     <h1>Login</h1>
     @if(session('success'))
     <p>{{ session('success') }}</p>
     @endif
     @if($errors->any())
     @foreach($errors->all() as $err)
     <p>{{ $err }}</p>
     @endforeach
     @endif
     <form method="POST" action="{{ route('login.action') }}">
      @csrf
       <div class="input-group">
         <input type="text" placeholder="Username" name="user_name">
       </div>
       <div class="input-group">
         <input type="password" placeholder="Password" name="password">
       </div>
       <div class="button-container">
         <button id="register-button">Switch to Register</button>
       </div>
       <input type="submit" value="Login">
     </form>
   </div>
 </div>
@endsection