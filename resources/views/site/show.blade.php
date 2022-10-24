@extends('layouts.app')

@section('template_title')
    {{ $site->name ?? 'Show Site' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Visualizar Lugar Turistico</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('site.index') }}"> Regresar</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre del Lugar:</strong>
                            {{ $site->name }}
                        </div>
                        <div class="form-group">
                            <strong>Descripción:</strong>
                            {{ $site->description }}
                        </div>
                        <div class="form-group">
                            <strong>Departamento:</strong>
                            {{ $site->state }}
                        </div>
                        <div class="form-group">
                            <strong>Imagen:</strong>
                            <br>
                            <center>
                            <img src="{{ asset('img/sites/'.$site->image_path) }}" alt="">
                            </center>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
