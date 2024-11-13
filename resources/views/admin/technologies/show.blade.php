@extends('layouts.app')

@section('content')
    <h1>{{ $technology->name }}</h1>
    <a href="{{ route('admin.technologies.index') }}" class="btn btn-primary">Torna alla lista</a>
@endsection
