@extends('app')
@section('content')
<div class="form-card">
     <h1>Register</h1>
     @if($errors->any())
     @foreach($errors->all() as $err)
     <p>{{ $err }}</p>
     @endforeach
     @endif
     <form method="POST" action="{{ route('register.action') }}">
        @csrf
       <div class="input-group">
         <input type="text" placeholder="Username" name="user_name" value="{{ old('user_name') }}" />
       </div>
       <div class="input-group">
         <input type="password" placeholder="Password" name="password" />
       </div>
       <div class="input-group">
         <input type="password" placeholder="Confirm Password" name="confirm_password" />
       </div>
       <div class="button-container">
         <button id="login-button">Already have account? Login here!</button>
       </div>
       <input type="submit" value="Register">
     </form>
</div>
@endsection