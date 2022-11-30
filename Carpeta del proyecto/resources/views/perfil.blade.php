@extends('layouts.mainprofesor')
@section('contenido')
<br></br>
<div class="container-fluid">
    <h5 class="h1 text-center">Bienvenido, {{Auth::User()->nombres}} {{Auth::User()->apellidos}}</h5>
    <p class="lead text-center">Administra tu información personal y la seguridad de tu cuenta en este espacio.</p>
</div>
<br></br>
<div class="d-flex justify-content-around">
  <div class="p-2">
    <div class="card" style="width: 32rem;">
        <div class="card-body">
            <h5 class="card-title text-bold text-dark">Información personal</h5>
            <p class="card-text">Edita tus datos personales para o actualizalos cuando lo veas necesario</p>
            <hr class="hr"></hr>
            <a href="/perfil/datos" class="card-link">Editar datos personales</a>
        </div>
    </div>
  </div>
  <div class="p-2">
    <div class="card" style="width: 32rem;">
        <div class="card-body">
            <h5 class="card-title text-bold text-dark">Seguridad y privacidad</h5>
            <p class="card-text">Configura las opciones de privacidad, cambia contraseña, establece tus preferencias a conformidad.</p>
            <hr class="hr"></hr>
            <a href="/perfil/seguridad" class="card-link">Ir a seguridad y privacidad</a>
        </div>
    </div>
  <div class="p-2">Flex item 3</div>
</div>

@endsection