@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow p-4">
                <h3 class="text-center mb-4">Crear Cliente</h3>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('clientes.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="rut_empresa" class="form-label">RUT Empresa</label>
                        <input type="text" name="rut_empresa" class="form-control" value="{{ old('rut_empresa') }}" required pattern="\d{7,8}-[\dkK]" title="Formato: 12345678-9" oninvalid="this.setCustomValidity('Ingresa el RUT en formato 12345678-9')" oninput="this.setCustomValidity('')">
                    </div>

                    <div class="mb-3">
                        <label for="rubro" class="form-label">Rubro</label>
                        <input type="text" name="rubro" class="form-control" value="{{ old('rubro') }}" required oninvalid="this.setCustomValidity('Completa este campo')" oninput="this.setCustomValidity('')">
                    </div>

                    <div class="mb-3">
                        <label for="razon_social" class="form-label">Razón Social</label>
                        <input type="text" name="razon_social" class="form-control" value="{{ old('razon_social') }}" required oninvalid="this.setCustomValidity('Completa este campo')" oninput="this.setCustomValidity('')">
                    </div>

                    <div class="mb-3">
                        <label for="telefono" class="form-label">Teléfono</label>
                        <input type="text" name="telefono" class="form-control" value="{{ old('telefono') }}" required pattern="\d{7,15}" title="Solo números, 7-15 dígitos" oninvalid="this.setCustomValidity('Ingresa solo números, 7-15 dígitos')" oninput="this.setCustomValidity('')">
                    </div>

                    <div class="mb-3">
                        <label for="direccion" class="form-label">Dirección</label>
                        <input type="text" name="direccion" class="form-control" value="{{ old('direccion') }}" required oninvalid="this.setCustomValidity('Completa este campo')" oninput="this.setCustomValidity('')">
                    </div>

                    <div class="mb-3">
                        <label for="nombre_contacto" class="form-label">Nombre Contacto</label>
                        <input type="text" name="nombre_contacto" class="form-control" value="{{ old('nombre_contacto') }}" required oninvalid="this.setCustomValidity('Completa este campo')" oninput="this.setCustomValidity('')">
                    </div>

                    <div class="mb-3">
                        <label for="email_contacto" class="form-label">Email Contacto</label>
                        <input type="email" name="email_contacto" class="form-control" value="{{ old('email_contacto') }}" required oninvalid="this.setCustomValidity('Ingresa un correo válido')" oninput="this.setCustomValidity('')">
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Crear Cliente</button>
                    <a href="{{ route('clientes.index') }}" class="btn btn-secondary w-100 mt-2">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
