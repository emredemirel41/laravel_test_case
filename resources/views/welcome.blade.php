<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


</head>

<body class="bg-light">
    <!-- Form Part -->
    <section class="container" style="margin-top:15%;">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col-md-6 col-sm-8 mx-auto col-12">
                <div class="card p-5 mx-auto  shadow">
                    <form>
                        <h4>Login Form</h4>
                        <hr>
                        <div class="mb-3">
                            <label for="emailInputField" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="emailInputField"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="passwordInputField" class="form-label">Password</label>
                            <input type="password" class="form-control" id="passwordInputField">
                        </div>
                        <button type="submit" class="btn float-right btn-primary">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
