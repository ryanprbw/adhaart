<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>

</head>
<x-admin-layout>

    <body style="bg-white rounded-lg shadow m-4 dark:bg-gray-800">

        <div class="container p-8">
            @include('admin.partials.navbar')
            <div class="row">
                <div class="col-md-12">
                    <div class="card border-0 shadow rounded">
                        <div class="card-body">
                            <form action="{{ route('admin.carousels.update', $carousel->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label
                                        class="form-label block mb-2 text-sm font-medium text-gray-900 dark:text-white">GAMBAR</label>
                                    <input type="file"
                                        class="block w-full text-sm form-control @error('image') is-invalid @enderror text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                        name="image">
                                </div>

                                <div class="form-group">
                                    <label
                                        class="form-label block mb-2 text-sm font-medium text-gray-900 dark:text-white">JUDUL</label>
                                    <input type="text"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 form-control @error('title') is-invalid @enderror"
                                        name="title" value="{{ old('title', $carousel->title) }}"
                                        placeholder="Masukkan Judul Post">

                                    <!-- error message untuk title -->
                                    @error('title')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="font-weight-bold">KONTEN</label>
                                    <textarea class="form-control @error('content') is-invalid @enderror" name="content" rows="5"
                                        placeholder="Masukkan Konten Post">{{ old('content', $carousel->content) }}</textarea>

                                    <!-- error message untuk content -->
                                    @error('content')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-md btn-primary">UPDATE</button>
                                <button type="reset" class="btn btn-md btn-warning">RESET</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
        <script>
            CKEDITOR.replace('content');
        </script>
    </body>
</x-admin-layout>

</html>
