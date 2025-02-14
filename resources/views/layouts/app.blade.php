<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<div class="container align-self-center">
    <div class="header-style-1 row mt-3">
        <div class="col-md-1">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </div>
        <div class="col-md-9"></div>
        <div class="col-md-2">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <x-primary-button class="btn btn-secondary btn-sm active">
                    {{ __('Log Out') }}
                </x-primary-button>
            </form>
        </div>
    </div>
</div>
<div class="container-sm align-self-center">
    {{ $slot }}
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        $("#task-form").submit(function(event) {
            event.preventDefault();

            let form = $(this);
            let url = form.attr("action");
            let method = "PUT";
            let formData = form.serialize();

            $.ajax({
                url: url,
                type: method,
                data: formData,
                dataType: "json",
                success: function(response) {
                    console.log(response);
                },
                error: function(xhr, status, error) {
                    console.error("Ошибка:", error);
                    $("#response").text("Ошибка отправки данных");
                }
            });
            return false;
        });
    });
</script>
</body>
</html>
