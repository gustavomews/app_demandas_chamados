@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card card">
                    <div class="card-header">Editar Demanda {{ $demand->id }}</div>

                    <div class="card-body">
                        @component('demand._components.form_create_edit', ['demand' => $demand])
                        @endcomponent
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
