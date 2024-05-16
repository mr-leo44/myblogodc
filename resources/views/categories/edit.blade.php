@extends('layouts.app')
@section('title')
    Modifier une catégorie
@endsection
@section('content')

<div class="max-h-auto mx-auto max-w-xl">
    <div
        class="relative sm:flex sm:justify-center sm:items-center selection:text-white">
        <div class="max-w-7xl mx-auto p-6 lg:p-8">
            <div class="flex justify-center font-semibold text-4xl">
                <h1>Modifier {{ $category->name }}</h1>
            </div>
        </div>
    </div>
    <form class="w-full" action="{{ route('categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-10 space-y-3">
            <div class="space-y-1">
                <div class="space-y-2">
                    <label
                        class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                        for="name">Nom</label>
                    <input
                        class="border-input bg-background ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-10 w-full rounded-md border px-3 py-2 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                        id="name" placeholder="Nom de la catégorie" name="name" value="{{ $category->name }}" />
                </div>
                <div class="space-y-2">
                    <label
                        class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                        for="description">Description</label>
                    <input
                        class="border-input bg-background ring-offset-background placeholder:text-muted-foreground focus-visible:ring-ring flex h-10 w-full rounded-md border px-3 py-2 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                        id="description" placeholder="Une description" name="description" value="{{ $category->description }}" />
                </div>
            </div>
            <button
                class="flex h-10 w-full items-center justify-center whitespace-nowrap rounded-md bg-blue-500 px-4 py-2 text-sm font-medium text-white transition-colors hover:bg-blue/90 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50"
                type="submit">Valider</button>
        </div>
    </form>
</div>
@endsection
