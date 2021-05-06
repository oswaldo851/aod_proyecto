@extends('plantilla.dashboard')


@section('content')
<!-- <link rel="stylesheet" href="{{ asset('/assets/css/bootstrap.min.css') }}"> -->

<div class="container">
<br><br>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-8">
                    <h2 class="card-title">Listado de vehículos registrados en la base de datos</h2>
                </div>
                <div class="col-md-4">
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <span data-href="/exportToCSV" id="export" class="btn btn-info" onclick="exportVehicles(event.target);">Exportar a CSV</span>
                        <a class="btn btn-primary" href="{{ route('vehicles.create') }}">+ Nuevo</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped">

                <thead>
                    <tr>
                        <th>Vehículo</th>
                        <th>Información</th>
                        <th>Descripción</th>
                        
                    </tr>
                    
                </thead>

                <tbody>
                    @forelse ($vehicles as $vehicle)
                    <tr>
                        <td>
                            <a class="btn btn-info btn-small" href="{{ route('vehicles.show', $vehicle->id) }}">
                                <h4>{{ $vehicle->brand }} {{ $vehicle->model }}</h4></td>
                            </a>
                        <td>
                            <p><b>Número de serie: </b>{{ $vehicle->serialNumber }}</p>
                            <p><b>Color: </b>{{ $vehicle->color }}</p>
                            <p><b>Puertas: </b>{{ $vehicle->numberOfDoors }}</p>
                            <p><b>Asientos: </b>{{ $vehicle->numberOfSeats }}</p>
                            <p><b>Matrícula: </b>{{ $vehicle->carRegistration }}</p>
                        </td>
                        <td><p>{{ $vehicle->description }}</p></td>
                        
                    @empty
                        <h1>La tabla no tiene datos</h1>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
      </div>  
</div>


<script>
   function exportVehicles(_this) {
      let _url = $(_this).data('href');
      window.location.href = _url;
   }
</script>


@endsection