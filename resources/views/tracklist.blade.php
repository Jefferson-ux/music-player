@extends('layout.main')

@section('title', 'Tracklist')

@section('content')
<div class="px-4 sm:px-8 lg:px-16 py-8 sm:py-10 w-full">
    <ul class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
        @forelse ($songs as $song)
        @component('components.tracklist_card')
        @slot('id', $song->id)
        @slot('title', $song->title)
        @slot('genre', $song->genre)
        @slot('album', $song->album)
        @slot('artist', $song->artist)
        @slot('cover', $song->cover)
        @endcomponent
        @empty
        <li class="list-none col-span-full text-center text-[#62798A] py-10">
            No hay canciones todavía.
        </li>
        @endforelse
    </ul>
</div>
@endsection