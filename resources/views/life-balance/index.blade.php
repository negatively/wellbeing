<x-app-layout>
    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="w-full">
                    <div class="sm:flex sm:items-center">
                        <div class="sm:flex-auto">
                            <h1 class="text-base font-semibold leading-6 text-gray-900">{{ __('Life Balances') }}</h1>
                            <p class="mt-2 text-sm text-gray-700">A list of all the {{ __('Life Balances') }}.</p>
                        </div>
                        <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                            <a type="button" href="{{ route('life-balances.create') }}"
                                class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Add
                                new</a>
                        </div>
                    </div>

                    <div class="mb-8 flex flex-col lg:flex-row">
                        <div class="w-full lg:w-5/12">
                            <canvas id="polarChart"></canvas>
                        </div>
                        <div class="flex-1">
                            <h1 class="text-xl font-semibold">Show Yesterday</h1>
                        </div>
                    </div>

                    <!-- Weekly Life Balance Chart -->
                    <div class="mb-4">
                        <h3 class="text-sm font-medium text-gray-700 mb-2">Weekly Life Balance</h3>
                        <canvas id="balanceChart" height="180"></canvas>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const colors = {
        red: '#FF5A5A',
        orange: '#FF9A5A',
        yellow: '#FFDE59',
        lightGreen: '#A8E65B',
        teal: '#5AE6D8',
        lightBlue: '#5AC8FF',
        purple: '#B85AFF',
        pink: '#FF5AB8'
    };
    const ctx = document.getElementById('polarChart').getContext('2d');
    const polarChart = new Chart(ctx, {
        type: 'polarArea', // Change to your desired chart type
        data: {
            labels: ['Relationship', 'Health & Fitness', 'Career & Education', 'Personal Development', 'Family',
                'Friends & Social Life', 'Fun & Recreation', 'Finances'
            ], // Replace with your labels
            datasets: [{
                label: 'Life Balance',
                data: [4, 4, 5, 6, 7, 1, 2, 3], // Replace with your data
                backgroundColor: [colors.red, colors.orange, colors.yellow, colors.lightGreen, colors
                    .teal, colors.lightBlue, colors.purple
                ], // Replace with your colors
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'right',
                },
            },
            scales: {
                r: {
                    min: 0,
                    max: 10
                }
            }
        }

    });

    // Balance chart (line chart)
    const balanceCtx = document.getElementById('balanceChart').getContext('2d');
    const balanceChart = new Chart(balanceCtx, {
        type: 'line',
        data: {
            labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
            datasets: [{
                    label: 'Work Hours',
                    data: [9, 8.5, 10, 7, 8, 4, 3],
                    borderColor: colors.red,
                    tension: 0.3,
                    pointBackgroundColor: colors.red
                },
                {
                    label: 'Rest Hours',
                    data: [6, 5.5, 4, 7, 6, 8, 10],
                    borderColor: colors.teal,
                    tension: 0.3,
                    pointBackgroundColor: colors.teal
                }
            ]
        },
        options: {
            scales: {
                y: {
                    min: 0,
                    max: 12,
                    ticks: {
                        stepSize: 3
                    }
                },
                x: {
                    grid: {
                        display: true,
                        color: 'rgba(180, 180, 180, 0.2)'
                    }
                }
            },
            plugins: {
                legend: {
                    position: 'bottom',
                },
            },
            aspectRatio: 3,
        }
    });
</script>
