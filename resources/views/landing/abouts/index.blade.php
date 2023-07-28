@include('landing.partials.header')
@include('landing.partials.navbar')

<body>

    <section class="bg-white dark:bg-gray-900">
        <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
            <div class="mr-auto place-self-center lg:col-span-7">
                <h1
                    class="max-w-2xl mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl xl:text-6xl dark:text-white">
                    AdhaArt</h1>
                <p class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">
                    Silvie is a Prague-based pencil artist. She was born in 1990 in Zlin, the Czech Republic. During her
                    doctoral studies in law she fell in love again with drawing as the greatest passion from her
                    childhood. She decided to follow her heart and rebuilt this old dream to become an artist.

                    In the recent work, being influenced by the pandemic situation, she started capturing some of
                    otherworld, kind of escape from the rush of the world, moments of daydreaming and intimacy. The
                    subjects in her recent work just sense the moment, they are pleasantly lost, they just are, for
                    themselves.</p>

                <a href="#"
                    class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center text-gray-900 border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                    Speak to Adha
                </a>
            </div>
            <div class="hidden lg:mt-0 lg:col-span-5 lg:flex cursor-pointer filter grayscale hover:grayscale-0">
                <img src="{{ url('storage/assets/adhaart.png') }}">
            </div>
        </div>
    </section>

</body>
@include('landing.partials.footer')
@include('landing.partials.javasc')
