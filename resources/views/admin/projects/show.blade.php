@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $project->name }}</h1>
    <p><strong>Link:</strong> <a href="{{ $project->link }}" target="_blank">{{ $project->link }}</a></p>
    <p><strong>Data di Avvio:</strong> {{ $project->start_date }}</p>
    <p><strong>Data di Fine:</strong> {{ $project->end_date ?? 'Non specificata' }}</p>
    <p><strong>Tipologia:</strong> {{ $project->type ? $project->type->name : 'Non specificata' }}</p>
</div>
@endsection
