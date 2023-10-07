<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h4>{{$MailData['title']}}</h4>
<h4>{{$MailData['body']}}</h4>
<h4><button><a href="http://127.0.0.1:8000/api/verifyemail/{{$MailData['button']}}" style="background-color: #4CAF50; color: white; padding: 14px 20px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; border-radius: 5px;"></a></button></h4>

{{-- <form action="{{url('api/vendorregister')}}" method="POST">
    @csrf     
    <input type="hidden" id="inputField" name="token" value="{{$MailData['button']}}" required>

    <button type="submit">Verify Email</button>
</form> --}}

</body>
</html>