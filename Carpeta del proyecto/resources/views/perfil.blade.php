@extends('layouts.mainprofesor')
@section('titulo')
<title>Perfil</title>
@endsection
@section('contenido')
<br></br>
<div class="container-fluid">
    <h5 class="h1 text-center">Bienvenido, {{Auth::User()->nombres}} {{Auth::User()->apellidos}}</h5>
    <p class="lead text-center">Administra tu información personal y la seguridad de tu cuenta en este espacio.</p>
</div>
<br></br>
<div class="d-flex justify-content-center">
  <div class="p-2">
    <div class="card" style="width: 32rem;">
        <div class="card-body">
            <h5 class="card-title text-bold text-dark">Información personal</h5>
            <p class="card-text">Edita tus datos personales para o actualizalos cuando lo veas necesario</p>
            <div class="container justify-content-end align-items-end align-content-end" style="width:100%;"><img src="{{asset('/dash/img/undraw_profile.svg')}}" width="140" id="logo"></div>
            <hr class="hr"></hr>
            <a href="/perfil/datos" class="card-link">Editar datos personales</a>
        </div>
    </div>
  </div>
  <div class="p-2">
    <div class="card" style="width: 32rem;  ">
        <div class="card-body">
            <h5 class="card-title text-bold text-dark">Seguridad y privacidad</h5>
            <p class="card-text">Configura las opciones de privacidad, cambia contraseña, establece tus preferencias a conformidad.</p>
            <div class="container justify-content-end align-items-end align-content-end" style="width:100%;"><img src="{{asset('/dash/img/shield.png')}}" width="140" id="logo"></div>

            <hr class="hr"></hr>
            <a href="/perfil/seguridad" class="card-link">Ir a seguridad y privacidad</a>
        </div>
    </div>
  </div>
</div>
<div class="d-flex justify-content-center">
  <div class="p-2">
    <div class="card" style="width: 32rem;">
        <div class="card-body">
            <h5 class="card-title text-bold text-dark">Configuración</h5>
            <p class="card-text">Edita tus datos personales para o actualizalos cuando lo veas necesario</p>
            
            <hr class="hr"></hr>
            <a href="/perfil/datos" class="card-link">Editar datos personales</a>
        </div>
    </div>
  </div>
  <div class="p-2">
    <div class="card" style="width: 32rem;  ">
        <div class="card-body">
            <h5 class="card-title text-bold text-dark">Solicitar ayuda</h5>
            <p class="card-text">Configura las opciones de privacidad, cambia contraseña, establece tus preferencias a conformidad.</p>
            <hr class="hr"></hr>
            <a href="/perfil/seguridad" class="card-link">Ir a seguridad y privacidad</a>
        </div>
    </div>
  </div>
</div>

@endsection
@section('navbar')
        <li class="nav-item active">
        <a class="nav-link" href="{{url('/')}}">
            <i class="fas fa-fw fa-archive"></i>
            <span>Perfil</span></a>
        </li>
        <!-- Heading -->
        <li class="nav-item">
            <a class="nav-link " href="{{url('/perfil/datos')}}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Datos personales</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{url('/perfil/seguridad')}}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Seguridad</span></a>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Heading -->
        <div class="sidebar-heading">
            Ajustes
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link" href="{{url('/p/r')}}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Notificaciones</span></a>
        </li>
@endsection