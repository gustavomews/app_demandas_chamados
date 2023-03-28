@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-4">
                                Demanda {{ $demand->id }}
                            </div>
                            <div class="col-8">
                                <div class="float-right">

                                    {{-- Pendente > Permite editar e abrir --}}
                                    @if ($demand->status_id == 1)
                                        <a href="{{ route('demand.edit', ['demand' => $demand->id]) }}">
                                            <button type="button" class="btn btn-secondary">Editar</button>
                                        </a>
                                        <a href="{{ route('demand.open', ['demand' => $demand->id]) }}">
                                            <button type="button" class="btn btn-primary">Abrir</button>
                                        </a>


                                        {{-- Em andamento > Permite concluir e cancelar --}}
                                    @elseif ($demand->status_id == 2)
                                        <a href="{{ route('demand.cancel', ['demand' => $demand->id]) }}">
                                            <button type="button" class="btn btn-danger">Cancelar</button>
                                        </a>

                                        <a href="{{ route('demand.conclude', ['demand' => $demand->id]) }}">
                                            <button type="button" class="btn btn-success">Concluir</button>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="card-body">
                        <h5 class="card-title">
                            {{ $demand->title }}
                            <span class="badge bg-{{ $demand->status->codename }} align-top">
                                {{ $demand->status->title }}
                            </span>
                        </h5>

                        <h6 class="card-subtitle mb-2 text-muted">
                            Criado por <b>{{ $demand->user->name }}</b>
                            às <b>{{ date('d/m/Y H:i:s', strtotime($demand->datetime_open)) }}</b>
                        </h6>

                        <p class="card-text">
                            @if ($demand->description)
                                <b>Descrição:</b> {{ $demand->description }}
                            @endif
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <h4>Interações realizadas</h4>
                <hr>
                <ul class="timeline">
                    @foreach ($interactions as $interaction)
                        <li class="timeline-item bg-white rounded ml-3 p-4">
                            <div class="timeline-arrow"></div>
                            <h5 class="card-title">{{ $interaction->description }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">
                                Realizada por <b>{{ $interaction->user->name }}</b>
                                às <b>{{ date('d/m/Y H:i:s', strtotime($interaction->datetime_interaction)) }}</b>
                            </h6>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
