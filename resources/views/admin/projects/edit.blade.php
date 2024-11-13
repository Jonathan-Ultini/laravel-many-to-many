@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Modifica Progetto</h1>
    <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Nome Progetto</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $project->name }}" required>
        </div>
        <div class="mb-3">
            <label for="link" class="form-label">Link</label>
            <input type="url" class="form-control" id="link" name="link" value="{{ $project->link }}" required>
        </div>
        <div class="mb-3">
            <label for="start_date" class="form-label">Data di Avvio</label>
            <input type="date" class="form-control" id="start_date" name="start_date" value="{{ $project->start_date }}" required>
        </div>
        <div class="mb-3">
            <label for="end_date" class="form-label">Data di Fine</label>
            <input type="date" class="form-control" id="end_date" name="end_date" value="{{ $project->end_date }}">
        </div>
        <div class="mb-3">
        <label for="type_id">Tipologia</label>
        <select name="type_id" id="type_id" class="form-control">
            <option value="">Seleziona una tipologia</option>
            @foreach($types as $type)
                <option value="{{ $type->id }}" {{ $project->type_id == $type->id ? 'selected' : '' }}>
                    {{ $type->name }}
                </option>
            @endforeach
        </select>
        </div>
        <div class="mb-3">
            <h3>Seleziona Tecnologie:</h3>
            @foreach($technologies as $technology)
                <div>
                    <input type="checkbox" name="technologies[]" value="{{ $technology->id }}"
                        @if(isset($project) && $project->technologies->contains($technology->id)) checked @endif>
                    <label>{{ $technology->name }}</label>
                </div>
            @endforeach
        </div>
        <!-- Campo per l'immagine -->
        <div class="mb-3">
            <label for="image" class="form-label">Carica una Nuova Immagine (opzionale)</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>

        <!-- Se il progetto ha già un'immagine, mostriamo quella attuale -->
        @if($project->image)
            <div class="mb-3">
                <label>Immagine attuale:</label>
                <img src="{{ asset('storage/' . $project->image) }}" alt="Immagine del progetto" width="100">
            </div>
        @endif
        <button type="submit" class="btn btn-primary">Aggiorna Progetto</button>
    </form>
</div>
@endsection