@extends('layouts.shop')
@section('body')
    <div class="w-full m-6">
        <div class="flex space-x-4">
            <div class="w-60 h-60">
                <canvas id="users-chart"></canvas>
            </div>
            <div class="w-60 h-60">
                <canvas id="revenue-chart"></canvas>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script type="module" >
        const data = {!! $orders_count->toJson() !!};
        const revenue = {!! $revenue->toJson() !!};
        const ctx = document.getElementById('users-chart').getContext('2d');
        const revenuectx = document.getElementById('revenue-chart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: data.map((d) => d.date),
                datasets: [{
                    label: 'Daily Number of Orders',
                    data: data.map((d) => d.count),
                    backgroundColor: 'rgba(99, 102, 241, 0.6)',
                    borderColor: 'rgba(99, 102, 241, 1)',
                    fill: false,

                    borderWidth: 1,
                    cubicInterpolationMode: 'monotone',
                    tension: 0.4
                }, ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                },
                plugins: {
                    legend: {
                        display: true,
                        position: 'top',
                        labels: {
                            font: {
                                size: 12,
                            },
                        },
                    },
                },
            },
        });

        new Chart(revenuectx, {
            type: 'bar',
            data: {
                labels: revenue.map((d) => d.date),
                datasets: [{
                    label: 'Revenue in last 5 days',
                    data: data.map((d) => d.count),
                    backgroundColor: 'rgba(99, 102, 241, 0.6)',
                    borderColor: 'rgba(99, 102, 241, 1)',
                    fill: false,
                    borderWidth: 1,
                    cubicInterpolationMode: 'monotone',
                    tension: 0.4
                }, ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: true,
                        position: 'top',
                        labels: {
                            font: {
                                size: 12,
                            },
                        },
                    },
                },
            },
        });
    </script>
@endsection
