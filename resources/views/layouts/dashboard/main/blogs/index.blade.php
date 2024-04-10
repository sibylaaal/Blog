
@extends("layouts.dashboard.dashboardlayout")

@section("content")


    <div class="overflow-hidden w-full  m-5">
        <h1 class="text-3xl font-semibold p-5">Blogs</h1>
        <form action="{{ route('search') }}" method="POST">
            @csrf
            <div class="py-5">

                <div class="flex flex-col">
                    <div class="rounded-xl bg-white p-6">


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


        <table class="w-full border-collapse bg-white text-left text-sm text-gray-500">
            <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Name</th>
                <th scope="col" class="px-6 py-4 font-medium text-gray-900">category</th>
                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Role</th>
                <th scope="col" class="px-6 py-4 font-medium text-gray-900">tags</th>
                <th scope="col" class="px-6 py-4 font-medium text-gray-900"></th>
            </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 border-t border-gray-100">

            @foreach($posts as $post)
            <tr class="hover:bg-gray-50">
                <th class="flex gap-3 px-6 py-4 font-normal text-gray-900">

                    <div class="text-sm">
                        <div class="font-medium text-gray-700">{{$post->title}}</div>
                        <div class="text-gray-400">{{$post->user->email}}</div>
                    </div>
                </th>

                <td class="px-6 py-4">
          <span
              class="inline-flex items-center gap-1 rounded-full bg-green-50 px-2 py-1 text-xs font-semibold text-green-600"
          >
            <span class="h-1.5 w-1.5 rounded-full bg-green-600"></span>
                         {{$post->category->title}}

          </span>
                </td>
                <td class="px-6 py-4">{{$post->user->role}}</td>
                <td class="px-6 py-4">
                    <div class="flex gap-2">
            <span
                class="inline-flex items-center gap-1 rounded-full bg-blue-50 px-2 py-1 text-xs font-semibold text-blue-600"
            >
             {{$post->tag->title}}
            </span>
                    </div>
                </td>
                <td class="px-6 py-4">
                    <div class="flex justify-end gap-4">
                        <a x-data="{ tooltip: 'Delete' }" href="#">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                class="h-6 w-6"
                                x-tooltip="tooltip"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"
                                />
                            </svg>
                        </a>
                        <a x-data="{ tooltip: 'Edite' }" href="#">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                class="h-6 w-6"
                                x-tooltip="tooltip"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125"
                                />
                            </svg>
                        </a>
                    </div>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>

        {{$posts->links()}}
    </div>

@endsection
