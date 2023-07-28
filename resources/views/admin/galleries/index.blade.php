<x-admin-layout>



    <body style="background: lightgray">
        <div class=" overflow-x-auto shadow-lg sm:rounded-lg w-full p-4">
            @if (session()->has('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <nav class="bg-white border-gray-200 dark:bg-gray-900p-4 filter">
                <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">


                    <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                        <ul
                            class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                            <li>
                                <a href="#"
                                    class="block py-2 pl-3 pr-4 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white md:dark:text-blue-500"
                                    aria-current="page">Gallery</a>
                            </li>
                            <li>

                                <a href="{{ route('admin.galleries.create') }}"
                                    class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Tambah
                                    Gallery</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </nav>


            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-1">
                                #
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Gambar
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Judul
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Category
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($galleries as $gallery)
                            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $loop->iteration }}
                                </th>
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">

                                    <img src="{{ Storage::url('' . $gallery->image) }}" class="rounded"
                                        style="width: 150px">

                                </th>
                                <td class="px-6 py-4">
                                    {{ $gallery->title }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $gallery->category->name }}
                                </td>

                                <td class="px-6 py-4">
                                    <div class="row">

                                        <a href="{{ url('/admin/galleries') }}/{{ $gallery->slug }}"
                                            class="badge bg-info">Lihat<span data-feather="eye"></span></a>
                                    </div>
                                    <div class="row">

                                        <a href="{{ url('/admin/galleries') }}/{{ $gallery->slug }}/edit"
                                            class="badge bg-warning">Edit<span data-feather="edit"></span></a>
                                    </div>
                                    <form action="{{ url('/admin/galleries') }}/{{ $gallery->slug }}" method="post"
                                        class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="badge bg-danger border-0"
                                            onclick="return confirm('ingin menghapus data ini ?')">Hapus<span
                                                data-feather="x-circle"></span></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>{{ $galleries->links() }}
        </div>
    </body>
</x-admin-layout>
