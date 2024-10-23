<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('event.message') }}" method="POST">
        @csrf
        <textarea name="message"  placeholder="Enter your message" type="text"></textarea>
        <button type="submit">Send</button>
    </form>
    
</body>
</html>