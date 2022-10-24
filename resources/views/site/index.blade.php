@extends('layouts.app')

@section('template_title')
    Site
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Lugares Turisticos') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('site.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear Nuevo') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>N°</th>
                                        
										<th>Nombre</th>
										<th>Descripción</th>
										<th>Departamento</th>
										<th>Imagen</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sites as $site)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $site->name }}</td>
											<td>{{ $site->description }}</td>
											<td>{{ $site->state }}</td>
											<td><img src="{{ asset('img/sites/'.$site->image_path) }}" style="max-height:100px; max-width: 180px"></td>

                                            <td>
                                                <form action="{{ route('site.destroy',$site->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('site.show',$site->id) }}"><i class="fa fa-fw fa-eye"></i> Visualizar</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Eliminar</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $sites->links() !!}
            </div>
        </div>
    </div>
@endsection
