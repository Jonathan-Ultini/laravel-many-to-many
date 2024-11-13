@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $project->name }}</h1>
    <p><strong>Link:</strong> <a href="{{ $project->link }}" target="_blank">{{ $project->link }}</a></p>
    <p><strong>Data di Avvio:</strong> {{ $project->start_date }}</p>
    <p><strong>Data di Fine:</strong> {{ $project->end_date ?? 'Non specificata' }}</p>
    <p><strong>Tipologia:</strong> {{ $project->type ? $project->type->name : 'Non specificata' }}</p>
    <h3>Tecnologie Utilizzate:</h3>
    @if($project->technologies->isNotEmpty())
        <ul>
            @foreach($project->technologies as $technology)
                <li>{{ $technology->name }}</li>
            @endforeach
        </ul>
    @else
        <p>Nessuna tecnologia associata.</p>
    @endif
    @if($project->image)
        <img src="{{ asset('storage/' . $project->image) }}" alt="Immagine del progetto" class="img-fluid">
    @endif

</div>
@endsection
