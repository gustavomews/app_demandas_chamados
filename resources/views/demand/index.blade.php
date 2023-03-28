@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-6">
                                Lista de Demandas
                            </div>
                            <div class="col-6">
                                <div class="float-right">
                                    <a href="{{ route('demand.create') }}"><button type="button"
                                            class="btn btn-primary">Nova demanda</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Número</th>
                                    <th scope="col">Título</th>
                                    <th scope="col">Abertura</th>
                                    <th scope="col">Aberto por</th>
                                    <th scope="col">Status</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($demands) == 0)
                                    <tr>
                                        <td colspan="6" class="text-center">Nenhuma demanda cadastrada!</td>
                                    </tr>
                                @else
                                    @foreach ($demands as $demand)
                                        <tr class="table-{{ $demand->status->codename }}">
                                            <th class="align-middle" scope="row">{{ $demand->id }} </th>
                                            <td class="align-middle">{{ $demand->title }}</td>
                                            <td class="align-middle">
                                                {{ date('d/m/Y H:i:s', strtotime($demand->datetime_open)) }}
                                            </td>
                                            <td class="align-middle">{{ $demand->user->name }}</td>
                                            <td class="align-bottom">
                                                <h5>
                                                    <span class="badge bg-{{ $demand->status->codename }}">
                                                        {{ $demand->status->title }}
                                                    </span>
                                                </h5>
                                            </td>
                                            <td class="align-middle">
                                                <a href="{{ route('demand.show', ['demand' => $demand->id]) }}">
                                                    <button type="button" class="btn btn-{{ $demand->status->codename }}">
                                                        Visualizar
                                                    </button>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
