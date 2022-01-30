<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between content-center text-center align-center items-center">
            {{ trans('posts.title') }}
            <a class="rounded px-3 py-2 bg-purple-500 hover:bg-purple-400 text-white" href="{{ route('admin.posts.create') }}">{{ trans('posts.titles.create') }}</a>
        </div>
    </x-slot>
        @if(count($posts))
            <table class="table space-x-0 text-sm border-separate space-y-6 text-sm w-full">
                    <thead class="text-white bg-gray-500">
                    <tr>
                        <th class="p-3">{{ trans('posts.fields.title') }}</th>
                        <th class="p-3">{{ trans('posts.fields.content') }}</th>
                        <th class="p-3">{{ trans('posts.fields.created_at') }}</th>
                        <th class="p-3">{{ trans('posts.fields.updated_at') }}</th>
                        <th class="p-3"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                        <tr class="bg-gray-200 hover:bg-gray-300 my-3 rounded">
                            <td class="p-3">{{ $post->title }}</td>
                            <td class="p-3">{{ $post->content }}</td>
                            <td class="p-3">{{ $post->created_at }}</td>
                            <td class="p-3">{{ $post->updated_at }}</td>
                            <td class="p-3">
                                <div class="flex text-end justify-end px-3">
                                    <a href="{{ route('admin.posts.show', $post) }}" class="text-gray-400 hover:text-gray-800 mr-2">
                                        <em class="far fa-eye text-base"></em>
                                    </a>
                                    <a href="{{ route('admin.posts.edit', $post) }}" class="text-gray-400 hover:text-gray-800 mx-2">
                                        <em class="fas fa-pencil text-base"></em>
                                    </a>
                                    <form action="{{ route('admin.posts.destroy', $post) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="text-gray-400 hover:text-gray-800 ml-2">
                                            <em class="fas fa-trash text-base"></em>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
        @else
        <div class="bg-white rounded-lg shadow-sm text-center flex flex-col gap-5 m-6">
            <div class="flex justify-center content-center items-center gap-5">
                <x-icon-not-found class="w-64 h-64" />
                <span class="text-2xl">{{ trans('posts.titles.not_found') }}</span>
            </div>
        </div>
        @endif

</x-app-layout>
