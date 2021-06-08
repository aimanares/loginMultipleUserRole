@extends('rider_dashboard')

@section('content')
<main class="login-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <h3 class="card-header text-center">Rider Login</h3>
                    <div class="card-body">
                        <form method="POST" action="{{ route('riderLogin.custom') }}">
                            @csrf
                            <div class="form-group mb-3">
                                <input type="text" placeholder="Email" id="rider_email" class="form-control" name="rider_email" required
                                    autofocus>
                                @if ($errors->has('rider_email'))
                                <span class="text-danger">{{ $errors->first('rider_email') }}</span>
                                @endif
                            </div>

                            <div class="form-group mb-3">
                                <input type="password" placeholder="Password" id="rider_password" class="form-control" name="rider_password" required>
                                @if ($errors->has('rider_password'))
                                <span class="text-danger">{{ $errors->first('rider_password') }}</span>
                                @endif
                            </div>

                            <div class="form-group mb-3">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                            </div>

                            <div class="d-grid mx-auto">
                                <button type="submit" class="btn btn-dark btn-block">Signin</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection