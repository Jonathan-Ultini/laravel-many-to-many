@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tecnologie</h1>
    <a href="{{ route('admin.technologies.create') }}" class="btn btn-primary">Aggiungi Tecnologia</a>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Azioni</th>
            </tr>
        </thead>
        <tbody>
            @foreach($technologies as $technology)
                <tr>
                    <td>{{ $technology->name }}</td>
                    <td>
                        <a href="{{ route('admin.technologies.show', $technology->id) }}" class="btn btn-info">Visualizza</a>
                        <a href="{{ route('admin.technologies.edit', $technology->id) }}" class="btn btn-warning">Modifica</a>
                        <form action="{{ route('admin.technologies.destroy', $technology->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Sei sicuro di voler eliminare questa tecnologia?')">Elimina</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
