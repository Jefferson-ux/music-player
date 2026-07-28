@extends('layout.main')

@section('title', 'Tracklist')

@section('content')
<div class="px-16 py-10 bg-amber-100 w-full">
    <ul></ul>
    @forelse ( $songs as $song )
    <li class="list-none">
        <a href="{{ route('song.show',$song->id) }}">{{ $song->title }}</a>
    </li>

    @empty

    Empty

    @endforelse

</div>
@endsection