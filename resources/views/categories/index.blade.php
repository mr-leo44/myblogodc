@extends('layouts.app')
@section('title')
    Liste des Catégories
@endsection
@section('content')
    @if (session('success'))
        <div role="alert"
            class="bg-green-500 text-white px-3 py-2 rounded-lg mb-4 flex justify-between transition duration-1000">
            <p>{{ session('success') }}</p>
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
    <div class="max-h-auto mx-auto max-w-8xl">
        <div class="relative sm:flex sm:justify-center sm:items-center selection:text-white">
            <div class="max-w-7xl mx-auto p-6 lg:p-8">
                <div class="flex justify-center font-semibold text-4xl">
                    <h1>Liste des Catégories</h1>
                </div>
            </div>
        </div>

        <div class="flex justify-end my-4">
            <a href="{{ route('categories.create') }}" class="bg-indigo-700 px-6 py-1 text-white rounded">Nouveau</a>
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
