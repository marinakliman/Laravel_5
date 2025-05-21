<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Document</title>
</head>

<body>
    <form name="employeeForm1" method="POST" action="{{ url("/user/$id")}}">
        @csrf
        @method('PUT')
        <div class="userForm">
            <div class="userForm__item">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" required=”true”>
            </div>
            <div class="userForm__item">
                <label for="lastname">Lastname</label>
                <input type="text" name="lastname" id="lastname" required=”true”>
            </div>
            <div class="userForm__item">
                <label for="position">Position</label>
                <input type="text" name="position" id="position" required=”true”>
            </div>
            <div class="userForm__item">
                <label for="email">E-mail</label>
                <input type="email" name="email" id="email" required=”true”>
            </div>
            <div class="userForm__item">
                <label for="address">Address</label>
                <input type="text" name="address" id="address" required=”true”>
            </div>
            <button type="submit" class="userForm__button">Submit</button>
        </div>
    </form>
</body>

</html>
