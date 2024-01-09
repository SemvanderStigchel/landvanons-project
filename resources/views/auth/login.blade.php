<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/auth.css'])
</head>
<body style="background-color: #F6F7FC">
<main>
    <section class="w-100" style="height: 100vh">
        <div class="flex column align-center content-around w-100" style="height: 100vh;">
            <img src="{{asset('images/LandVanOns.png')}}" id="logo" class="headerImg scrollAnimation">
            <div id="fadeOut">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}" id="submitForm">
                            @csrf
                            <div class="flex column">
                                @error('email')
                                <span class="invalid-feedback scrollAnimation" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror

                                <label for="email">
                                    <input id="email" type="email" style=""
                                           class="scrollAnimation button button-outline mg-bottom-3 border-auth border-3 pd-3 gray button-50 form-control @error('email') is-invalid @enderror"
                                           name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                                           placeholder="E-mailadres">
                                </label>
                            </div>
                            <div class="flex column">
                                @error('password')
                                <span class="invalid-feedback scrollAnimation" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <input id="password" type="password"
                                       class="scrollAnimation button button-outline border-auth border-3 button-50 pd-3 gray form-control @error('password') is-invalid @enderror"
                                       style="background-size: 20px;
padding-left:30px;"
                                           name="password" required autocomplete="current-password"
                                           placeholder="Wachtwoord">
                            </div>

                            <div class="">
                                <div class="">
                                    <button type="submit"
                                            class="scrollAnimation button bg-purple-main white button-fill pd-3 border-3"
                                            value="Inloggen">
                                        {{ __('Inloggen') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div id="fadeOut1" class="flex column mg-bottom-3 scrollAnimation" style="border-top: 1px solid #313131">
                <form action="{{route('register')}}">
                    <button
                        class=" scrollAnimation button bg-green-light white button-fill pd-3 mg-top-5 border-3 shadow">
                        Registreer
                    </button>
                </form>
                <button
                    onclick="document.location='https://mijn.landvanons.nl/members/new?_gl=1*tv7k6i*_ga*OTc0MDUzMTA0LjE2OTMzMDE1NjM.*_ga_G3P0P6M7D8*MTcwMTc3MzA3OS4yMy4wLjE3MDE3NzMwNzkuMC4wLjA.*_fplc*Ym9ZZDFiYlZUVHVoNTlVZ25jaDVJalFFRkxHeDY3R0pvWXRobXhpbmZZREtTY0ZjdjFFanV2bFRRS0pYeXZ6c1JKYkw3eSUyQnpEQUNFbUNjMnZhSUolMkZMekxhZGhiYmpqT2tMMVhuUVo3T1d5TlN0R0JXbmFtUTVab0RnNkJFdyUzRCUzRA..'"
                    class="scrollAnimation button bg-green-main  white button-fill pd-3 border-3 shadow">Wordt lid
                </button>
            </div>
        </div>
    </section>

</main>
</body>
