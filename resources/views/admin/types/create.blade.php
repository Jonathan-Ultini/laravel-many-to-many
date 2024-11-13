@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Aggiungi Tipologia</h1>
        <form action="{{ route('admin.types.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nome</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Salva</button>
        </form>
    </div>
@endsection