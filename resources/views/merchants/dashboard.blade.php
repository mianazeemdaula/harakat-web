@extends('layouts.shop')
@section('body')
    <div class="w-full m-6">
        <canvas id="users-chart"></canvas>
    </div>
@endsection

@section('js')
    <script type="module" >
        const data = [{
                date: '2022-01-01',
                count: 10
            },
            {
                date: '2022-01-02',
                count: 15
            },
            {
                date: '2022-01-03',
                count: 20
            },
            {
                date: '2022-01-04',
                count: 25
            },
            {
                date: '2022-01-05',
                count: 30
            },
        ];

        const ctx = document.getElementById('users-chart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: data.map((d) => d.date),
                datasets: [{
                    label: 'Daily Number of Users',
                    data: data.map((d) => d.count),
                    backgroundColor: 'rgba(99, 102, 241, 0.6)',
                    borderColor: 'rgba(99, 102, 241, 1)',
                    borderWidth: 1,
                }, ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            precision: 0,
                        },
                    }, ],
                },
                plugins: {
                    legend: {
                        display: true,
                        position: 'top',
                        labels: {
                            font: {
                                size: 16,
                            },
                        },
                    },
                },
            },
        });
    </script>
@endsection
