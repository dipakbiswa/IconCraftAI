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
                    <section class="container mx-auto flex flex-wrap">
                        <div class="lg:w-1/3 md:w-1/2 w-full p-4 ">
                            <div class="p-8 rounded-xl shadow-md border border-gray-200 bg-white">
                                <h5 class="text-5xl font-bold py-2 text-gray-500"> $5</h5>
                                <hr>
                                <div class="my-4 flex flex-col text-base items-center">
                                    <p class="flex items-center w-full my-1"><svg class="mr-2 text-blue-500" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewbox="0 0 16 16">
                                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"></path>
                                        </svg> 50 Credits </p>
                                    <p class="flex items-center w-full my-1"><svg class="mr-2 text-blue-500" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewbox="0 0 16 16">
                                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"></path>
                                        </svg> $0.10 per image </p>
                                    
                                </div>
                                <form action="{{ route('pricing.india.post') }}" method="POST" >
                                    @csrf 
                                    <script src="https://checkout.razorpay.com/v1/checkout.js"
                                            data-key="{{ env('RAZORPAY_KEY') }}"
                                            data-amount="10000"
                                            data-buttontext="Pay 100 INR"
                                            data-name="GeekyAnts official"
                                            data-description="Razorpay payment"
                                            data-image="/images/logo-icon.png"
                                            data-prefill.name="ABC"
                                            data-prefill.email="abc@gmail.com"
                                            data-theme.color="#ff7529">
                                    </script>
                                </form>
                            </div>
                        </div>
                        <div class="lg:w-1/3 md:w-1/2 w-full p-4 ">
                            <div class="p-8 rounded-xl bg-white shadow-md border border-gray-200">
                                <h5 class="text-5xl font-bold py-2 text-gray-500"> $9</h5>
                                <hr>
                                <div class="my-4 flex flex-col text-base items-center">
                                    <p class="flex items-center w-full my-1"><svg class="mr-2 text-blue-500" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewbox="0 0 16 16">
                                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"></path>
                                        </svg> 100 Credits </p>
                                    <p class="flex items-center w-full my-1"><svg class="mr-2 text-blue-500" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewbox="0 0 16 16">
                                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"></path>
                                        </svg> $0.09 per image </p>
                                    
                                </div>
                                <form action="{{ route('pricing.india.post') }}" method="POST" >
                                    @csrf 
                                    <script src="https://checkout.razorpay.com/v1/checkout.js"
                                            data-key="{{ env('RAZORPAY_KEY') }}"
                                            data-amount="10000"
                                            data-buttontext="Pay 100 INR"
                                            data-name="GeekyAnts official"
                                            data-description="Razorpay payment"
                                            data-image="/images/logo-icon.png"
                                            data-prefill.name="ABC"
                                            data-prefill.email="abc@gmail.com"
                                            data-theme.color="#ff7529">
                                    </script>
                                </form>
                            </div>
                        </div>
                        <div class="lg:w-1/3 md:w-1/2 w-full p-4 ">
                            <div class="p-8 rounded-xl shadow-md bg-white border border-gray-200">
                                <h5 class="text-5xl font-bold py-2 text-gray-500"> $20</h5>
                                <hr>
                                <div class="my-4 flex flex-col text-base items-center">
                                    <p class="flex items-center w-full my-1"><svg class="mr-2 text-blue-500" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewbox="0 0 16 16">
                                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"></path>
                                        </svg> 250 Credits </p>
                                    <p class="flex items-center w-full my-1"><svg class="mr-2 text-blue-500" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewbox="0 0 16 16">
                                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"></path>
                                        </svg> $0.08 per image </p>
                                    
                                </div>
                                <form action="{{ route('pricing.india.post') }}" method="POST" >
                                    @csrf 
                                    <script src="https://checkout.razorpay.com/v1/checkout.js"
                                            data-key="{{ env('RAZORPAY_KEY') }}"
                                            data-amount="10000"
                                            data-buttontext="Pay 100 INR"
                                            data-name="GeekyAnts official"
                                            data-description="Razorpay payment"
                                            data-image="/images/logo-icon.png"
                                            data-prefill.name="ABC"
                                            data-prefill.email="abc@gmail.com"
                                            data-theme.color="#ff7529">
                                    </script>
                                </form>
                            </div>
                        </div>
                    </section>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
