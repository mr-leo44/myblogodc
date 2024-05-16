@extends('layouts.app')
@section('title')
    Liste des Catégorie
@endsection
@section('content')
    @if (session('success'))
        <div role="alert"
            class="bg-green-500 text-white px-3 py-2 rounded-lg mb-4 flex justify-end transition duration-1000">
            {{ session('success') }}
        </div>
    @endif
    <div class="max-h-auto mx-auto max-w-8xl">
        <div class="relative sm:flex sm:justify-center sm:items-center selection:text-white">
            <div class="max-w-7xl mx-auto p-6 lg:p-8">
                <div class="flex justify-center font-semibold text-4xl">
                    <h1>Liste des Catégories</h1>
                </div>
            </div>
        </div>

        <div class="flex justify-end my-4">
            <a href="{{ route('categories.create') }}" class="bg-blue-700 px-6 py-1 text-white rounded">Nouveau</a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-white border-b">
                    <tr>
                        <th scope="col" class="text-sm font-medium bg-indigo-100 text-indigo-900 px-6 py-4 text-left">N°
                        </th>
                        <th scope="col" class="text-sm font-medium bg-indigo-100 text-indigo-900 px-6 py-4 text-left">Nom
                        </th>
                        <th scope="col" class="text-sm font-medium bg-indigo-100 text-indigo-900 px-6 py-4 text-left">
                            Description</th>
                        <th scope="col" class="text-sm font-medium bg-indigo-100 text-indigo-900 px-6 py-4 text-left">
                            Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $key => $category)
                        <tr class="bg-gray-100 border-b">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-indigo-900">{{ $key + 1 }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-indigo-900">
                                {{ $category->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-indigo-900">
                                {{ $category->description }}</td>
                            <td
                                class="px-6 py-4 whitespace-nowrap text-sm font-medium text-indigo-900 first:mr-2 last:ml-2">
                                <a href="{{ route('categories.show', $category->id) }}"
                                    class="bg-emerald-700 px-6 py-1 text-white rounded">Voir</a>
                                <a href="{{ route('categories.edit', $category->id) }}"
                                    class="bg-blue-700 px-6 py-1 text-white rounded mx-1">Editer</a>
                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="bg-red-700 px-6 py-1 text-white rounded">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
