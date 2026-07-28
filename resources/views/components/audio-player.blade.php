@props(['song'])

<div x-data
    class="w-full flex flex-col gap-2"
    data-player>

    <audio class="hidden" preload="metadata"
        src="{{ asset($song->path_file) }}"
        data-audio></audio>

    <div class="flex items-center gap-3">
        <button type="button" data-play-btn
            class="w-9 h-9 rounded-full bg-[#3FA9D6] text-white flex items-center justify-center flex-shrink-0"
            aria-label="Reproducir">
            <svg data-icon-play width="14" height="14" viewBox="0 0 24 24" fill="currentColor">
                <path d="M8 5v14l11-7z" />
            </svg>
            <svg data-icon-pause width="14" height="14" viewBox="0 0 24 24" fill="currentColor" class="hidden">
                <path d="M6 4h4v16H6zM14 4h4v16h-4z" />
            </svg>
        </button>

        <span class="text-xs font-mono text-[#9BAEBB] w-9" data-current-time>0:00</span>

        <input type="range" min="0" max="100" value="0" step="0.1"
            data-seek
            class="flex-1 accent-[#3FA9D6]">

        <span class="text-xs font-mono text-[#9BAEBB] w-9 text-right" data-duration>0:00</span>
    </div>
</div>

@once
<script>
    function formatTime(s) {
        if (!isFinite(s)) return '0:00';
        const m = Math.floor(s / 60);
        const sec = Math.floor(s % 60).toString().padStart(2, '0');
        return `${m}:${sec}`;
    }

    document.querySelectorAll('[data-player]').forEach(player => {
        const audio = player.querySelector('[data-audio]');
        const btn = player.querySelector('[data-play-btn]');
        const iconPlay = player.querySelector('[data-icon-play]');
        const iconPause = player.querySelector('[data-icon-pause]');
        const seek = player.querySelector('[data-seek]');
        const current = player.querySelector('[data-current-time]');
        const total = player.querySelector('[data-duration]');
        let isSeeking = false;

        btn.addEventListener('click', () => {
            audio.paused ? audio.play() : audio.pause();
        });

        audio.addEventListener('play', () => {
            iconPlay.classList.add('hidden');
            iconPause.classList.remove('hidden');
        });
        audio.addEventListener('pause', () => {
            iconPlay.classList.remove('hidden');
            iconPause.classList.add('hidden');
        });

        audio.addEventListener('loadedmetadata', () => {
            seek.max = audio.duration;
            total.textContent = formatTime(audio.duration);
        });

        audio.addEventListener('timeupdate', () => {
            if (isSeeking) return;
            seek.value = audio.currentTime;
            current.textContent = formatTime(audio.currentTime);
        });

        seek.addEventListener('input', () => {
            isSeeking = true;
            current.textContent = formatTime(seek.value);
        });

        seek.addEventListener('change', () => {
            audio.currentTime = seek.value;
            isSeeking = false;
        });
    });
</script>
@endonce