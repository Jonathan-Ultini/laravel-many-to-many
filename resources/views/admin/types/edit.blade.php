@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Modifica Tipologia</h1>
        <form action="{{ route('admin.types.update', $type) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Nome</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $type->name }}" required>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Aggiorna</button>
        </form>
    </div>
@endsection