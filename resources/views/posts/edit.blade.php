<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl  mx-auto sm:px-6 lg:px-8">
        <div class="overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <form action="{{ route('dashboard.update',$post->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-6">
                      <label for="Name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Title </label>
                      <input type="text" name="title" value="{{$post->title}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required>
                    </div>
                    <div class="mb-6">
                        <label for="Name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Text Post </label>
                        <textarea  name="text_post" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required >{{$post->text_post}}</textarea>
                      </div>
                      <div class="mb-6">
                        <label for="Name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Category </label>
                        <select id="category_id" name="category_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>Choose a Category</option>
                            @foreach ($categores as $category)
                            <option value="{{$category->id}}" 
                            @if ($category->id === $post->category_id)
                                selected
                            @endif    
                            >{{$category->name}}</option>
                            @endforeach
                          </select>  
                    
                    </div>
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                  </form> 
                
                
            </div>
        </div>
    </div>
</x-app-layout>
