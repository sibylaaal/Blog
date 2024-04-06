

@extends('posts')
@section("articles")





    <main class="mt-10">

        <div class="mb-4 md:mb-0 w-full max-w-screen-md mx-auto relative" style="height: 24em;">
            <div class="absolute left-0 bottom-0 w-full h-full z-10"
                 style="background-image: linear-gradient(180deg,transparent,rgba(0,0,0,.7));"></div>
            <img src="https://images.unsplash.com/photo-1493770348161-369560ae357d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2100&q=80" class="absolute left-0 top-0 w-full h-full z-0 object-cover" />
            <div class="p-4 absolute bottom-0 left-0 z-20">
                <a href="#"
                   class="px-4 py-1 bg-black text-gray-200 inline-flex items-center justify-center mb-2">{{$post[0]->category->title}}</a>
                <h2 class="text-4xl font-semibold text-gray-100 leading-tight">

  {{$post[0]->title}}
                </h2>
                <div class="flex mt-3">
                    <img src="https://randomuser.me/api/portraits/men/97.jpg"
                         class="h-10 w-10 rounded-full mr-2 object-cover" />
                    <div>
                        <p class="font-semibold text-gray-200 text-sm"> {{$post[0]->user->name}}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="px-4 lg:px-0 mt-12 text-gray-700 max-w-screen-md mx-auto text-lg leading-relaxed">
            <div class="p-2">

                {{$post[0]->text}}
            </div>
        </div>
    </main>
@endsection
