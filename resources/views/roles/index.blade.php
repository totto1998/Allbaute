@extends('layouts.master')
@section('title')
@lang('translation.orders')
@endsection
@section('css')
<link href="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1')
Permisos Especiales
@endslot
@slot('title')
Roles
@endslot
@endcomponent

    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Roles</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
        
                        @can('crear-rol')
                        <a class="btn btn-warning" href="{{ route('roles.create') }}">Nuevo</a>                        
                        @endcan
        
                
                            <table class="table table-striped mt-2">
                                <thead style="background-color:#6777ef">                                                       
                                    <th style="color:#fff;">Rol</th>
                                    <th style="color:#fff;">Acciones</th>
                                </thead>  
                                <tbody>
                                @foreach ($roles as $role)
                                <tr>                           
                                    <td>{{ $role->name }}</td>
                                    <td>                                
                                        @can('editar-roles')
                                            <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Editar</a>
                                        @endcan
                                        
                                        @can('borrar-roles')
                                            {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                                                {!! Form::submit('Borrar', ['class' => 'btn btn-danger']) !!}
                                            {!! Form::close() !!}
                                        @endcan
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>               
                            </table>

                            
                            <div class="pagination justify-content-end">
                                {!! $roles->links() !!} 
                            </div>                    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0/js/select2.min.js"></script>

<script src="{{ URL::asset('build/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js') }}"></script>

<script src="{{ URL::asset('build/libs/dropzone/dropzone-min.js') }}"></script>
<script src="{{ URL::asset('build/js/pages/ecommerce-product-create.init.js') }}"></script>

<script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection