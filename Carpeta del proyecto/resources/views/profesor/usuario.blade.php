@extends('layouts.mainprofesor')
@section('titulo')
<title>Profesor</title>
@endsection
@section('contenido')

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Nombres
                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                            </div>
                            <div class="col">
                                <div class="progress progress-sm mr-2">
                                    <div class="progress-bar bg-info" role="progressbar"
                                        style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                        aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
                    
@endsection
@section('scripts')
        <script>
        $(document).ready(function(){
            @if($message = Session::get('ErrorInsert'))
                $("#ModalAgregarpt").modal('show');
            
            @elseif($message = Session::get('Correcto'))
            Swal.fire({
            title: '¡Perfecto!',
            text: 'Agregado correctamente',
            icon: 'success',
            confirmButtonText: 'Aceptar'
            });
            @endif
        });
    </script>
@endsection