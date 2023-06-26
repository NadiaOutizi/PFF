<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
      <p>You have received a new contact form submission from {{ $name }} ({{ $email }}).</p>
    <p>Here are the details:</p>
    <ul>
        <li>Name: {{ $name }}</li>
        <li>Email: {{ $email }}</li>
        <li>Message: {{ $contenu }}</li>
    </ul>

</body>
</html>
  