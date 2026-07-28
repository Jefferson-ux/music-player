<!-- CAPA OSCURA DE FONDO (Overlay) -->
<div id="sidebar-overlay" onclick="toggleMenu()"
    class="fixed inset-0 bg-black/50 z-40 hidden transition-opacity sm:hidden"></div>

<!-- PANEL LATERAL (Sidebar) -->
<aside id="sidebar-menu"
    class="fixed top-0 left-0 h-screen w-64 bg-[#1D3B57] text-[#CBDCE9] z-50
           transform -translate-x-full transition-transform duration-300 ease-in-out
           sm:translate-x-0 sm:static sm:z-auto">

    <div class="p-5 flex flex-col h-full justify-between">
        <div>
            <div class="flex items-center gap-2 mb-8 px-1">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none">
                    <path d="M12 2C7 6 5 10 5 14a7 7 0 0 0 14 0c0-4-2-8-7-12Z" fill="#3FA9D6" />
                    <path d="M12 22V9" stroke="#1D3B57" stroke-width="1.4" stroke-linecap="round" />
                </svg>
                <h2 class="text-lg font-semibold tracking-wide text-white">MiPlayer</h2>
            </div>

            <ul class="flex flex-col gap-1">
                @php
                $links = [
                ['label' => 'Favoritos', 'icon' => 'M12 21s-6.7-4.3-9.3-8.5C1 9.5 2 6 5.4 5c2-.6 3.8.3 4.6 1.8C10.8 5.3 12.6 4.4 14.6 5c3.4 1 4.4 4.5 2.7 7.5C14.7 16.7 12 21 12 21Z'],
                ['label' => 'Canciones', 'icon' => 'M9 18V5l12-2v13M9 18a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm12-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z'],
                ['label' => 'Listas de reproducción', 'icon' => 'M4 6h16M4 12h10M4 18h10M18 15l3 3-3 3'],
                ['label' => 'Artistas', 'icon' => 'M17 20a5 5 0 0 0-10 0M12 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8Z'],
                ['label' => 'Álbums', 'icon' => 'M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18Zm0-5a4 4 0 1 0 0-8 4 4 0 0 0 0 8Z'],
                ];
                @endphp

                @foreach ($links as $link)
                <li>
                    <a href="#"
                        class="flex items-center gap-3 px-4 py-3 rounded-lg font-medium transition
                                  text-[#B9D6C4] hover:bg-white/10 hover:text-white
                                  {{ $loop->first ? 'bg-white/10 text-white' : '' }}">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" class="flex-shrink-0">
                            <path d="{{ $link['icon'] }}" />
                        </svg>
                        <span class="truncate">{{ $link['label'] }}</span>
                    </a>
                </li>
                @endforeach
            </ul>
        </div>

        <div class="flex items-center gap-3 border-t border-white/10 pt-4">
            <div class="w-8 h-8 rounded-full bg-[#3FA9D6]/20 border border-[#3FA9D6]/40 flex items-center justify-center text-xs font-medium text-[#3FA9D6] flex-shrink-0">
                JP
            </div>
            <div class="min-w-0">
                <p class="text-sm text-white truncate">Tu cuenta</p>
                <p class="text-xs text-[#7FA893]">MiPlayer v1.0</p>
            </div>
        </div>
    </div>

    <!-- BOTÓN FLOTANTE -->
    <button onclick="toggleMenu()" id="menu-toggle-btn"
        aria-label="Abrir menú" aria-expanded="false" aria-controls="sidebar-menu"
        class="sm:hidden absolute top-4 left-full bg-[#1D3B57] text-white p-3 rounded-r-xl
               border-y border-r border-white/10 shadow-xl focus:outline-none focus:ring-2 focus:ring-[#3FA9D6]">
        <span id="btn-icon" class="block text-xl leading-none">≡</span>
    </button>
</aside>

<script>
    function toggleMenu() {
        const sidebar = document.getElementById('sidebar-menu');
        const overlay = document.getElementById('sidebar-overlay');
        const icon = document.getElementById('btn-icon');
        const btn = document.getElementById('menu-toggle-btn');

        const isClosing = !sidebar.classList.contains('-translate-x-full');

        sidebar.classList.toggle('-translate-x-full');
        overlay.classList.toggle('hidden');
        document.body.classList.toggle('overflow-hidden', !isClosing ? false : true);

        if (sidebar.classList.contains('-translate-x-full')) {
            icon.innerText = '≡';
            btn.setAttribute('aria-expanded', 'false');
            btn.setAttribute('aria-label', 'Abrir menú');
        } else {
            icon.innerText = '✕';
            btn.setAttribute('aria-expanded', 'true');
            btn.setAttribute('aria-label', 'Cerrar menú');
        }
    }

    document.addEventListener('keydown', (e) => {
        const sidebar = document.getElementById('sidebar-menu');
        if (e.key === 'Escape' && !sidebar.classList.contains('-translate-x-full')) {
            toggleMenu();
        }
    });
</script>