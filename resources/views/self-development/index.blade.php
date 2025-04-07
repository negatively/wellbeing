@php
    $categories = [
        [
            'name' => 'Health', 
            'icon' => 'heart', 
            'text_color' => 'text-red-500', 
            'bg_color' => 'bg-red-200'
        ],
        [
            'name' => 'Nutrition',
            'icon' => 'apple',
            'text_color' => 'text-green-500',
            'bg_color'=>'bg-green-200'
        ],
        [
            'name' => 'Sleep',
            'icon' => 'moon',
            'text_color' => 'text-blue-500',
            'bg_color'=>'bg-blue-200'
        ],
        [
            'name' => 'Body',
            'icon' => 'activity',
            'text_color' => 'text-purple-500',
            'bg_color'=>'bg-purple-200'
        ],
        [
            'name' => 'Mind',
            'icon' => 'brain',
            'text_color' => 'text-amber-500',
            'bg_color'=>'bg-amber-100'
        ],
        [
            'name' => 'Spirit',
            'icon' => 'sparkles',
            'text_color' => 'text-indigo-500',
            'bg_color'=>'bg-indigo-200'
        ],
    ];
@endphp

<x-app-layout>
    <div class="py-12">
        <div class="max-w-lg mx-auto sm:px-6 lg:px-8">
            <div class="text-center mb-8">
                <h1 class="text-2xl font-bold text-gray-900">Explore By</h1>
            </div>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-6 gap-4">    
                @foreach($categories as $category)
                    <div class="flex flex-col items-center">
                        <a href="#" class="flex flex-col items-center">
                            <div class="bg-gray-100 rounded-full  {{$category['bg_color']}} p-4 mb-2 flex items-center justify-center w-16 h-16 shadow-sm">
                                <x-dynamic-component :component="'lucide-'.$category['icon']" class="w-6 h-6 {{ $category['text_color'] }}" />
                            </div>
                            <span class="text-xs font-medium text-gray-900">{{ $category['name'] }}</span>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
        
    </div>
</x-app-layout>