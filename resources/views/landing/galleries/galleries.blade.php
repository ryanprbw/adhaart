<section class="bg-white dark:bg-gray-900">

    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 p-8">
        <div class="grid gap-4">

            @forelse ($galleries as $gallery)
                @if ($loop->index < 3)
                    <a href="/gallery/{{ $gallery->slug }}"
                        class="cursor-pointer filter grayscale hover:grayscale-0 flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                        <div>
                            <img class="h-auto max-w-full rounded-lg" src="{{ Storage::url('' . $gallery->image) }}"
                                alt="">
                        </div>
                    </a>
                @endif
            @empty
                <p>Data Gallery Kosong</p>
            @endforelse

        </div>
        <div class="grid gap-4">
            @forelse ($galleries as $gallery)
                @if ($loop->index > 2 && $loop->index < 6)
                    <a href="/gallery/{{ $gallery->slug }}"
                        class="cursor-pointer filter grayscale hover:grayscale-0 flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">

                        <div>
                            <img class="cursor-pointer filter grayscale hover:grayscale-0 h-auto max-w-full rounded-lg"
                                src="{{ Storage::url('' . $gallery->image) }}" alt="">
                        </div>
                    </a>
                @endif
            @empty
                <p>Data Gallery Kosong</p>
            @endforelse
        </div>
        <div class="grid gap-4">
            @forelse ($galleries as $gallery)
                @if ($loop->index > 5 && $loop->index < 9)
                    <a href="/gallery/{{ $gallery->slug }}"
                        class="cursor-pointer filter grayscale hover:grayscale-0 flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">

                        <div>
                            <img class="cursor-pointer filter grayscale hover:grayscale-0 h-auto max-w-full rounded-lg"
                                src="{{ Storage::url('' . $gallery->image) }}" alt="">
                        </div>
                    </a>
                @endif
            @empty
                <p>Data Gallery Kosong</p>
            @endforelse
        </div>
        <div class="grid gap-4">
            @forelse ($galleries as $gallery)
                @if ($loop->index > 8 && $loop->index < 13)
                    <a href="/gallery/{{ $gallery->slug }}"
                        class="cursor-pointer filter grayscale hover:grayscale-0 flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">

                        <div>
                            <img class="cursor-pointer filter grayscale hover:grayscale-0 h-auto max-w-full rounded-lg"
                                src="{{ Storage::url('' . $gallery->image) }}" alt="">
                        </div>
                    </a>
                @endif
            @empty
                <p>Data Gallery Kosong</p>
            @endforelse
        </div>
    </div>
</section>
