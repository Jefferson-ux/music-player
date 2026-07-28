@extends('layout.play_layout')

@section('title',$song->title)

@section('content')
<div class="flex flex-col items-center justify-center gap-3 bg-white border border-[#E4ECF1] rounded-xl p-6 max-w-sm mx-auto">
    <img src="{{ asset($song->cover) }}" width="200" class="rounded-lg border border-[#E4ECF1]" alt="Portada">
    <h1 class="text-xl font-medium text-[#14202B]">{{ $song->title }}</h1>
    <div class="text-sm text-[#62798A]">
        <strong>{{ $song->artist }}</strong> · <i>{{ $song->album }}</i>
    </div>
    <audio controls src="{{ asset($song->path_file) }}" class="w-full accent-[#3FA9D6]"></audio>
</div>
@endsection