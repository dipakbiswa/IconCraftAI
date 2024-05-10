<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Feedback') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <center>
                        {{-- Success Message --}}
                        @if (session('status'))
                            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                                <strong class="font-bold">Success!</strong>
                                <span class="block sm:inline">{{ session('status') }}</span>
                            </div>
                        @endif
                        <form action="{{ route('feedback') }}" method="POST">
                            @csrf
                            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Leave your feedback!</h2><br>
                            <textarea name="feedback" id="" cols="40" rows="5" style="border-radius: 5px;" required></textarea><br>
                            <x-primary-button class="ml-4">
                                {{ __('Submit') }}
                            </x-primary-button>
                        </form>
                    </center>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
