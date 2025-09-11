<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @stack('heads')

    <title>@yield('title') | Key Of Kie</title>
</head>
<body>
    {{-- starter --}}
    {{-- <div class="hidden bg-sky-50 bg-sky-500 bg-blue-400 bg-blue-200 text-blue-600 bg-amber-200 text-amber-600 bg-sky-200 text-sky-600 bg-emerald-200 text-emerald-600 bg-amber-50 bg-amber-500 bg-blue-50 hover:bg-blue-500/5 hover:bg-red-500/5 hover:bg-rose-500/5 hover:bg-neutral-500/5 stroke-blue-50 stroke-emerald-50 stroke-red-50 stroke-orange-50 stroke-sky-50 stroke-white stroke-black stroke-neutral-50 stroke-neutral-500 stroke-neutral-400 stroke-neutral-300 stroke-red-500 stroke-blue-500 *:stroke-blue-500 stroke-sky-500 stroke-slate-500 stroke-slate-800 stroke-orange-500 stroke-rose-50 stroke-rose-500 stroke-emerald-500 stroke-indigo-50 stroke-indigo-500 stroke-amber-50 stroke-amber-500 stroke-slate-400 fill-slate-400 fill-amber-50 fill-amber-500 fill-blue-50 fill-emerald-50 fill-red-50 fill-orange-50 fill-sky-50 fill-white fill-black fill-neutral-50 fill-neutral-500 fill-neutral-400 fill-red-500 fill-blue-500 fill-sky-500 fill-slate-500 bg-slate-400 peer-checked:bg-amber-500 peer-checked:bg-sky-500 fill-slate-800 fill-orange-500 fill-indigo-50 fill-indigo-500 fill-emerald-500 fill-rose-50 fill-rose-500"></div> --}}
    <section class="bg-slate-200 p-2 w-screen h-screen relative">
        <aside class="flex flex-col gap-2 w-64 h-full peer">
            <nav class="w-full flex flex-col py-3 gap-3">
                <div class="w-full flex items-center justify-between gap-3 cursor-pointer group" onclick="toggleUserMenu()">
                    <div class="flex gap-2">
                        <div class="flex items-center justify-center w-10 h-10 rounded-full overflow-hidden">
                            <img class="w-full h-full object-cover"
                                src="https://ui-avatars.com/api/?name=Rizki+M+Nur&background=FF0066&color=FFF"
                                alt="User Profile Image">
                        </div>
                        <div class="flex flex-col text-slate-800">
                            <h3 class="text-sm font-medium">Rizki M Nur</h3>
                            <h4 class="text-xs opacity-60">rmn@mail.com</h4>
                        </div>
                    </div>
                    <span id="user-menu-toggle" class="cursor-pointer opacity-50 group-hover:opacity-100">
                        <x-icons type="caret-down" width="20" height="20" color="slate-800" />
                    </span>
                </div>
                <menu id="user-menu" class="p-3 hidden">
                    <li class="text-sm opacity-50 hover:opacity-100">
                        <x-logout action="" icon="log-out-2" label="Logout" />
                    </li>
                </menu>
            </nav>
            <nav class="grid grid-cols-1 px-1 divide-y-2 divide-white/50">
                <menu class="flex flex-col gap-2 py-4">
                    <x-dashboard.menu-navigator icon="dashboard" label="Dashboard"
                        href="/dashboard"
                        :isActive="request()->is('dashboard')" />
                    <x-dashboard.menu-navigator icon="map" label="Manajemen Tempat Wisata"
                        href="{{route('dashboard.locations.index')}}"
                        :isActive="request()->is('dashboard/locations') || request()->is('dashboard/locations/*')" />
                    <x-dashboard.menu-navigator-group icon="chartline-up" label="Analisis & Statistik"
                    :isActive="false" >
                        <x-dashboard.menu-navigator-item href="#" label="Trend Tempat Wisata"
                        :isActive="false"/>
                        <x-dashboard.menu-navigator-item href="#" label="Analisa Sentimen"
                        :isActive="false"/>
                    </x-dashboard.menu-navigator-group>
                </menu>
                <menu class="flex flex-col gap-2 py-4">
                    <x-dashboard.menu-navigator icon="user" label="Manajemen Pengguna"
                        href="#"
                        :isActive="request()->is('dashboard/users') || request()->is('dashboard/users/*')" />
                </menu>
            </nav>
        </aside>

        <main class="bg-slate-100 rounded-3xl absolute top-2 bottom-2 right-2 left-14 peer-hover:left-68 transition-all duration-300 p-6">
            @yield('main')
        </main>
    </section>

<script>
    function toggleUserMenu() {
        document.getElementById('user-menu').classList.toggle('hidden');
        document.getElementById('user-menu-toggle').classList.toggle('rotate-180');
    }

    const menuNavigatorGroups = document.querySelectorAll('.menu-navigator-group');
    menuNavigatorGroups.forEach(menuNavGroup => {
        menuNavGroup.onclick = function (event) {
            menuNavGroup.querySelector('.menu-navigator-item').classList.toggle('hidden');
            menuNavGroup.querySelector('.dropdown-btn svg').classList.toggle('rotate-180');
        }
    });
</script>

@stack('scripts')
</body>
</html>
