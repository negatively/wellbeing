<div class="space-y-6">
    
    <div>
        <x-input-label for="date" :value="__('Tanggal')"/>
        <x-text-input id="date" name="date" type="date" class="mt-1 block w-full" :value="old('date', $wellbeing?->date)" autocomplete="date" placeholder="Date"/>
        <x-input-error class="mt-2" :messages="$errors->get('date')"/>
    </div>

    <div>
        <x-input-label for="mood" :value="__('Bagaimana perasaanmu hari ini?')" class="text-lg font-medium mb-4" />
        
        <div class="flex justify-left space-x-4">
            @php
                $moodOptions = [
                    1 => ['text' => 'Sangat Buruk', 'icon' => 'lucide-angry', 'bg' => 'bg-red-300', 'text-color' => 'text-red-600'],
                    2 => ['text' => 'Agak Buruk', 'icon' => 'lucide-frown', 'bg' => 'bg-purple-300', 'text-color' => 'text-purple-600'],
                    3 => ['text' => 'Okay', 'icon' => 'lucide-meh', 'bg' => 'bg-blue-300', 'text-color' => 'text-blue-600'],
                    4 => ['text' => 'Cukup Bagus', 'icon' => 'lucide-smile', 'bg' => 'bg-cyan-300', 'text-color' => 'text-cyan-600'],
                    5 => ['text' => 'Luar Biasa', 'icon' => 'lucide-laugh', 'bg' => 'bg-green-300', 'text-color' => 'text-green-600']
                ];
            @endphp
            
            @foreach($moodOptions as $value => $option)
            <label class="flex flex-col items-center cursor-pointer">
                <input type="radio" name="mood" value="{{ $value }}" class="hidden peer" required
                    {{ (old('mood', $wellbeing?->mood) == $value) ? 'checked' : '' }}>
                <div class="w-16 h-16 rounded-full {{ $option['bg'] }} flex items-center justify-center peer-checked:ring-4 peer-checked:ring-blue-400">
                
                    <x-dynamic-component
                        :component="$option['icon']"
                        class="w-10 h-10"
                        stroke-width="1.5"
                    />
                </div>
                <span class="mt-2 text-sm text-center">{{ $option['text'] }}</span>
            </label>
            @endforeach
        </div>
        <x-input-error class="mt-2 text-center" :messages="$errors->get('mood')" />
    </div>

    <div>
        <x-input-label for="emotion" :value="__('Pilih emosi yang cocok denganmu hari ini?')" class="text-lg font-medium mb-4" />
        
        <div class="grid grid-cols-3 md:grid-cols-5 gap-2">
            @php
            $emotions = [
                'confused', 'tired', 'ashamed', 'beautiful', 'proud', 'disgusted', 'spiteful', 'loved', 'angry',
                'disappointed', 'exhausted', 'guilty', 'surprised', 'calm', 'inspired', 'secure', 'confident', 'optimistic',
                'mindful', 'worried', 'stressed', 'depressed', 'hesitant', 'content', 'embarrassed', 'upbeat', 'demoralized',
                'afraid', 'frustrated', 'grateful', 'neutral', 'pressured', 'relaxed', 'lucky', 'passionate', 'humorous',
                'anxious', 'unhappy', 'excited', 'relieved', 'eager', 'sad', 'self-conscious', 'panicked', 'egoistical',
                'motivated', 'bored', 'annoyed', 'happy', 'lonely', 'engaged', 'jealous', 'ecstatic'
            ];
            $selectedEmotions = old('emotion', $wellbeing?->emotions ?? []);
            @endphp
            
            @foreach ($emotions as $emotion)
            <label class="bg-gray-100 rounded-md p-2 text-center text-sm cursor-pointer hover:bg-gray-200 transition-colors 
                {{ in_array($emotion, $selectedEmotions) ? 'bg-amber-200' : '' }}">
                <input type="checkbox" name="emotion[]" value="{{ $emotion }}" class="hidden emotion-checkbox"
                    {{ in_array($emotion, $selectedEmotions) ? 'checked' : '' }}>
                <span>{{ ucfirst($emotion) }}</span>
            </label>
            @endforeach
        </div>
        <x-input-error class="mt-2" :messages="$errors->get('emotion')" />
    </div>

    <div>
        <x-input-label for="mood_description" :value="__('Mood Description')"/>
        <x-text-input id="mood_description" name="mood_description" type="text" class="mt-1 block w-full" :value="old('mood_description', $wellbeing?->mood_description)" autocomplete="mood_description" placeholder="Mood Description"/>
        <x-input-error class="mt-2" :messages="$errors->get('mood_description')"/>
    </div>

    <div class="flex items-center gap-4">
        <x-primary-button>Submit</x-primary-button>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
          const emotionCheckboxes = document.querySelectorAll('.emotion-checkbox');
          emotionCheckboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function() {
              const label = this.closest('label');
              if (this.checked) {
                label.classList.add('bg-amber-200');
                label.classList.remove('bg-gray-100');
              } else {
                label.classList.remove('bg-amber-200');
                label.classList.add('bg-gray-100');
              }
            });
          });
        });
      </script>
</div>