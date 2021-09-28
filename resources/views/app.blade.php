<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet" />
    <script src="{{ mix('/js/app.js') }}" defer></script>
    <meta http-equiv="cache-control" content="private, max-age=0, no-cache">
    <meta http-equiv="pragma" content="no-cache">
    <meta http-equiv="expires" content="0">
    <title>Document</title>
</head>
<body>
    @inertia

    <script>
        const AuthUserId = "{{ auth()->id() }}"


    </script>
</body>
</html>
