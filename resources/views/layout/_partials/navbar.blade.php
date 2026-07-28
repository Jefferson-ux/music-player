<!-- CAPA OSCURA DE FONDO (Overlay)
     Aparece detrás del menú para oscurecer la pantalla. Si el usuario hace clic aquí, el menú se cierra. -->
<div id="sidebar-overlay" onclick="toggleMenu()" class="fixed inset-0 bg-black/60 z-40 hidden transition-opacity"></div>

<!-- PANEL LATERAL (Sidebar)
     - translate-x-[-100%]: Lo esconde completamente a la izquierda.
     - transition-transform duration-300: Hace que la animación al abrir/cerrar sea súper suave.
-->
<aside id="sidebar-menu"
    class="fixed top-0 left-0 h-screen w-64 bg-slate-900 border-r border-slate-800 text-white z-50 transform -translate-x-full transition-transform duration-300 ease-in-out sm:translate-x-0">

    <div class="p-5 flex flex-col h-full justify-between relative">
        <div>
            <!-- Título del menú -->
            <div class="flex items-center justify-between mb-8">
                <h2 class="text-xl font-bold tracking-wide">🎵 MiPlayer</h2>
            </div>

            <!-- Enlaces del menú -->
            <ul class="flex flex-col gap-2">
                <li><a href="#"
                        class="block px-4 py-3 rounded-lg hover:bg-slate-800 text-slate-300 hover:text-white font-medium transition">Favoritos</a>
                </li>
                <li><a href="#"
                        class="block px-4 py-3 rounded-lg hover:bg-slate-800 text-slate-300 hover:text-white font-medium transition">Canciones</a>
                </li>
                <li><a href="#"
                        class="block px-4 py-3 rounded-lg hover:bg-slate-800 text-slate-300 hover:text-white font-medium transition">Listas
                        de Reproducción</a></li>
                <li><a href="#"
                        class="block px-4 py-3 rounded-lg hover:bg-slate-800 text-slate-300 hover:text-white font-medium transition">Artistas</a>
                </li>
                <li><a href="#"
                        class="block px-4 py-3 rounded-lg hover:bg-slate-800 text-slate-300 hover:text-white font-medium transition">Álbums</a>
                </li>
            </ul>
        </div>

        <!-- Footer del sidebar (opcional) -->
        <div class="text-xs text-slate-500 border-t border-slate-800 pt-4">
            MiPlayer v1.0
        </div>
    </div>

    <!-- BOTÓN PEGADO AL LATERAL DEL PANEL (Flotante)
         - absolute top-4 left-full: Se pega exactamente en el borde derecho del panel afuera de este.
    -->
    <button onclick="toggleMenu()"
        class="sm:hidden absolute top-4 left-full bg-slate-900 text-white p-3 rounded-r-xl border-y border-r border-slate-800 shadow-xl focus:outline-none">
        <span id="btn-icon" class="block text-xl leading-none">≡</span>
    </button>
</aside>

<script>
    function toggleMenu() {
        const sidebar = document.getElementById('sidebar-menu');
        const overlay = document.getElementById('sidebar-overlay');
        const icon = document.getElementById('btn-icon');

        // Mueve el sidebar hacia adentro/afuera (animado con CSS)
        sidebar.classList.toggle('-translate-x-full');

        // Muestra u oculta la capa oscura del fondo
        overlay.classList.toggle('hidden');

        // Cambia el icono de hamburguesa (≡) a una X cuando está abierto
        if (sidebar.classList.contains('-translate-x-full')) {
            icon.innerText = '≡';
        } else {
            icon.innerText = '✕';
        }
    }
</script>