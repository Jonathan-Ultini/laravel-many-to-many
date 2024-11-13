@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Aggiungi Tecnologia</h1>

    <form action="{{ route('admin.technologies.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nome Tecnologia</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success mt-3">Salva</button>
    </form>
</div>
@endsection
