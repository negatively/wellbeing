@php
    $moodOptions = [
        1 => ['text' => 'Sangat Buruk', 'icon' => 'lucide-angry', 'bg' => 'fill-red-300', 'text-color' => 'text-red-600'],
        2 => ['text' => 'Agak Buruk', 'icon' => 'lucide-frown', 'bg' => 'fill-purple-300', 'text-color' => 'text-purple-600'],
        3 => ['text' => 'Okay', 'icon' => 'lucide-meh', 'bg' => 'fill-blue-300', 'text-color' => 'text-blue-600'],
        4 => ['text' => 'Cukup Bagus', 'icon' => 'lucide-smile', 'bg' => 'fill-cyan-300', 'text-color' => 'text-cyan-600'],
        5 => ['text' => 'Luar Biasa', 'icon' => 'lucide-laugh', 'bg' => 'fill-green-300', 'text-color' => 'text-green-600']
    ];
@endphp

<x-app-layout>
    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="p-6">
                    <!-- Header with Add Button -->
                    <div class="sm:flex sm:items-center mb-6">
                        <div class="sm:flex-auto">
                            <h1 class="text-base font-semibold leading-6 text-gray-900">{{ __('Mood Statistics') }}</h1>
                            <p class="mt-2 text-sm text-gray-700">A list of the {{ __('Moods') }}.</p>
                        </div>
                        <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                            <a type="button" href="{{ route('moods.create') }}" class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Add new</a>
                        </div>
                    </div>

                    <!-- Period Selection Tabs -->
                    <div class="border-b border-gray-200 mb-6">
                        <nav class="-mb-px flex">
                            @foreach(['day', 'week', 'month', 'year'] as $tab)
                                <a href="{{ route('moods.index', ['period' => $tab]) }}" 
                                   class="{{ $period === $tab ? 'border-b-2 border-purple-500 text-purple-500' : 'text-gray-500 hover:text-gray-700' }} px-8 py-3 font-medium text-sm uppercase">
                                    {{ $tab }}
                                </a>
                            @endforeach
                        </nav>
                    </div>

                    <!-- Latest Mood Entry Card (if exists) -->
                    @if($moods->isNotEmpty())
                        @foreach ($moods as $mood )
                            
                        <div class="bg-white border border-gray-100 rounded-lg p-5 mb-6">
                            <div class="flex justify-between">
                                <div class="text-sm text-purple-500 mb-3 font-bold">My mood</div>
                                <div class="text-sm text-gray-500 mb-3">{{ $mood->date->format('F j, Y') }}</div>
                            </div>
                            <div class="flex items-center mb-4">
                                <!-- Mood Rating Circle with Dynamic Icon -->
                                <div class="flex items-center justify-center w-10 h-10 rounded-full font-medium mr-4">
                                    <x-dynamic-component :component="$moodOptions[$mood->mood]['icon']" class="w-8 h-8 {{ $moodOptions[$mood->mood]['bg'] }}" stroke-width="1"/>
                                </div>
                                
                                <!-- Emotion Tags -->
                                @foreach($mood->emotion as $emotion)
                                    <span class="bg-gray-100 text-gray-700 px-4 py-1 rounded-full text-sm mr-2">
                                        {{ $emotion }}
                                    </span>
                                @endforeach
                            </div>
                            
                            <!-- Mood Description -->
                            @if($mood->mood_description)
                                <p class="text-gray-700">{{ $mood->mood_description }}</p>
                            @endif
                        </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>