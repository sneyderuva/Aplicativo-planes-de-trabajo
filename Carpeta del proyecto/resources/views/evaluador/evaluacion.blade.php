@extends('layouts.mainprofesor')
@section('titulo')
<title>Plan de trabajo {{$id_p_trabajo}}</title>
@endsection
@section('contenido')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Plan de trabajo N°. 
        <?php switch($id_p_trabajo){
            
            case $id_p_trabajo>0 and $id_p_trabajo <=9:
                echo "000".$id_p_trabajo;
            break;
            case $id_p_trabajo>=9 and $id_p_trabajo<=99:
                echo "00".$id_p_trabajo;
            break;
            case $id_p_trabajo>=99 and $id_p_trabajo<=999:
                echo "0".$id_p_trabajo;
            break;
            case $id_p_trabajo>=999 and $id_p_trabajo<=9999:
                echo $id_p_trabajo;
            break;

        } ?>
        
    </h1>
                
    </div>

    <div class="card">
        <h5 class="card-header">Actividad xx</h5>
        <div class="card-body">
            
            <h5 class="card-title">Tareas *X*</h5> 
                

        </div>
    </div>
    <br>
    </br>
    
</div>
<br>
</br>

@endsection