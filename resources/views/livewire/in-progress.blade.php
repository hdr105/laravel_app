<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Task Mangement System
    </h2>
</x-slot>
<form action="form" method="POST">
<div class="flex flex-row container mx-auto space-y-2 lg:space-y-0 lg:gap-2 lg:grid lg:grid-cols-6">
        @foreach($images as $image)   
            @livewire('images',['image' => $image])   
        @endforeach     
    </div>
</form>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        
        
        @foreach($in_progress_tasks as $task)
            <div class="bg-white max-w-sm mx-auto rounded overflow-hidden shadow-lg">
                <img class="w-full" src="https://cdn4.buysellads.net/uu/1/41334/1550855391-cc_dark.png" alt="Sunset in the mountains">
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2">{{ $task->title }}</div>
                    <p class="text-gray-700 text-base">
                        {{ $task->detail }}
                    </p>
                    <p class="text-gray-700 text-base">
                            {{ $task->no_of_images }}
                        </p>
                    </div>
                    <div class="px-6 pt-4 pb-2">
                        <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Complete</button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>