<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<table>
    <tr><td>Dear {{ $name }}</td></tr>
    <tr><td>&nbsp;</td></tr>
    <tr><td>Click on the below link to activate your DTSneaker.in Account:</td></tr>
    <tr><td>&nbsp;</td></tr>
    <tr><td><a href="{{ url('user/confirm/'.$code) }}">Confirm Account</a></td></tr>
    <tr><td>&nbsp;</td></tr>
    <tr><td>Thanks & Regards,</td></tr>
    <tr><td>DTSneaker.in</td></tr>
    <tr><td>&nbsp;</td></tr>
</table>

</body>
</html>
