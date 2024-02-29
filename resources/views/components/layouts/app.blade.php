<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'Page Title' }} | HealthApp</title>

        <script
            src="https://sentry.nickmous.com/js-sdk-loader/c52b0af968c705aa26066ba17bb93ad5.min.js"
            crossorigin="anonymous"
        ></script>
    </head>
    <body>
        {{ $slot }}
    </body>
</html>
