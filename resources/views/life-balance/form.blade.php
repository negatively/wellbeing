@php
    $lifeAreas = [
        [
            'label' => 'Relationship',
            'icon' => 'lucide-heart',
            'color' => 'text-red-500',
            'value' => 0,
            'name' => 'relationship',
        ],
        [
            'label' => 'Health & Fitness',
            'icon' => 'lucide-activity',
            'color' => 'text-blue-500',
            'value' => 0,
            'name' => 'health',
        ],
        [
            'label' => 'Career & Education',
            'icon' => 'lucide-briefcase',
            'color' => 'text-purple-500',
            'value' => 0,
            'name' => 'career',
        ],
        [
            'label' => 'Personal Development',
            'icon' => 'lucide-brain',
            'color' => 'text-green-500',
            'value' => 0,
            'name' => 'personal_dev',
        ],
        [
            'label' => 'Family',
            'icon' => 'lucide-home',
            'color' => 'text-yellow-500',
            'value' => 0,
            'name' => 'family',
        ],
        [
            'label' => 'Friends & Social Life',
            'icon' => 'lucide-users',
            'color' => 'text-orange-500',
            'value' => 0,
            'name' => 'friends',
        ],
        [
            'label' => 'Fun & Recreation',
            'icon' => 'lucide-music',
            'color' => 'text-purple-500',
            'value' => 0,
            'name' => 'fun',
        ],
        [
            'label' => 'Finances',
            'icon' => 'lucide-dollar-sign',
            'color' => 'text-green-500',
            'value' => 0,
            'name' => 'finances',
        ],
    ];

@endphp

<div class="mx-auto bg-white rounded-lg">
    <h1 class="text-2xl font-bold text-gray-800 mb-4">Life Assessments</h1>

    <div class="flex items-center gap-2 mb-2">
        <x-lucide-sprout class="text-green-500 w-5 h-5" />
        <p class="text-sm font-medium">Seberapa Seimbang Hidupmu Saat Ini?</p>
    </div>

    <div class="flex items-center gap-2 mb-4">
        <x-lucide-sparkle class="text-yellow-500 w-5 h-5" />
        <p class="text-sm">Skala 1-10, sesederhana itu untuk mengenali diri sendiri lebih dalam.</p>
    </div>

    <p class="text-sm mb-6">Isi pilihan di bawah dan mulai refleksimu sekarang! <span class="text-yellow-500">👈</span>
    </p>

    <div class="mb-8">
        <h2 class="text-lg font-semibold mb-2">Daily Life Balance</h2>
        <div class="w-full bg-gray-200 rounded-full h-2.5 mb-1">
            <div class="bg-blue-900 h-2.5 rounded-full" style="width: 30%"></div>
        </div>
        <p class="text-xs text-gray-600">Balance Score: 30%</p>
    </div>

    <div class="space-y-6">
        <!-- Work Hours -->
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">
                Work Hours: <span id="work-hours-value">0</span>
            </label>
            <input type="range" min="0" max="12" value="0" name="work"
                class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer"
                oninput="document.getElementById('work-hours-value').textContent = this.value">
        </div>

        <!-- Rest Hours -->
        <div class="mb-6">
            <label class="block text-sm font-medium mb-1">
                Rest Hours: <span id="rest-hours-value">0</span>
            </label>
            <input type="range" min="0" max="12" value="0" name="rest"
                class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer"
                oninput="document.getElementById('rest-hours-value').textContent = this.value">
        </div>

        <!-- Life Areas Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            @foreach ($lifeAreas as $area)
                <div class="border border-gray-200 rounded-lg p-4">
                    <div class="flex justify-between mb-2">
                        <div class="flex items-center gap-2">
                            <x-dynamic-component :component="$area['icon']" class="{{ $area['color'] }} w-5 h-5 mr-3' }}" />
                            <label class="text-sm font-medium">{{ $area['label'] }}</label>
                        </div>
                        <span class="text-xs text-red-500"
                            id="{{ Str::slug($area['name'], '-') }}-value">{{ $area['value'] }}/10</span>
                    </div>
                    <input type="range" min="0" max="10" name="{{ $area['name'] }}"
                        value="{{ $area['value'] }}"
                        class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer"
                        oninput="document.getElementById('{{ Str::slug($area['name'], '-') }}-value').textContent = this.value + '/10'">
                </div>
            @endforeach
        </div>
    </div>

    <div class="flex items-center gap-4 mt-8">
        <x-primary-button>Submit</x-primary-button>
    </div>
</div>
