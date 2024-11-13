@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Dettagli Tipologia</h1>
        <p><strong>ID:</strong> {{ $type->id }}</p>
        <p><strong>Nome:</strong> {{ $type->name }}</p>
        <a href="{{ route('admin.types.index') }}" class="btn btn-secondary">Torna alla lista</a>
    </div>
@endsection