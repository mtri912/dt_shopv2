
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register HTML</title>
</head>
<body>
    <table>
        <tr><td>Dear {{ $name }}</td></tr>
        <tr><td>&nbsp;</td></tr>
        <tr><td>Welcome to DTSneaker.in. Your account information is as below:</td></tr>
        <tr><td>&nbsp;</td></tr>
        <tr><td>Name: {{ $name }}</td></tr>
        <tr><td>&nbsp;</td></tr>
        <tr><td>Mobile: {{ $mobile }}</td></tr>
        <tr><td>&nbsp;</td></tr>
        <tr><td>Email: {{ $email }}</td></tr>
        <tr><td>&nbsp;</td></tr>
        <tr><td>Password: ****** (as chosen by you)</td></tr>
        <tr><td>&nbsp;</td></tr>
        <tr><td>Thanks & Regards,</td></tr>
        <tr><td>DTSneaker.in</td></tr>
        <tr><td>&nbsp;</td></tr>
    </table>

</body>
</html>
