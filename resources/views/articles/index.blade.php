@extends('layouts.app')
@section('title')
    Liste des Articles
@endsection
@section('content')
    @if (session('success'))
        <div role="alert" class="bg-green-500 text-white px-3 py-2 rounded-lg mb-4 flex justify-end transition duration-1000">
            {{ session('success') }}
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3 closealertbutton">
				<svg class="fill-current h-6 w-6 text-white" role="button" xmlns="http://www.w3.org/2000/svg"
					viewBox="0 0 20 20">
					<title>Close</title>
					<path
						d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
				</svg>
			</span>
        </div>
    @endif
    <div class="max-h-auto mx-auto container">
        <div class="relative sm:flex sm:justify-center sm:items-center selection:text-white">
            <div class="max-w-7xl mx-auto p-6 lg:p-8">
                <div class="flex justify-center font-semibold text-4xl">
                    <h1>Liste des Articles</h1>
                </div>
            </div>
        </div>

        <div class="overflow-x-auto">
            <div class="flex justify-end my-6">
                <a href="{{ route('articles.create') }}" class="bg-indigo-700 px-6 py-1 text-white rounded">Nouveau</a>
            </div>
            <table class="w-full">
                <thead class="bg-white border-b">
                    <tr>
                        <th scope="col" class="text-sm font-medium bg-indigo-100 text-indigo-900 px-6 py-4 text-left">N°
                        </th>
                        <th scope="col" class="text-sm font-medium bg-indigo-100 text-indigo-900 px-6 py-4 text-left">
                            Titre
                        </th>
                        <th scope="col" class="text-sm font-medium bg-indigo-100 text-indigo-900 px-6 py-4 text-left">Contenu
                        </th>
                        <th scope="col" class="text-sm font-medium bg-indigo-100 text-indigo-900 px-6 py-4 text-left">
                            Catégorie</th>
                        <th scope="col" class="text-sm font-medium bg-indigo-100 text-indigo-900 px-6 py-4 text-left">
                            Auteur</th>
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
                                {{ Str::limit($article->content, 20) }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-indigo-900">
                                {{ $article->category->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-indigo-900">
                                {{ $article->user->name }}</td>
                            <td
                                class="px-6 py-4 whitespace-nowrap text-sm font-medium text-indigo-900 first:mr-2 last:ml-2">
                                <a href="{{ route('articles.show', $article->id) }}"
                                    class="bg-blue-700 px-6 py-1 text-white rounded">Voir</a>
                                <a href="{{ route('articles.edit', $article->id) }}"
                                    class="bg-emerald-700 px-6 py-1 text-white rounded">Editer</a>
                                <form action="{{ route('articles.destroy', $article->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="bg-red-700 px-6 py-1 text-white rounded">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        <div>
    </div>
@endsection
@section('scripts')
<script>
    function destroy(event) {

        const href = event.target.getAttribute('href')
        const form = document.querySelector('#exempleModal form')
        form.setAttribute('action', href)
    }
</script>
@endsection
