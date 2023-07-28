<x-admin-layout>
    <div class="container">
        <div class="row my-3">
            <div class="col-lg-8">
                <h1 class="mb-4">{{ $gallery->title }}</h1>
                <a href="{{ url('/admin/galleries') }}" class="btn btn-success"><span data-feather="arrow-left"></span>
                    Back to
                    my Posts</a>
                <a href="{{ url('/admin/galleries') }}/{{ $gallery->slug }}/edit" class="btn btn-warning"><span
                        data-feather="edit"></span>
                    Edit My Post</a>
                <form action="{{ url('/admin/galleries') }}/{{ $gallery->slug }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger" onclick="return confirm('ingin menghapus data ini ?')"><span
                            data-feather="x-circle"></span> Delete this Post</button>
                </form>
                @if ($gallery->image)
                    <img src="{{ Storage::url('' . $gallery->image) }}" alt="{{ $gallery->category->name }}"
                        class="img-fluid mt-3">
                @else
                    <img src="https://source.unsplash.com/1200x400?{{ $gallery->category->name }}"
                        alt="{{ $gallery->category->name }}" class="img-fluid mt-3">
                @endif
                <article class="my-3 fs-5">
                    {!! $gallery->body !!}
                </article>
            </div>
        </div>
    </div>
</x-admin-layout>
