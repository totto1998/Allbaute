@extends('layouts.master')
@section('title') @lang('translation.dashboards')
@endsection
@section('css')
<link href="{{ URL::asset('build/libs/jsvectormap/css/jsvectormap.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('build/libs/swiper/swiper-bundle.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')

@component('components.breadcrumb')
@slot('li_1') Tables @endslot
@slot('title')Datatables @endslot
@endcomponent

    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="text-center mt-2">
                                <h5 class="text-primary">Create New Account</h5>
                                <p class="text-muted">Get your free ALL BAUTE account now</p>
                            </div>
                            <div class="p-2 mt-4">
                                <form method="POST" action="{{ route('user.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    
                                    <div class="form-group">
                                      <label for="name">Nombre:</label>
                                      <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required>
                                      @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                      @enderror
                                    </div>
                                    
                                    <div class="form-group">
                                      <label for="email">Email:</label>
                                      <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required>
                                      @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                      @enderror
                                    </div>
                                  
                                    <div class="form-group">
                                      <label for="password">Contraseña:</label>
                                      <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>
                                      @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                      @enderror
                                    </div>
                                  
                                    <div class="form-group">
                                      <label for="confirm-password">Confirmar Contraseña:</label>
                                      <input type="password" class="form-control @error('confirm-password') is-invalid @enderror" name="confirm-password" required>
                                      @error('confirm-password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                      @enderror
                                    </div>
                                  
                                    <div class="form-group">
                                      <label for="roles">Roles:</label>
                                      {!! Form::select('roles[]', $roles,[], array('class' => 'form-control')) !!}
                                      @error('roles')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                      @enderror
                                    </div>
                                  
                                    <div class="form-group">
                                      <label for="avatar">Avatar:</label>
                                      <input type="file" class="form-control-file @error('avatar') is-invalid @enderror" name="avatar" accept="image/*">
                                      @error('avatar')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                      @enderror
                                    </div>
                                  
                                    <button type="submit" class="btn btn-primary">Crear Usuario</button>
                                  </form>
                                {{--  <form class="needs-validation" novalidate method="POST"
                                    action="{{ route('user.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="useremail" class="form-label">Email <span
                                                class="text-danger">*</span></label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            name="email" value="{{ old('email') }}" id="useremail"
                                            placeholder="Enter email address" required>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <div class="invalid-feedback">
                                            Please enter email
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Username <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            name="name" value="{{ old('name') }}" id="username"
                                            placeholder="Enter username" required>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <div class="invalid-feedback">
                                            Please enter username
                                        </div>
                                    </div>

                                    <div class="mb-2">
                                        <label for="userpassword" class="form-label">Password <span
                                                class="text-danger">*</span></label>
                                        <input type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            id="userpassword" placeholder="Enter password" required>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <div class="invalid-feedback">
                                            Please enter password
                                        </div>
                                    </div>
                                    <div class=" mb-4">
                                        <label for="input-password">Confirm Password</label>
                                        <input type="password"
                                            class="form-control @error('password_confirmation') is-invalid @enderror"
                                            name="password_confirmation" id="input-password"
                                            placeholder="Enter Confirm Password" required>

                                        <div class="form-floating-icon">
                                            <i data-feather="lock"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12"> 
                                        <label for="">Roles</label>
                                            {!! Form::select('roles[]', $roles,[], array('class' => 'form-control')) !!}
                                        <div class="mb-4">
                                            <i data-feather="file"></i>
                                        </div>
                                    </div>
                                    <div class=" mb-4">
                                        <label for="">Avatar</label>
                                        <input type="file" class="form-control @error('avatar') is-invalid @enderror"
                                            name="avatar" id="input-avatar" required>
                                        @error('avatar')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <div class="">
                                            <i data-feather="file"></i>
                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        <p class="mb-0 fs-12 text-muted fst-italic">By registering you agree to the
                                            Velzon <a href="#"
                                                class="text-primary text-decoration-underline fst-normal fw-medium">Terms
                                                of Use</a></p>
                                    </div>  

                                    <div class="mt-4">
                                        <button class="btn btn-success w-100" type="submit">Sign Up</button>
                                    </div>

                                    
                                </form>  --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
