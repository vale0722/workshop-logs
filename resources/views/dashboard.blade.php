<x-app-layout>
    <x-slot name="header">
        {{ trans('dashboard.title') }}
    </x-slot>
            <section class="bg-white p-6 rounded">
                <div class="max-w-2xl px-6 text-center mx-auto">
                    <h2 class="text-3xl font-semibold text-gray-800">Hola, <span class="bg-purple-600 text-white rounded px-1">Soy Valeria</span></h2>
                    <p class="text-gray-600 mt-4">En este workshop veremos como funciona el sistema de logs y como conectarnos con Sentry. Sentry proporciona un rastreador de errores de código abierto para supervisar y responder a errores y fallas en cualquier lugar de tu aplicación en tiempo real.</p>

                    <div class="flex items-end justify-center mt-16">
                        <x-icon-welcome_person></x-icon-welcome_person>
                    </div>
                </div>
            </section>
</x-app-layout>
