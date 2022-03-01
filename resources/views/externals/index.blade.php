<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between content-center text-center align-center items-center">
            MI API
        </div>
    </x-slot>
    <div class="relative min-h-screen flex flex-col items-center justify-center ">
            <div class="grid mt-8  gap-8 grid-cols-1 md:grid-cols-2 xl:grid-cols-2">
                @foreach($items as $item)
                    <div class="flex flex-col">
                        <div class="bg-white shadow-md  rounded-3xl p-4 h-full flex items-center">
                            <div class="flex items-center">
                                <div class="lg:h-48 w-48 lg:mb-0">
                                    <img src="{{ $item->getUrlImage() }}"
                                         alt="{{ $item->getName() }}" class="w-full object-scale-down lg:object-cover  h-full rounded-2xl">
                                </div>
                                <div class="flex-grow ml-3 justify-evenly py-2">
                                    <div class="flex flex-wrap">
                                        <h2 class="flex-auto text-lg font-medium">{{ $item->getName() }}</h2>
                                    </div>
                                    <p class="mt-3"></p>
                                    <div class="flex py-4  text-sm text-gray-500 max-w-sm">
                                        <div class="flex-1 inline-flex items-center ext-ellipsis overflow-hidden">
                                            <p class="">{{ $item->getDescription() }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
</x-app-layout>
