<x-filament::page.simple>
    <div class="flex items-center justify-center gap-3 mb-4">
        <img
            src="{{ asset('assets/img/Logo-Desa-Ajakkang.png') }}"
            alt="Logo Desa Ajakkang"
            class="h-12 w-auto"
        >

        <h1 class="text-xl font-bold text-gray-900">
            Desa Ajakkang
        </h1>
    </div>

    {{ $this->form }}
</x-filament::page.simple>
