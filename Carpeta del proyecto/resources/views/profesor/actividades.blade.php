@extends('profesor.detalles')
@section('titulo')
<title>Actividades</title>
@endsection
@section('subcontenido')


    <!-- Navs Tabs ================================================== -->
    <div class="bs-docs-section">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-header"></div>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-lg">
                <div class="bs-component">
                    <ul class="nav nav-tabs">
                        
                        <li class="nav-item ">
                            <a class="nav-link active" data-toggle="tab" href="#act">Actividades</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tar">Tareas</a>
                        </li>
                       
                        
                    </ul>
                    <div id="myTabContent" class="tab-content">
                        <div class="tab-pane fade show active" id="pt">
                            <div class="row">
                                <!-- Pending Requests Card Example -->
                                <div class="col-3 col-md-6 mb-4">
                                    <div class="card border-left-warning shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                        Actividades pendientes</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">6</div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-comments fa-2x text-gray-300"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Content Row -->
                                <div class="row">

                                <!-- Content Column -->
                                <div class="col-lg-6 mb-4">

                                    <!-- Project Card Example -->
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3">
                                            <h6 class="m-0 font-weight-bold text-primary">Projects</h6>
                                        </div>
                                        <div class="card-body">
                                            <h4 class="small font-weight-bold">Server Migration <span
                                                    class="float-right">20%</span></h4>
                                            <div class="progress mb-4">
                                                <div class="progress-bar bg-danger" role="progressbar" style="width: 20%"
                                                    aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <h4 class="small font-weight-bold">Sales Tracking <span
                                                    class="float-right">40%</span></h4>
                                            <div class="progress mb-4">
                                                <div class="progress-bar bg-warning" role="progressbar" style="width: 40%"
                                                    aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <h4 class="small font-weight-bold">Customer Database <span
                                                    class="float-right">60%</span></h4>
                                            <div class="progress mb-4">
                                                <div class="progress-bar" role="progressbar" style="width: 60%"
                                                    aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <h4 class="small font-weight-bold">Payout Details <span
                                                    class="float-right">80%</span></h4>
                                            <div class="progress mb-4">
                                                <div class="progress-bar bg-info" role="progressbar" style="width: 80%"
                                                    aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <h4 class="small font-weight-bold">Account Setup <span
                                                    class="float-right">Complete!</span></h4>
                                            <div class="progress">
                                                <div class="progress-bar bg-success" role="progressbar" style="width: 100%"
                                                    aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                 </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="po">
                            <div class="row">
                                
                            </div>
                        </div>
                        
                        <div class="tab-pane fade" id="pc">
                            
                        </div>
                        
                        <div class="tab-pane fade" id="semestres">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- End Navs Tabs ================================================== -->

 


@endsection