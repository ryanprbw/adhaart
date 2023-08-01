<x-admin-layout>

    <div class="container p-8">


        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h2 class="h2">Create New Gallery </h1>
        </div>

        <div class="col-lg-8">
            <form action="{{ url('/admin/galleries') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">

                    <label for="title"
                        class="form-label block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                    <input type="text"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 form-control @error('title') is-invalid @enderror"
                        id="title" name="title" value="{{ old('title') }}">
                    @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">

                    <label for="slug"
                        class="form-label lock mb-2 text-sm font-medium text-gray-900 dark:text-white form-label ">Slug</label>
                    <input type="text"
                        class="form-control @error('slug') is-invalid @enderror bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        id="slug" name="slug">
                    @error('slug')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">



                    <label for="category_id"
                        class="lock mb-2 text-sm font-medium text-gray-900 dark:text-white form-label">Category</label>
                    <select
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 form-select"
                        name="category_id">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">


                    <label for="image"
                        class="form-label block mb-2 text-sm font-medium text-gray-900 dark:text-white ">Image</label>
                    <img class="img-preview img-fluid w-48">
                    <input
                        class="block w-full text-sm form-control @error('image') is-invalid @enderror text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        type="file" id="image" name="image" onchange="previewImage()">
                    <div class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="image">A profile picture is
                        useful to confirm your are logged into your account</div>

                </div>
                @error('image')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <div class="mb-3">
                    <label for="body"
                        class="form-label block mb-2 text-sm font-medium text-gray-900 dark:text-white ">Body</label>
                    @error('body')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <input id="body" type="hidden" name="body" value="{{ old('body') }}">
                    <trix-editor class="bg-gray-500" name="description" input="body"></trix-editor>

                </div>


                <button type="submit" class="btn btn-primary">Create Post</button>
            </form>
        </div>
    </div>
    {{-- <script>
  const title = document.querySelector('#title');
  const slug = document.querySelector('#slug');
  title.addEventListener('change' , function() {
    fetch('/dashboard/posts/checkSlug?title=' + title.value)
      .then(response => response.json())
      .then(data => slug.value = data.slug)
  });
</script> --}}

    <script>
        const title = document.querySelector("#title");
        const slug = document.querySelector("#slug");

        title.addEventListener("change", function() {
            let preslug = title.value;
            preslug = preslug.replace(/ /g, "-");
            slug.value = preslug.toLowerCase();
        });

        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault();
        });

        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const blob = URL.createObjectURL(image.files[0]);
            imgPreview.src = blob;

            // const oFReader = new FileReader();
            // oFReader.readAsDaraURL(image.files[0]);
            // oFReader.onload = function(oFREvent) {
            //   imgPreview.src = oFREvent.target.result;
            // }

        }
    </script>
</x-admin-layout>
