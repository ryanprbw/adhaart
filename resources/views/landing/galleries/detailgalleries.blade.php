<header>

    @include('landing.partials.header')
    @include('landing.partials.navbar')

    <section
        class="bg-white dark:bg-gray-900 bg-[url('https://flowbite.s3.amazonaws.com/docs/jumbotron/hero-pattern.svg')] dark:bg-[url('https://flowbite.s3.amazonaws.com/docs/jumbotron/hero-pattern-dark.svg')]">
        <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16 z-10 relative">
            <a href="#"
                class="inline-flex justify-between items-center py-1 px-1 pr-4 mb-7 text-sm text-blue-700 bg-blue-100 rounded-full dark:bg-blue-900 dark:text-blue-300 hover:bg-blue-200 dark:hover:bg-blue-800">
                <span class="text-xs bg-blue-600 rounded-full text-white px-4 py-1.5 mr-3">New</span> <span
                    class="text-sm font-medium">Lukisan Terbaru</span>
                <svg class="w-2.5 h-2.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 9 4-4-4-4" />
                </svg>
            </a>
            <h1
                class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
                {{ config('app.name') }}</h1>
            <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 lg:px-48 dark:text-gray-200">
                Detail Lukisan</p>

        </div>


    </section>


</header>

<body>

    <div
        class="gap-4 text-justify p-8 mx-auto flex flex-col items-center bg-white border border-gray-200  shadow md:flex-row md:max-w-fit dark:border-gray-700 dark:bg-gray-800">



        <div class="grid gap-4 " style="width: fit-content">
            <div>
                <img class="h-auto max-w-full rounded-lg" src="{{ Storage::url('' . $gallery->image) }}" alt="">
            </div>
        </div>

        <div class="flex flex-col justify-between p-4 leading-normal">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $gallery->title }}
            </h5>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $gallery->body2 }}</p>
            <small class="text-xs mb-3 font-normal text-gray-700 dark:text-gray-400"
                href="/posts?author={{ $gallery->author->username }}">Created by
                {{ $gallery->author->name }}</small>
            <small class="text-xs mb-3 font-normal text-gray-700 dark:text-gray-400"
                href="/posts?author={{ $gallery->author->username }}">
                {{ $gallery->created_at }}</small>
        </div>


    </div>



</body>



{{-- footer --}}
@include('landing.partials.footer')

{{-- javascript --}}
@include('landing.partials.javasc')
