<x-admin-layout>
    <div class="container p-8">

        <div class="max-w-lg bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <div class="container p-4">
                <div class="row">
                    <div class="col">


                        <a href="{{ url('/admin/galleries') }}"
                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><span
                                data-feather="arrow-left"></span>
                            Back to
                            my Posts</a>
                        <a href="{{ url('/admin/galleries') }}/{{ $gallery->slug }}/edit"
                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-yellow-500 rounded-lg hover:bg-yellow-700 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><span
                                data-feather="edit"></span>
                            Edit My Post</a>



                    </div>
                </div>
            </div>
            @if ($gallery->image)
                <img src="{{ Storage::url('' . $gallery->image) }}" alt="{{ $gallery->category->name }}" class="w-48">
            @else
                <img src="https://source.unsplash.com/1200x400?{{ $gallery->category->name }}"
                    alt="{{ $gallery->category->name }}" class="img-fluid mt-3">
            @endif
            <div class="p-5">
                <a href="#">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                        {{ $gallery->title }}
                    </h5>
                </a>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $gallery->body2 }}</p>
                <form action="{{ url('/admin/galleries') }}/{{ $gallery->slug }}" method="post"
                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 d-inline">
                    @method('delete')
                    @csrf
                    <button class="grid btn btn-danger" onclick="return confirm('ingin menghapus data ini ?')"><span
                            data-feather="x-circle"></span>
                        <p class="text-xs">Delete</p> <svg class="mx-auto w-8" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5m6 4.125l2.25 2.25m0 0l2.25 2.25M12 13.875l2.25-2.25M12 13.875l-2.25 2.25M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
                        </svg>
                    </button>
                </form>
            </div>
        </div>

    </div>

</x-admin-layout>
