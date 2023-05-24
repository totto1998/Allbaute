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
Usuarios
@endslot
@endcomponent

<section class="section">

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Tabla de Usuarios</h5>
            </div>
            <div class="card-header">
                <a class="btn btn-warning" href="{{route('user.create')}}">Nuevo</a>
            </div>
            <div class="card-body">
                <div class="table-responsive table-card mb-1">
                <table id="model-datatables" class="table table-bordered nowrap table-striped align-middle" style="width:100%">
                    <thead>
                        <tr>
                            
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Rol</th>
                            <th>Avatar</th>
                            {{--  <th>Assigned To</th>  --}}
                            {{--  <th>Created By</th>  --}}
                            <th>Create Date</th>
                            {{--  <th>Status</th>  --}}
                            {{--  <th>Priority</th>  --}}
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                @if (!@empty($user->getRoleNames()))
                                    @foreach($user->getRoleNames() as $rolName)
                                    <h5><span>{{$rolName}}</span></h5>
                                    @endforeach
                                @endif
                            </td>
                            <td>{{$user->avatar}}</td>
                            <td>{{$user->created_at}}</td>
                            {{--  <td>Alexis Clarke</td>
                            <td>Joseph Parker</td>  --}}
                            {{--  <td><span class="badge badge-soft-info">Re-open</span></td>
                            <td><span class="badge bg-danger">High</span></td>  --}}
                            <td>
                                <div class="dropdown d-inline-block">
                                    <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="ri-more-fill align-middle"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        {{--  <li><a href="{{route('user.view')}}" class="dropdown-item"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> View</a></li>  --}}
                                        <li><a href="{{ route('user.edit', $user->id) }}" class="dropdown-item edit-item-btn"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a></li>
                                        <li>
                                            <form action="{{ route('user.destroy', $user->id) }}" method="POST" class="delete-form">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="dropdown-item remove-item-btn"><i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Delete</button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        @endforeach    
                    </tbody>
                </table>
                {{--  <div class="pagination justify-content-end">
                    {{ $user->links() }}
                </div>  --}}
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
