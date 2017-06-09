<!-- app/views/users/edit.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Look! I'm CRUDding</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('users') }}">user Alert</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('users') }}">View All users</a></li>
        <li><a href="{{ URL::to('users/create') }}">Create a user</a>
    </ul>
</nav>

<h1>Edit {{ $user->name }}</h1>
<form action="/users/{{ $user->id }}" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="_method" value="PUT">
  <div class="form-group">
    <label for="name">Nombre</label>
    <input type="text" class="form-control" id="name" name="name" value={{ $user->name }}>
  </div>
  <div class="form-group">
    <label for="email">Correo electrónico</label>
    <input type="email" class="form-control" id="email" name="email" value={{ $user->email }}>
  </div>
  <div class="form-group">
    <label for="password">Contraseña</label>
    <input type="password" class="form-control" id="password" name="password" value={{ $user->password }}>
  </div>
  <div class="form-group">
    <label for="permission">Nivel de acceso</label>
  <select class="form-control" id="permission" name="permission">
  <option value=1 @if ($user->permission == 1) selected @endif >Cajero</option>
  <option value=2 @if ($user->permission == 2) selected @endif>Supervisor</option>
</select>
  </div>

  <input type="submit" value="Guardar" class="btn btn-default">
</form>
</div>
</body>
</html>