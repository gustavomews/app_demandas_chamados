@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-6">
                                Listagem de Demandas/Chamados
                            </div>
                            <div class="col-6">
                                <div class="float-right">
                                    <a href="{{ route('demand.create') }}" class="mr-3">+ Nova demanda</a>
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
                                <tr class="table-warning">
                                    <th scope="row">1</th>
                                    <td>Demanda 1</td>
                                    <td>01/01/2022</td>
                                    <td>ADM</td>
                                    <td>Pendente</td>
                                    <td><a href="{{ route('demand.show', ['demand' => '1']) }}">Visualizar</a></td>
                                </tr>
                                <tr class="table-info">
                                    <th scope="row">2</th>
                                    <td>Demanda 2</td>
                                    <td>01/01/2022</td>
                                    <td>ADM</td>
                                    <td>Andamento</td>
                                    <td><a href="">Visualizar</a></td>
                                </tr>
                                <tr class="table-success">
                                    <th scope="row">3</th>
                                    <td>Demanda 3</td>
                                    <td>01/01/2022</td>
                                    <td>ADM</td>
                                    <td>Concluído</td>
                                    <td><a href="">Visualizar</a></td>
                                </tr>
                                <tr class="table-danger">
                                    <th scope="row">4</th>
                                    <td>Demanda 4</td>
                                    <td>01/01/2022</td>
                                    <td>ADM</td>
                                    <td>Cancelado</td>
                                    <td><a href="">Visualizar</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
