<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Community') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <center>
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                            @foreach ($images as $img)
                                <div>
                                    <img class="h-auto max-w-full rounded-lg" width="250px" src="https://iconcraftai.s3.amazonaws.com/{{ $img->image_url }}" alt=""><br>
                                </div>    
                            @endforeach
                        </div>
                    </center>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
