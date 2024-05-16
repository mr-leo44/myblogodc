@extends('layouts.app')
@section('title')
    Enregistrer une catégorie
@endsection
@section('content')

    <div class="max-h-auto mx-auto max-w-xl">
        <div class="relative sm:flex sm:justify-center sm:items-center selection:text-white">
            <div class="max-w-7xl mx-auto p-6 lg:p-8">
                <div class="max-w-7xl mx-auto p-6 lg:p-8">
                    <div class="flex justify-center font-semibold text-4xl">
                        <h1>Enregistrer une Catégorie</h1>
                    </div>
                </div>
            </div>
        </div>
        @if ($errors->any())
            <div class="bg-red-500 text-white px-3 py-2 rounded-lg mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form class="w-full" action="{{ route('categories.store') }}" method="POST">
            @csrf
            <div class="mb-10 space-y-3">
                <div class="space-y-1">
                    <div class="space-y-2">
                        <label
                            class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                            for="name">Nom</label>
                        <input
                            class="border-input bg-background ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-10 w-full rounded-md border px-3 py-2 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                            id="name" placeholder="Nom de la catégorie" name="name" />
                    </div>
                    <div class="space-y-2">
                        <label
                            class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                            for="description">Description</label>
                        <textarea
                            class="border-input bg-background ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-10 w-full rounded-md border px-3 py-2 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                            id="description" placeholder="Une description" name="description"></textarea>
                    </div>
                </div>
                <button
                    class="flex h-10 w-full items-center justify-center whitespace-nowrap rounded-md bg-indigo-500 px-4 py-2 text-sm font-medium text-white transition-colors hover:bg-indigo/90 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50"
                    type="submit">Valider</button>
            </div>
        </form>
    </div>
@endsection
