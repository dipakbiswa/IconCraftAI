<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <center>
                        {{-- Success Message --}}
                        @if (session('success_status'))
                            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                                <strong class="font-bold">Thank You!</strong>
                                <span class="block sm:inline">{{ session('success_status') }}</span>
                            </div>
                        @endif
                        {{-- Error Message --}}
                        @if (session('failed_status'))
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                <strong class="font-bold">Opps!</strong>
                                <span class="block sm:inline">{{ session('failed_status') }}</span>
                            </div>
                        @endif
                        {{-- Credit Message --}}
                        @if (session('credit_error'))
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                <strong class="font-bold">Opps!</strong>
                                <span class="block sm:inline">{{ session('credit_error') }}</span>
                            </div>
                        @endif
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Your Collections</h2>
                        <br>
                        @php
                            $count = 0;
                        @endphp
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                            @foreach ($images as $img)
                                <div> 
                                    <img class="h-auto max-w-full rounded-lg" src="https://iconcraftai.s3.amazonaws.com/{{ $img->image_url }}" alt=""><br>
                                    <a href="https://iconcraftai.s3.amazonaws.com/{{ $img->image_url }}" download="https://iconcraftai.s3.amazonaws.com/{{ $img->image_url }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Download</a>
                                    @php
                                        $count++;
                                    @endphp
                                </div>
                            @endforeach    
                        </div>
                        <br>
                        <br>
                        @if ($count==0)
                            No Collections to Show.
                        @else 
                            {{ $count }} Images Found.
                        @endif
                    </center>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
