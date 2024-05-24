@extends('layouts.app')
@section('title')
    {{ $category->name }}
@endsection
@section('content')
    <div class="flex justify-between my-5">
        <div>
            <h1 class="font-semibold text-4xl">Catégorie {{ $category->name }}</h1>
            <p>{{ $category->description }}</p>
        </div>
        <div>
            <a href="{{ route('categories.edit', $category->id) }}" class="bg-blue-700 px-6 py-2 text-white rounded">Editer la catégorie</a>
            <a href="{{ route('articles.create', $category->id) }}" class="bg-indigo-700 px-6 py-2 text-white rounded">Ajouter article</a>
        </div>
    </div>
    <div class="my-6 overflow-x-auto">
        <table class="w-full">
            <thead class="bg-white border-b">
                <tr>
                    <th scope="col" class="text-sm font-medium bg-indigo-100 text-indigo-900 px-6 py-4 text-left">N°
                    </th>
                    <th scope="col" class="text-sm font-medium bg-indigo-100 text-indigo-900 px-6 py-4 text-left">Titre
                    </th>
                    <th scope="col" class="text-sm font-medium bg-indigo-100 text-indigo-900 px-6 py-4 text-left">
                        Contenu</th>
                    <th scope="col" class="text-sm font-medium bg-indigo-100 text-indigo-900 px-6 py-4 text-left">
                        Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($articles as $key => $article)
                    <tr class="bg-gray-100 border-b">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-indigo-900">{{ $key + 1 }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-indigo-900">
                            {{ $article->title }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-indigo-900">
                            {{ Str::limit($article->content, 30) }}</td>
                        <td
                            class="px-6 py-4 whitespace-nowrap text-sm font-medium text-indigo-900 first:mr-2 last:ml-2">
                            <a href="{{ route('articles.show', $category->id) }}"
                                class="bg-emerald-700 px-6 py-1 text-white rounded">Voir</a>
                            <a href="{{ route('articles.edit', $category->id) }}"
                                class="bg-blue-700 px-6 py-1 text-white rounded mx-1">Editer</a>
                            <form action="{{ route('articles.destroy', $category->id) }}" method="POST" class="inline">
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
@endsection
