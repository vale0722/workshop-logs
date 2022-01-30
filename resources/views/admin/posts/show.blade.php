<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between content-center text-center align-center items-center">
            {{ trans('posts.title') }}
            <a class="rounded px-3 py-2 bg-purple-500 hover:bg-purple-400 text-white" href="{{ route('admin.posts.index') }}">{{ trans('posts.titles.index') }}</a>
        </div>
    </x-slot>
            <div class="bg-white w-full rounded-2xl px-10 py-8 shadow-lg hover:shadow-2xl transition duration-500">
                <div class="w-14 h-14 bg-gray-500 rounded-full flex items-center justify-center font-bold text-white">
                    <img class="w-12 h-12 rounded-full" src="{{ $post->user->photo_url }}" alt="" />
                </div>
                <div class="mt-4">
                    <h1 class="text-2xl text-gray-700 font-semibold cursor-pointer">{{ $post->title }}</h1>
                    <p class="mt-4 text-md text-gray-600">{{ $post->content }}</p>
                    <div class="flex justify-end items-center">
                        <div class="mt-4 jsutify-between flex items-center space-x-4 py-6 gap-5">
                            <div class="text-sm font-semibold">{{ $post->user->name }} • <span class="font-normal ml-5">{{ $post->created_at }}</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>
