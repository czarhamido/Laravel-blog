<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categores') }}
        </h2>
        <div class="my-5 ">
            <a href="{{route('categores.create')}}" class="bg-blue-500 mx-5 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded">
                Create Category
            </a>
        </div>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl  mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                  
                <table class="shadow-lg w-full">
                    <tr>
                      <th class="bg-gray-400 text-gray-100 border text-left  px-8 w-[10px] ">#</th>
                      <th class="bg-gray-400 text-gray-100 border text-left px-8 py-4">Name</th>
                      <th class="bg-gray-400 text-gray-100 border text-left px-8 py-4">Action</th>
                    </tr>
                    @foreach ($categores as $category)
                    <tr>
                      <td class="border px-4 py-2">{{$category->id}}</td>
                      <td class="border px-4 py-2 ">{{$category->name}}</td>
                      <td class="border px-4 flex py-2 w-[100%]">
                        <a href="{{route('dashboard.index')}}?category_id={{$category->id}}" class=" w-[20%] bg-yellow-500 m-5 hover:bg-yellow-600 text-white font-bold py-2 px-4 border border-yellow-600 rounded">
                            View posts
                        </a>

                        <a href="{{ route('categores.edit', $category->id) }}" class="w-[20%] bg-blue-500 m-5  hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded">
                            Update
                        </a>
                        <form method="POST" action="{{ route('categores.destroy', $category->id) }}" class="w-[20%]">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class=" bg-red-500 m-5 w-[100%] hover:bg-red-700 text-white font-bold py-2 px-4 border border-red-700 rounded" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>


                        
 

                      </td>
                    </tr>
                    @endforeach

                </table>
                
            </div>
        </div>
    </div>
</x-app-layout>
