@extends('layouts.app')
@section('title')
    {{ $category->name }}
@endsection
@section('content')
    <div class="font-semibold text-4xl my-5">
        <h1>Catégorie {{ $category->name }}</h1>
    </div>
    <p>{{ $category->description }}</p>
    <div class="my-6">
        <a href="{{ route('categories.edit', $category->id) }}" class="bg-blue-700 px-6 py-1 text-white rounded">Editer</a>
        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="inline">
            @csrf
            @method('DELETE')
            <button class="bg-red-700 px-6 py-1 text-white rounded">Supprimer</button>
        </form>
    </div>
@endsection
