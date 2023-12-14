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
    <script>
        function submitForm() { // submits form
            document.getElementById("submitForm").submit();
        }

        function btnSearchClick() {
            if (document.getElementById("submitForm")) {
                let logo = document.getElementById("logo");
                let body = document.getElementById("fadeOut");
                logo.classList.add("fadeCentre");
                body.classList.add("fadeOut");

                setTimeout("submitForm()", 2000); // set timout
            }
        }

    </script>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="flex column align-center content-around w-100" style="height: 100vh;">
                        <img src="{{asset('images/LandVanOns.png')}}" id="logo" class="headerImg scrollAnimation">
                        <div id="fadeOut" class="mg-bottom-3">
                            <form method="POST" action="{{ route('register') }}" id="submitForm">
                                @csrf

                                <div class="flex column">
                                    <input id="name" type="text"
                                           placeholder="Naam"
                                           class="scrollAnimation button button-outline mg-bottom-2 border-auth border-3 pd-3 gray button-50 form-control @error('name') is-invalid @enderror"
                                           name="name"
                                           value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="flex column">
                                    <input id="email" type="email"
                                           class="scrollAnimation button button-outline mg-bottom-2 border-auth border-3 pd-3 gray button-50 form-control @error('email') is-invalid @enderror"
                                           name="email"
                                           placeholder="E-mailadres" value="{{ old('email') }}" required
                                           autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="flex column">
                                    <input id="phone" type="text"
                                           class="scrollAnimation button button-outline mg-bottom-2 border-auth border-3 pd-3 gray button-50 form-control @error('phone') is-invalid @enderror"
                                           name="phone" placeholder="Telefoonnummer"
                                           value="{{ old('phone') }}" required>

                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="flex column">
                                    <input id="password" type="password" placeholder="Wachtwoord"
                                           class="scrollAnimation button button-outline mg-bottom-2 border-auth border-3 pd-3 gray button-50 form-control @error('password') is-invalid @enderror"
                                           name="password"
                                           required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="flex column">
                                    <input id="password-confirm" placeholder="Bevestig wachtwoord" type="password"
                                           class="scrollAnimation button button-outline mg-bottom-1 border-auth border-3 pd-3 gray button-50 form-control"
                                           name="password_confirmation" required autocomplete="new-password">
                                </div>

                                <div class="flex column">
                                    <button type="button" onclick="btnSearchClick()"
                                            class="scrollAnimation button bg-purple-main white button-fill pd-3 border-3">
                                        Registreren
                                    </button>
                                </div>
                                <div style="border-top: 1px solid black" class="scrollAnimation mg-top-1 mg-bottom-4">
                                    <a href="{{route('login')}}"
                                        class="button bg-green-light white button-50-a pd-3 mg-top-2 border-3 shadow decoration-none" style="display: block; align-self: center; text-align: center">
                                        Inloggen
                                    </a>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
</body>
