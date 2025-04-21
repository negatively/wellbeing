<x-app-layout>
    <div class="py-12">
        <div class="max-w-lg mx-auto sm:px-6 lg:px-8">
            <div class="text-center mb-8">
                <h1 class="text-2xl font-bold text-gray-900">Welcome back! 👋</h1>
            </div>

            <div class="flex justify-center space-x-6 mb-12">
                <!-- Mood Button -->
                <div class="text-center">
                    <a href="{{ route('moods.index') }}" class="inline-block">
                        <div class="w-16 h-16 rounded-2xl bg-purple-400 flex items-center justify-center mb-2">
                            <x-lucide-sun class="h-8 w-8 text-white" />
                        </div>
                        <span class="text-sm font-medium text-gray-800">Mood</span>
                    </a>
                </div>

                <!-- Life Balance Button -->
                <div class="text-center">
                    <a href="{{ route('life-balances.index') }}" class="inline-block">
                        <div class="w-16 h-16 rounded-2xl bg-red-400 flex items-center justify-center mb-2">
                            <x-lucide-scale class="h-8 w-8 text-white" />
                        </div>
                        <span class="text-sm font-medium text-gray-800">Life Balance</span>
                    </a>
                </div>
            </div>

            <div class="bg-gray-50 rounded-lg shadow-sm p-6 text-center">
                <div class="flex justify-center mb-4">
                    <img src="{{ asset('cards.png') }}" alt="Journal cards" class="h-48" />
                </div>
                <h2 class="text-lg font-bold text-gray-900 mb-1">Start building your dreams</h2>
                <p class="text-sm text-gray-600 mb-2">🎉</p>
                <p class="text-sm text-gray-500">Begin your journey by setting<br>your first goal!</p>
            </div>
        </div>
    </div>
</x-app-layout>