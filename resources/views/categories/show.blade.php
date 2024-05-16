@extends('layouts.app')
@section('title')
    {{ $categorie->name }}
@endsection
@section('content')
    <div class="max-h-auto max-w-7xl">
        <div class="relative sm:flex sm:justify-start sm:items-start selection:text-white">
            <div class="max-w-7xl p-6 lg:p-8">
                <div class="max-w-7xl p-6 lg:p-8">
                    <div class="font-semibold text-4xl my-5">
                        <h1>Catégorie {{ $categorie->name }}</h1>
                    </div>

                    <p>{{ $categorie->description }}</p>
                    <div class="first:mr-2 last:ml-4 my-6">
                        <a href="{{ route('categories.edit', $categorie->id) }}"
                            class="bg-emerald-700 px-6 py-1 text-white rounded">Editer</a>
                        <a data-bs-toggle="modal" data-bs-target="#exampleModal" href="{{ route('categories.destroy', $categorie->id) }}"
                            class="bg-red-700 px-6 py-1 text-white rounded">Supprimer</a>
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
