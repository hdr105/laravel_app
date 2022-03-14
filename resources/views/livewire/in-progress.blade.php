<div>
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Task Mangement System
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
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
                        <button class="completed bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Complete</button>
                    </div>
                </div>
            </div>
    </div>
        
    <input type="text" wire:model="img">

    <button wire:click="search">Search</button>


@if($showImages === 1)
<form action="form" method="POST">
    <div class="flex flex-row container mx-auto space-y-2 lg:space-y-0 lg:gap-2 lg:grid lg:grid-cols-6">
        @foreach($images as $image)
            @livewire('images',['image' => $image],key($image['id']))
        @endforeach
    </div>
</form>
@endif
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"  />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" ></script>
<script>
    
    
    document.addEventListener('livewire:load', function () {
        window.livewire.on('alert', param => {
            toastr[param['type']](param['message']);
            if (param['type'] == "success"){
                setTimeout(function () {
                    $(".modal").modal("hide");
                }, 300);
            }
        });
        
        $("body").on('click','.completed', function () {
            var selected = [];
            $(".image_checkbox").each(function (key, value) {
                if($(this).is(':checked')){
                    selected.push(value.value);
                }
            });
            if(selected.length === @this.required_images){
                @this.submit_task(selected);
            }else{
                let count = @this.required_images;
                toastr.info(`Please select ${@this.required_images} images`);
            }
            
        });
    });
        
</script>
</div>


    



