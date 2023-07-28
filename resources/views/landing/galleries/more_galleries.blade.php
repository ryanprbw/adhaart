<header>

    @include('landing.partials.header')

    @include('landing.partials.navbar')
</header>





<main>

    <body>

        <div>

            <section
                class="bg-white dark:bg-gray-900 bg-[url('https://flowbite.s3.amazonaws.com/docs/jumbotron/hero-pattern.svg')] dark:bg-[url('https://flowbite.s3.amazonaws.com/docs/jumbotron/hero-pattern-dark.svg')]">
                <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16 z-10 relative">
                    <a href="{{ url('/gallery') }}"
                        class="inline-flex justify-between items-center py-1 px-1 pr-4 mb-7 text-sm text-blue-700 bg-blue-100 rounded-full dark:bg-blue-900 dark:text-blue-300 hover:bg-blue-200 dark:hover:bg-blue-800">
                        <span class="text-xs bg-blue-600 rounded-full text-white px-4 py-1.5 mr-3">New</span> <span
                            class="text-sm font-medium">{{ $title }}</span>
                        <svg class="w-2.5 h-2.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                    </a>
                    <h1
                        class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
                        {{ $title }}</h1>
                    <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 lg:px-48 dark:text-gray-200">
                        Here at Flowbite we focus on markets where technology, innovation, and capital can
                        unlock long-term value and drive economic growth.</p>

                </div>

            </section>
        </div>

        <div>
            @if ($galleries->count())
            @else
                <p class="text-center fs-4">Data Gallery Kosong</p>
            @endif
            <div class="grid grid-cols-1 md:grid-cols-3 sm:grid-cols-2 gap-4 p-1">
                @foreach ($galleries as $gallery)
                    <a href="/gallery/{{ $gallery->slug }}"
                        @if ($gallery->image) class="p-1 flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                    <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none sm:h-auto sm:w-12 sm:rounded-none md:rounded-l-lg"
                    src="{{ Storage::url('' . $gallery->image) }}" alt="">
                    @else
                    <img src="https://source.unsplash.com/500x400?{{ $gallery->category->name }}"
                    class="custom-block-image img-fluid" alt="{{ $gallery->category->name }}"> @endif
                        <div class="flex flex-col justify-between p-2 leading-normal">
                        <h2 class=" mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                            {{ $gallery->title }}</h2>
                        <p class=" mb-3 font-normal text-gray-700 dark:text-gray-400">Photo
                            {{ $gallery->category->name }}</p>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                            {{ $gallery->excerpt }}</p>

                        <small class="text-xs mb-3 font-normal text-gray-700 dark:text-gray-400"
                            href="/posts?author={{ $gallery->author->username }}">By
                            {{ $gallery->author->name }}</small>
                        <small class="text-xs mb-3 font-normal text-gray-700 dark:text-gray-400"
                            href="/posts?author={{ $gallery->author->username }}">
                            {{ $gallery->created_at }}</small>

            </div>

            </a>
            @endforeach




        </div>
    </body>
    <footer>

        </div>
        @include('landing.partials.footer')
        <div>
    </footer>

</main>
@include('landing.partials.javasc')


@method('script')
