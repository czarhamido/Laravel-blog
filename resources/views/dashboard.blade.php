<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
 
            {{ __('Browse by category') }}
        </h2>
        <div class="md:flex flex-wrap hidden ">
            <a href="{{route('dashboard.index')}}" class="p-4 w-[15%] max-w-sm {{ request()->query('category_id') == '' ? 'bg-slate-200' : 'bg-white' }}  rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 m-5 dark:border-gray-700">
                <div >
                    <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">All posts</h5>
                </div>
            </a>
            @foreach ($categores as $category)
                        <a href="{{route('dashboard.index')}}?category_id={{$category->id}}" class="p-4 w-[15%] max-w-sm {{ request()->query('category_id') == $category->id ? 'bg-slate-200' : 'bg-white' }} bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 m-5 dark:border-gray-700">
                            <div >
                                <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">{{$category->name}}</h5>
                            </div>
                        </a>
                    @endforeach
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 ">
                    <div class="md:flex  md:flex-wrap justify-center ">
                        @foreach ($posts as $post)
                        <div class="p-4  md:w-[30%] max-w-sm bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 m-4  dark:border-gray-700">
                            <a href="#">
                                <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">{{$post->title}}</h5>
                            </a>
                            <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">{{$post->text_post}}</p>
                            <a href="#" class="inline-flex items-center text-blue-600 hover:underline">
                                See all
                                <svg class="ml-2 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M11 3a1 1 0 100 2h2.586l-6.293 6.293a1 1 0 101.414 1.414L15 6.414V9a1 1 0 102 0V4a1 1 0 00-1-1h-5z"></path><path d="M5 5a2 2 0 00-2 2v8a2 2 0 002 2h8a2 2 0 002-2v-3a1 1 0 10-2 0v3H5V7h3a1 1 0 000-2H5z"></path></svg>
                            </a>

                            <form method="POST" action="{{ route('dashboard.destroy', $post->id) }}">
                                <a href="{{route('dashboard.edit',$post->id)}}" type="submit" class="bg-green-500 mx-5 my-8 hover:bg-green-700 text-white font-bold py-2 px-4 border border-green-700 rounded" >Update</a>

                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 mx-5 my-8 hover:bg-red-700 text-white font-bold py-2 px-4 border border-red-700 rounded" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>

                     
                        </div>
                    @endforeach
                    </div>
                    
                    You're logged in!
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
