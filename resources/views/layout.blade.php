<!DOCTYPE html>
<html>
<head>
    <title>Laravel</title>
    <meta charset="utf-8"/>
    <meta name="_token" content="{!! csrf_token() !!}"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="stylesheet" type="text/css" href="/css/all.css">
    <script type="text/javascript" src="/js/all.js"></script>
</head>
<body>
@include('partial.header')
@yield('contents')
<script>
    var log_user_id = <?php echo json_encode(Auth::check()? Auth::user()->id : '') ?>;
</script>
</body>
</html>