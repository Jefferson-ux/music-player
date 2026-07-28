@extends('layout.play_layout')

@section('title',$song->title)

@section('content')
<div class="min-h-screen bg-[#F7FAF7] flex items-center justify-center p-6">
    <div class="w-full max-w-3xl bg-white border border-[#E4ECF1] rounded-xl p-6
                flex flex-col md:flex-row items-center md:items-start gap-6">

        <img src="{{ asset($song->cover) }}"
            class="w-48 md:w-56 rounded-lg border border-[#E4ECF1] flex-shrink-0"
            alt="Portada">

        <div class="flex flex-col items-center md:items-start text-center md:text-left gap-2 flex-1">
            <h1 class="text-xl font-medium text-[#14202B]">{{ $song->title }}</h1>
            <div class="text-sm text-[#62798A]">
                <strong>{{ $song->artist }}</strong> · <i>{{ $song->album }}</i>
            </div>
            <x-audio-player :song="$song" />
        </div>
    </div>
</div>
@endsection