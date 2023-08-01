<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> --}}
</head>
<x-admin-layout>

    <body style="bg-white rounded-lg shadow m-4 dark:bg-gray-800">
        <div class="container p-8">
            @include('admin.partials.navbar')
            <div class="row">
                <div class="col-md-12">
                    <div class="card border-0 shadow rounded">
                        <div class="card-body">
                            <form action="{{ route('admin.carousels.store') }}" method="POST"
                                enctype="multipart/form-data">

                                @csrf


                                <div class="form-group p-6">
                                    <label
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white font-weight-bold">GAMBAR</label>
                                    <input type="file"
                                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 form-control @error('image') is-invalid @enderror"
                                        name="image">

                                    <!-- error message untuk title -->
                                    @error('image')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG,
                                        PNG,
                                        JPG or GIF (MAX. 800x400px).</p>

                                </div>



                                <div class="form-group p-6">
                                    <label
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white font-weight-bold">JUDUL</label>
                                    <input type="text"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 form-control @error('title') is-invalid @enderror"
                                        name="title" value="{{ old('title') }}" placeholder="Masukkan Judul Gallery">

                                    <!-- error message untuk title -->
                                    @error('title')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group p-6">
                                    <label
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white form-label">KONTEN</label>

                                    <textarea class="form-control @error('content') is-invalid @enderror" name="content" rows="5"
                                        placeholder="Masukkan Konten Post">{{ old('content') }}</textarea>

                                    <!-- error message untuk content -->
                                    @error('content')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                                <button type="reset" class="btn btn-md btn-warning">RESET</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
        <script>
            CKEDITOR.replace('content');
        </script>
    </body>
</x-admin-layout>
