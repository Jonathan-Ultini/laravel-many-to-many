@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Modifica Tecnologia</h1>

    <form action="{{ route('admin.technologies.update', $technology->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nome Tecnologia</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $technology->name }}" required>
        </div>

        <button type="submit" class="btn btn-success mt-3">Aggiorna</button>
    </form>
</div>
@endsection
