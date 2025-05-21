<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <table border="3">
        @foreach ($users as $user)
            <tr>
                <td>{{ $user['id'] }}</td>
                <td>{{ $user['name'] }}</td>
                <td>{{ $user['lastname'] }}</td>
                <td>{{ $user['position'] }}</td>
                <td>{{ $user['email'] }}</td>
                <td>{{ $user['address'] }}</td>
                <td><a href="{{ url('/change-employee', ['id' => $user['id']]) }}">Изменить</a></td>
            </tr>
        @endforeach
    </table>
    <a href="/get-employee-data">Добавить</a>
</body>

</html>
