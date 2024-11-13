@extends('layouts.app')

@section('content')
    <h1>Gestione Progetti</h1>
    <a href="{{ route('admin.projects.create') }}" class="btn btn-primary">Aggiungi Nuovo Progetto</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Link</th>
                <th>Data di Inizio</th>
                <th>Data di Fine</th>
                <th>Azioni</th>
            </tr>
        </thead>
        <tbody>
            @foreach($projects as $project)
                <tr>
                    <td><a href="{{ route('admin.projects.show', $project) }}" class="btn">{{ $project->name }}</a></td>
                    <td><a href="{{ $project->link }}">{{ $project->link }}</a></td>
                    <td>{{ $project->start_date }}</td>
                    <td>{{ $project->end_date }}</td>
                    <td>
                        <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-warning">Modifica</a>
                        <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Sei sicuro di voler eliminare questo progetto?')">Elimina</button>

                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
