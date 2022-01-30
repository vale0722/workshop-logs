<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between content-center text-center align-center items-center">
            {{ trans('posts.title') }}
            <a class="rounded px-3 py-2 bg-purple-500 hover:bg-purple-400 text-white" href="{{ route('admin.posts.show', $post) }}">{{ trans('posts.titles.show') }}</a>
        </div>
    </x-slot>
    <form class="bg-white rounded-lg shadow-sm p-4 text-center flex flex-col gap-5" action="{{ route('admin.posts.update', $post) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="flex w-full justify-between">
            <div class="flex content-center text-center items-center mr-10"><span class="text-2xl">Editar publicación</span></div>
            <div class="w-full flex flex-col gap-5">
        <div class="mt-3 flex flex-col gap-2">
            <label for="title">{{ trans('posts.fields.title') }}</label>
            <input name="title" type="text" class="rounded border-gray-300 shadow-sm focus:border-purple-300 focus:ring focus:ring-purple-200 focus:ring-opacity-50" value="{{ $post->title }}" required>
            @error('title') {{ $message }} @enderror
        </div>
        <div class="mt-3 flex flex-col gap-2">
            <label for="content">{{ trans('posts.fields.content') }}</label>
            <textarea name="content" style="min-height: 200px" type="text" class="rounded border-gray-300 shadow-sm focus:border-purple-300 focus:ring focus:ring-purple-200 focus:ring-opacity-50" required>{{ $post->content }}</textarea>
            @error('content') {{ $message }} @enderror
        </div>
        <div class="flex content-end justify-end">
            <button type="submit" class="rounded px-3 py-2 bg-purple-500 hover:bg-purple-400 text-white">{{ trans('posts.titles.edit') }}</button>
        </div>
            </div>
        </div>
    </form>
</x-app-layout>
