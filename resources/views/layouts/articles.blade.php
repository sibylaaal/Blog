
@extends('posts')
@section("articles")

    <div class="relative overflow-hidden">
        <div aria-hidden="true" class="flex absolute -top-96 start-1/2 transform -translate-x-1/2">
            <div class= from-violet-300/50 to-purple-100 blur-3xl w-[25rem] h-[44rem] rotate-[-60deg] transform -translate-x-[10rem] dark:from-violet-900/50 dark:to-purple-900"></div>
            <div class=""></div>
        </div>

        <div class="relative z-10">
            <div class="max-w-[85rem] mx-auto px-4 sm:px-6 lg:px-8 py-10 lg:py-16">
                <div class="max-w-2xl text-center mx-auto">
                    <p class="inline-block text-sm font-medium bg-clip-text bg-gradient-to-l from-blue-600 to-violet-500 text-transparent dark:from-blue-400 dark:to-violet-400">
                        Nano: A vision for 2024
                    </p>

                    <!-- Title -->
                    <div class="mt-5 max-w-2xl">
                        <h1 class="block font-semibold text-gray-800 text-4xl md:text-5xl lg:text-6xl dark:text-gray-200">
                            Bylal s Tech Blog
                        </h1>
                    </div>
                    <!-- End Title -->

                    <div class="mt-5 max-w-3xl">
                        <p class="text-lg text-gray-600 dark:text-gray-400">Presign system based on the utility-first Tailwind CSS framework.</p>
                    </div>
                    <form action="{{ route('search') }}" method="POST">
                        @csrf
                        <div class="py-5">

                            <div class="flex flex-col">
                                <div class="rounded-xl border border-gray-200 bg-white p-6 shadow-lg">


                                        <div class="relative mb-10 w-full flex  items-center justify-between rounded-md">
                                            <svg class="absolute left-2 block h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <circle cx="11" cy="11" r="8" class=""></circle>
                                                <line x1="21" y1="21" x2="16.65" y2="16.65" class=""></line>
                                            </svg>
                                            <input type="text" name="name" class="h-12 w-full cursor-text rounded-md border border-gray-100 bg-gray-100 py-4 pr-40 pl-12 shadow-sm outline-none focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" placeholder="Search by name, type, manufacturer, etc" />
                                        </div>

                                        <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3">

                                            <div class="flex flex-col">
                                                <label for="manufacturer" class="text-sm font-medium text-stone-600">category</label>

                                                <select name="category" id="manufacturer" class="mt-2 block w-full rounded-md border border-gray-100 bg-gray-100 px-2 py-2 shadow-sm outline-none focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">

                                                  @foreach($categories as $category)


                                                    <option>{{$category->title}}</option>
                                                    @endforeach

                                                </select>
                                            </div>

                                            <div class="flex flex-col">
                                                <label for="date" class="text-sm font-medium text-stone-600">published date</label>
                                                <input name="date" type="date" id="date" class="mt-2 block w-full cursor-pointer rounded-md border border-gray-100 bg-gray-100 px-2 py-2 shadow-sm outline-none focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" />
                                            </div>

                                            <div class="flex flex-col">
                                                <label for="status" class="text-sm font-medium text-stone-600">tag</label>

                                                <select name="tag" id="status" class="mt-2 block w-full cursor-pointer rounded-md border border-gray-100 bg-gray-100 px-2 py-2 shadow-sm outline-none focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                                    @foreach($tags as $tag)


                                                        <option>{{$tag->title}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="mt-6 grid w-full grid-cols-2 justify-end space-x-4 md:flex">
                                            <button class="rounded-lg bg-gray-200 px-8 py-2 font-medium text-gray-700 outline-none hover:opacity-80 focus:ring">Reset</button>
                                            <button class="rounded-lg bg-blue-600 px-8 py-2 font-medium text-white outline-none hover:opacity-80 focus:ring">Search</button>
                                        </div>

                                </div>
                            </div>

                        </div>

                    </form>

                    <!-- Buttons -->

                    <!-- End Buttons -->
                </div>
            </div>
        </div>
    </div>
    <ul class="grid grid-cols-1 xl:grid-cols-3 gap-y-10 gap-x-6 items-start p-8">

        @if(count($posts) == 0)
                @include(".layouts.empty")
@endif

        @foreach($posts as $post)
            <li>
                <a href="{{ route("post", ["id" => $post->id]) }}" class="block">

                <article class="relative overflow-hidden rounded-lg shadow transition hover:shadow-lg">
                        <img
                            alt=""
                            src="{{ asset("storage/blogs/{$post->image}") }}"

                            class="absolute inset-0 h-full w-full object-cover"
                        />

                    <div class="relative bg-gradient-to-t from-gray-900/50 to-gray-900/25 pt-32 sm:pt-48 lg:pt-64">
                        <div class="p-4 sm:p-6">
                            <time datetime="2022-10-10" class="block text-xs text-white/90">
                                {{ $post->created_at->format('M d') }}
                            </time>
                            <p class="text-white font-semibold text-base mt-2">{{ $post->category->title }}</p>

                            <a href="#" class="text-white">
                                <h3 class="mt-0.5 text-lg font-bold">{{ $post->title }}</h3>
                            </a>

                            <p class="mt-2 line-clamp-3 text-sm/relaxed text-white/95">
                                {{ $post->text }}
                            </p>

                            <div class="flex items-center mt-2">
                                <img
                                    class="w-8 h-8 object-cover object-center rounded-full mr-2"
                                    src="https://randomuser.me/api/portraits/men/54.jpg"
                                    alt="random user"
                                />
                                <p class="text-white font-semibold">{{ $post->user->name }}</p>
                            </div>


                        </div>
                    </div>
                </article>
                </a>

            </li>
        @endforeach

    </ul>

    <div class="flex justify-center items-center">
<div>
    {{$posts->links()}}

</div>
    </div>

@endsection
