@extends('layouts.login')
@section('row')
    <div class="row w-100">
        <div class="col-lg-4 mx-auto">
            <div class="auth-form-transparent text-left p-5 text-center">
                <h1 class="text-white"><i class="mdi mdi-buffer text-primary"></i> INVENTORY</h1>
                @if (session()->has('alert'))
                    <div class="alert alert-danger text-white" role="alert">
                        {{ session('alert') }}
                    </div>
                @endif
                <form class="pt-1" action="{{ url('login/auth') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="username" class="form-control text-center" name="username" placeholder="Username"
                            autofocus required>
                        @error('username')
                            <label class="error mt-2 text-danger" for="username">{{ $message }}</label>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control text-center" name="password" placeholder="Password"
                            autofocus required>
                        @error('password')
                            <label class="error mt-2 text-danger" for="password">{{ $message }}</label>
                        @enderror
                    </div>
                    <div class="mt-5">
                        <button class="btn btn-block btn-success btn-lg font-weight-medium" type="submit">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
