@extends('layouts.app')
@section('title')
    {{ $article->title }}
@endsection
@section('content')
    <div class="my-5">
        <div class="flex justify-between">
            <h1 class="font-semibold text-4xl">Catégorie {{ $article->title }}</h1>
            <a href="{{ route('articles.index') }}" class="bg-blue-700 p-2 text-white rounded">
                <svg fill="#fff" version="1.1" id="Layer_1" class="h-6 w-6"
                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                    viewBox="0 0 490.693 490.693" xml:space="preserve">
                    <g>
                        <g>
                            <path d="M351.173,149.227H36.4L124.827,60.8c4.053-4.267,3.947-10.987-0.213-15.04c-4.16-3.947-10.667-3.947-14.827,0
       L3.12,152.427c-4.16,4.16-4.16,10.88,0,15.04l106.667,106.667c4.267,4.053,10.987,3.947,15.04-0.213
       c3.947-4.16,3.947-10.667,0-14.827L36.4,170.56h314.773c65.173,0,118.187,57.387,118.187,128s-53.013,128-118.187,128h-94.827
       c-5.333,0-10.133,3.84-10.88,9.067c-0.96,6.613,4.16,12.267,10.56,12.267h95.147c76.907,0,139.52-66.987,139.52-149.333
       S428.08,149.227,351.173,149.227z" />
                        </g>
                    </g>
                </svg>
            </a>
        </div>
        <p class="my-8 text-justify">{{ $article->content }}</p>
        <div class="my-8">
            <a href="{{ route('articles.edit', $article->id) }}"
                class="bg-blue-700 px-6 py-2 text-white rounded">Editer</a>
                <form action="{{ route('articles.destroy', $article->id) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button class="bg-red-700 px-6 py-2 text-white rounded">Supprimer</button>
                </form>
        </div>
    </div>
@endsection
