<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('auth/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <title>Login | HMTI</title>
</head>

<body>
    <div class="wrapper">
        <div class="container main">
            <div class="row">
                <div class="col-md-6 side-image" style="background-image: url({{ asset('img/2.jpg') }})">
                    <!-------Image-------->
                    {{-- <img src="{{ asset('img/2.jpg') }}" alt=""> --}}
                    <div class="text">
                        <p>Login Admin <i>- HMTI FT UHO</i></p>
                    </div>
                </div>
                <div class="col-md-6 right">
                    <div class="input-box">
                        <form action="{{ route('auth-login') }}" method="post">
                            @csrf
                            <header>Login Admin</header>
                            <div class="input-field">
                                <input value="{{ old('email') }}" name="email" type="text" class="input"
                                    id="email" required autocomplete="off">
                                <label for="email">Email</label>
                                @error('email')
                                    <small class="text-danger mb-2">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="input-field">
                                <input name="password" type="password" class="input" id="password" required>
                                <label for="password">Password</label>
                                @error('password')
                                    <small class="text-danger mb-2">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="input-field">
                                <input type="submit" class="submit" value="Login">

                            </div>
                            {{-- <div class="signin">
                                <span>Already have an account? <a href="#">Log in here</a></span>
                            </div> --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
