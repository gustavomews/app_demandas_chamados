{{-- CREATE --}}
@if (!isset($demand->id))
    <form method="POST" action="{{ route('demand.store') }}">
        @csrf
    @else
        {{-- EDIT --}}
        <form method="POST" action="{{ route('demand.update', ['demand' => $demand->id]) }}">
            @csrf
            @method('PATCH')
@endif

<div class="form-group row">
    <label for="title" class="col-md-4 col-form-label text-md-right">Título</label>

    <div class="col-md-6">
        <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title"
            value="{{ $demand->title ?? old('title') }}" autofocus maxlength="40">

        @error('title')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="description" class="col-md-4 col-form-label text-md-right">Descrição</label>

    <div class="col-md-6">
        <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description"
            maxlength="2000">{{ $demand->description ?? old('description') }}</textarea>

        @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row mb-0">
    <div class="col-md-8 offset-md-4">
        <button type="submit" class="btn btn-primary">{{ !isset($demand->id) ? 'Cadastrar' : 'Editar' }}</button>
    </div>
</div>
</form>
