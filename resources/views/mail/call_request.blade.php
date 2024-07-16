<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Call Request Created</h1>
    @isset($data)
        <p>Name: {{$data['name']}}</p>
        <p>Surname: {{$data['surname']}}</p>
        <p>Phone: {{$data['phone']}}</p>
        @isset($data['service_type'])
            <p>Service Type: {{$data['service_type']}}</p>
        @endisset
        @isset($data['comment'])
            <p>Comment: {{$data['comment']}}</p>
        @endisset
        <p>Language: {{$lang}}</p>
    @endisset
</body>
</html>
