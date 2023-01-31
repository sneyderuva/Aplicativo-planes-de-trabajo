@extends('layouts.mainprofesor')

@section('contenido')
    @yield('subcontenido')
@endsection
@section('navbar')
    <li class="nav-item">
        <a class="nav-link" href="{{url('/')}}">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-activity" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M6 2a.5.5 0 0 1 .47.33L10 12.036l1.53-4.208A.5.5 0 0 1 12 7.5h3.5a.5.5 0 0 1 0 1h-3.15l-1.88 5.17a.5.5 0 0 1-.94 0L6 3.964 4.47 8.171A.5.5 0 0 1 4 8.5H.5a.5.5 0 0 1 0-1h3.15l1.88-5.17A.5.5 0 0 1 6 2Z"/>
            </svg>
            <span>Progreso</span></a>
        </li>
        <!-- Heading -->
        <li class="nav-item">
            <a class="nav-link " href="{{url('/p')}}">
                <i class="fas fa-fw fa-archive"></i>
                <span>Planes de trabajo</span></a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="{{url('/p/a')}}">
                <i class="fas fa-fw fa-edit"></i>
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
                <i class="fas fa-fw fa-clipboard-check"></i>
                <span>Resultados</span></a>
        </li>
@endsection
