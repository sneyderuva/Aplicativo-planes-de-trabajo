@extends('layouts.mainprofesor')

@section('contenido')
    @yield('subcontenido')
@endsection
@section('navbar')
    <li class="nav-item">
        <a class="nav-link" href="{{url('/')}}">
            <i class="fas fa-fw fa-archive"></i>
            <span>Progreso</span></a>
        </li>
        <!-- Heading -->
        <li class="nav-item">
            <a class="nav-link " href="{{url('/p')}}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Planes de trabajo</span></a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="{{url('/p/a')}}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Mis actividades</span></a>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Heading -->
        <div class="sidebar-heading">
            Evaluación
        </div>
        
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link" href="{{url('/p/r')}}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Resultados</span></a>
        </li>
@endsection
