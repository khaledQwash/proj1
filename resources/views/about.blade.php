<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>hello {{$name}}</h1>
    <form action="about" method="POST">
        @csrf
        <input type="text" name="name" id="name">
        <select name="department" id="department">
            @foreach ($departments as $key=> $value)
            <option value="{{$key}}">{{$value}}</option>
            @endforeach
            {{-- <option value="1">teaching</option>
            <option value="2">marketing</option>
            <option value="3">development</option> --}}
        </select>
        <input type="submit" value="send">
    </form>
</body>
</html>
