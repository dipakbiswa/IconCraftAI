<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Generate') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @foreach ($errors->all() as $error)
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                            <strong class="font-bold">Opps!</strong>
                            <span class="block sm:inline">{{ $error }}</span>
                        </div>
                    @endforeach
                    <form action="{{ route('generate.post') }}" method="POST">
                        @csrf
                        <b><h1 style="font-size: 25px; font-family:arial;">Let's generate your icon.</h1></b>
                        <p>Your results may vary. We are working on fine tuning results for each style. Here are some tips to make better icons:</p>
                        <br>
                        <ul>
                            <li>Simple prompts often work best</li>
                            <li>The AI is bad at letters</li>
                            <li>Use variants once you find a starting icon you like</li>
                            <li>Experiment with adding words, such as happy or vibrant</li>
                        </ul>
                        <br><br>
                        <b><h1 style="font-size: 20px;">1. Describe your icon using a noun and adjective</h1></b>
                        <x-text-input id="" class="block mt-1 w-full"
                                type="text"
                                placeholder="Wolf"
                                name="name" required/>
                        <br><br>
                        <b><h1 style="font-size: 20px;">2. Select a primary color for your icon</h1></b>
                        <center>
                            <ul class="radio-selector">
                                @foreach ($colors as $color)
                                    <li><input type="radio" value="{{ $color->name }}" name="color" id="color{{ $color->id }}" required/>
                                        <label for="color{{ $color->id }}"><img src="{{ $color->image_url }}" style="border-radius: 5px;"/>{{ $color->name }}</label>
                                    </li>
                                @endforeach
                            </ul>
                        </center>
                        <br><br>
                        <b><h1 style="font-size: 20px;">3. Select a primary color for your icon background</h1></b>
                        <center>
                            <ul class="radio-selector">
                                @foreach ($colors as $color)
                                    <li><input type="radio" value="{{ $color->name }}" name="background" id="background{{ $color->id }}" required/>
                                        <label for="background{{ $color->id }}"><img src="{{ $color->image_url }}" style="border-radius: 5px;"/>{{ $color->name }}</label>
                                    </li>
                                @endforeach
                            </ul>
                        </center>
                        <br><br>
                        <b><h1 style="font-size: 20px;">4. Select a style for your icon</h1></b>
                        <center>
                            <ul class="radio-selector">
                                @foreach ($iconTypes as $iconType)
                                    <li><input type="radio" value="{{ $iconType->name }}" name="IconType" id="type{{ $iconType->id }}" required/>
                                        <label for="type{{ $iconType->id }}"><img src="{{ $iconType->image_url }}" style="border-radius: 5px;"/>{{ $iconType->name }}</label>
                                    </li>
                                @endforeach
                            </ul>
                        </center>
                        <br><br>
                        <b><h1 style="font-size: 20px;">5. Select the shape of your icon</h1></b>
                        <center>
                            <ul class="radio-selector">
                                <li><input type="radio" value="circular" name="shape" id="cb9" required/>
                                <label for="cb9"><img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEiWoNRNlW-MR47JpppKmIWMRZLC22r9qF4gJ_3bSzwErW8zjfaZPiTdBUvoKbGVe9aI-A_03Wz3CchrFpdzOrEX4HuduuibkZNJzJKzT_-FKLBaygQJXevlg-bS-0H5MfAOW7Xv3w1qfo0WJWkxdC-tEIJU-a8-CN9OZDbApU172mBEahyQUQ9dqppHuw/s320/_0a70d50f-bffb-4e97-84c5-f626ee5073b5.jpg" style="border-radius: 5px;"/>circular</label>
                                </li>
                                <li><input type="radio" value="rounded" name="shape" id="cb10" required/>
                                <label for="cb10"><img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEjNgoKJOcFBQ971QK71Hzfyj30cUD4N1dJSh2DbqSn6J3-eNXgmVkWWjsv5Tsv4CakH9fwW6uXtAG2ta1XBP2HbwzSrkBPFssV0VxctYhODH26oTprVInGp7sakVqRwrmhWGiz5IXkyHZH6U0UaUceQDglcXZ_dmCgrq8qE8oOR-zh5NGXZuhsRqHmliA/s320/_dd74a096-0fb7-4d5b-80ee-a1a35191268f.jpg" style="border-radius: 5px;"/>rounded</label>
                                </li>
                                <li><input type="radio" value="square" name="shape" id="cb11" required/>
                                <label for="cb11"><img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEjbWEQPddLf_NrPSc-qxIAK3yBhFcImZ-wRDDnzqXWuOMxkbiLAzC4XuO38H6ZuCRGJA4QGLODTf5HXCiGvNEiq9R6hDsOMEZgQJPdH6d-pSHi2pNCfmw18f8bV4aM83U3A4LBJjdvfyFgTfSg-mTH42D4Srn8NTBg19D97HvbgwPIqHd1iKx1gQLfm_Q/s320/_624ec74f-47c1-47ad-9db6-b6d7412518b9.jpg" style="border-radius: 5px;"/>square</label>
                                </li>
                            </ul>
                        </center>
                        <br><br>
                        <b><h1 style="font-size: 20px;">6. How many images do you want (1 credit per image)</h1></b>
                        <x-text-input id="" class="block mt-1 w-full"
                                type="number"
                                value="1"
                                name="count" required/>
                        <br>
                        <center>
                            <x-primary-button class="ml-4">
                                {{ __('GENERATE ICONS') }}
                            </x-primary-button>
                        </center>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
