
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
                                                    <option>Cadberry</option>
                                                    <option>Starbucks</option>
                                                    <option>Hilti</option>
                                                </select>
                                            </div>

                                            <div class="flex flex-col">
                                                <label for="date" class="text-sm font-medium text-stone-600">published date</label>
                                                <input name="date" type="date" id="date" class="mt-2 block w-full cursor-pointer rounded-md border border-gray-100 bg-gray-100 px-2 py-2 shadow-sm outline-none focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" />
                                            </div>

                                            <div class="flex flex-col">
                                                <label for="status" class="text-sm font-medium text-stone-600">tag</label>

                                                <select name="tag" id="status" class="mt-2 block w-full cursor-pointer rounded-md border border-gray-100 bg-gray-100 px-2 py-2 shadow-sm outline-none focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                                    <option>Dispached Out</option>
                                                    <option>In Warehouse</option>
                                                    <option>Being Brought In</option>
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







        @if( count($posts)==0)

<div class="flex justify-center "></div>
            @include(".layouts/empty")
        @endif





        @foreach($posts as $post)
            <a href="{{route("post",["id"=>$post->id])}}">
                <div class="md:p-8 p-2 bg-white">
                    <!--Banner image-->
                    <img
                        class="rounded-lg w-full"
                        src="https://images.unsplash.com/photo-1603349206295-dde20617cb6a?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=750&q=80
          "
                    />

                    <!--Tag-->
                    <p class="text-indigo-500 font-semibold text-base mt-2">{{$post->category->title}}</p>
                    <!--Title-->
                    <h1
                        class="font-semibold text-gray-900 leading-none text-xl mt-1 capitalize truncate"
                    >
{{$post->title}}                    </h1>
                    <!--Description-->
                    <div class="max-w-full">
                        <p class="text-base font-medium tracking-wide text-gray-600 mt-1">
                      {{$post->description}}
                        </p>
                    </div>
                    <div class="flex items-center space-x-2 mt-20">
                        <!--Author's profile photo-->
                        <img
                            class="w-10 h-10 object-cover object-center rounded-full"
                            src="https://randomuser.me/api/portraits/men/54.jpg"
                            alt="random user"
                        />
                        <div>
                            <!--Author name-->
                            <p class="text-gray-900 font-semibold">{{$post->user->name}}</p>
                            <p class="text-gray-500 font-semibold text-sm">
                                {{$post->created_at}}
                            </p>
                        </div>
                    </div>
                </div></a>

        @endforeach

    </ul>

    <div class="flex justify-center items-center">
<div>
    {{$posts->links()}}

</div>
    </div>

@endsection
