<li class="list-none">
    <a href="{{ route('song.show', $id) }}"
        class="flex flex-row sm:flex-col items-center sm:items-stretch gap-4 sm:gap-0
              bg-white border border-[#E4ECF1] rounded-2xl overflow-hidden
              p-4 sm:p-0 hover:border-[#3FA9D6] transition-colors group">

        <img src="{{ asset($cover) }}" alt="Portada de {{ $title }}"
            class="w-20 h-20 sm:w-full sm:h-44 rounded-xl sm:rounded-none
                    border border-[#E4ECF1] sm:border-0 object-cover flex-shrink-0">

        <div class="min-w-0 flex-1 sm:p-4">
            <p class="text-lg sm:text-xl font-medium text-[#14202B] truncate group-hover:text-[#3FA9D6]">
                {{ $title }}
            </p>
            <p class="text-sm sm:text-base text-[#62798A] truncate mt-1">
                {{ $artist }}
                @if($album) &middot; <i>{{ $album }}</i> @endif
            </p>

            @if(isset($genre) && $genre)
            <span class="inline-block mt-2 text-xs sm:text-sm text-[#3FA9D6] bg-[#EAF6FC] border border-[#CDE9F5] rounded-full px-2.5 py-1">
                {{ $genre }}
            </span>
            @endif
        </div>
    </a>
</li>