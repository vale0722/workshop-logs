<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between content-center text-center align-center items-center">
            {{ trans('posts.title') }}
            <a class="rounded px-3 py-2 bg-purple-500 hover:bg-purple-400 text-white" href="{{ route('admin.posts.index') }}">{{ trans('posts.titles.index') }}</a>
        </div>
    </x-slot>
    <form class="bg-white rounded-lg shadow-sm p-4 text-center flex flex-col gap-5" action="{{ route('admin.posts.store') }}" method="POST">
        @csrf
        <div class="flex w-full justify-between">
            <div class="flex content-center text-center items-center mr-10"><span class="text-2xl">Creación de publicaciones</span></div>
            <div class="w-full flex flex-col gap-5">
                <div class="mt-3 flex flex-col gap-2">
                    <label for="title">{{ trans('posts.fields.title') }}</label>
                    <input name="title" class="rounded border-gray-300 shadow-sm focus:border-purple-300 focus:ring focus:ring-purple-200 focus:ring-opacity-50" type="text" required>
                    @error('title') {{ $message }} @enderror
                </div>
                <div class="mt-3 flex flex-col gap-2">
                    <label for="content">{{ trans('posts.fields.content') }}</label>
                    <textarea name="content"  style="min-height: 200px" class="rounded border-gray-300 shadow-sm focus:border-purple-300 focus:ring focus:ring-purple-200 focus:ring-opacity-50" type="text" required></textarea>
                    @error('content') {{ $message }} @enderror
                </div>
                <div class="flex content-end justify-end">
                    <button type="submit" class="rounded px-3 py-2 bg-purple-500 hover:bg-purple-400 text-white">{{ trans('posts.titles.create')  }}</button>
                </div>
            </div>
        </div>

    </form>
</x-app-layout>
