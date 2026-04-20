@extends('layouts.app')

@section('content')

<h1 class="text-4xl font-bold text-pink-600">Dashboard</h1>
<hr class="h-1 bg-pink-300">

<div class="mt-5 grid grid-cols-3 gap-8">
    <!-- Total Clients -->
    <div class="bg-yellow-100 p-10 shadow-md rounded-lg flex items-center">
        <i class="ri-user-2-fill text-4xl text-purple-900 mr-3"></i>
        <div>
            <h2 class="text-2xl font-bold text-purple-900">Clients</h2>
            <p class="text-lg font-semibold text-gray-600">Total: {{ $totalClients }}</p>
        </div>
    </div>

    <!-- Total Appointments -->
    <div class="bg-blue-100 p-10 shadow-md rounded-lg flex items-center">
        <i class="ri-book-open-line text-4xl text-blue-900 mr-3"></i>
        <div>
            <h2 class="text-2xl font-bold text-blue-900">Appointments</h2>
            <p class="text-lg font-semibold text-gray-600">Total: {{ $totalAppointments }}</p>
        </div>
    </div>

    <!-- Total Services -->
    <div class="bg-purple-100 p-10 shadow-md rounded-lg flex items-center">
        <i class="ri-service-fill text-4xl text-pink-600 mr-3"></i>
        <div>
            <h2 class="text-2xl font-bold text-pink-600">Services</h2>
            <p class="text-lg font-semibold text-gray-600">Total: {{ $totalServices }}</p>
        </div>
    </div>

    <div class="bg-purple-100 p-10 shadow-md rounded-lg flex items-center">
        <i class="ri-service-fill text-4xl text-pink-600 mr-3"></i>
        <div>
            <h2 class="text-2xl font-bold text-pink-600">Packages</h2>
            <p class="text-lg font-semibold text-gray-600">Total: {{ $totalPackages }}</p>
        </div>
    </div>
</div>

<!-- Required chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Chart Container (Adjusted to a larger size) -->
<canvas id="myChart" class="w-full h-64 mt-10"></canvas>

<script>
    // Data passed from the controller (booking data)
    const data = {
        labels: ["Pending", "Confirmed", "In Progress", "Completed", "Canceled"],  // Updated labels for the chart
        datasets: [{
            label: "Booking Status",  // Label for the dataset
            data: [{{$pending}}, {{$confirmed}}, {{$inProgress}}, {{$completed}}, {{$canceled}}],  // Updated data passed from the controller
            backgroundColor: [
                "rgba(90, 50, 241, 0.7)",  // Color for Pending
                "rgba(101, 143, 200, 0.7)",  // Color for Confirmed
                "rgba(255, 165, 0, 0.7)",  // Color for In Progress (Orange)
                "rgba(0, 200, 20, 0.7)",  // Color for Completed
                "rgba(255, 99, 132, 0.7)",  // Color for Canceled (Red)
            ],
            borderColor: [
                "rgba(90, 50, 241, 1)",  // Border color for Pending
                "rgba(101, 143, 200, 1)",  // Border color for Confirmed
                "rgba(255, 165, 0, 1)",  // Border color for In Progress
                "rgba(0, 200, 20, 1)",  // Border color for Completed
                "rgba(255, 99, 132, 1)",  // Border color for Canceled
            ],
            borderWidth: 2,  // Border width for each bar
            barThickness: 50,  // Adjust the thickness of the bars
        }],
    };

    const configBar = {
        type: "bar",  // Bar chart type
        data: data,
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,  // Start the y-axis at 0
                    ticks: {
                        stepSize: 1,  // Adjust the steps on the y-axis
                        font: {
                            size: 14,  // Font size for y-axis labels
                            family: 'Arial, sans-serif',  // Font family for y-axis labels
                        },
                    },
                },
                x: {
                    ticks: {
                        font: {
                            size: 14,  // Font size for x-axis labels
                            family: 'Arial, sans-serif',  // Font family for x-axis labels
                        },
                    },
                },
            },
            plugins: {
                legend: {
                    position: 'top',  // Legend position
                    labels: {
                        font: {
                            size: 16,  // Font size for legend labels
                            family: 'Arial, sans-serif',  // Font family for legend labels
                        },
                    },
                },
                tooltip: {
                    callbacks: {
                        label: function(tooltipItem) {
                            return tooltipItem.label + ': ' + tooltipItem.raw;
                        }
                    }
                }
            }
        },
    };

    // Initialize the chart
    var chartBar = new Chart(document.getElementById("myChart"), configBar);
</script>

@endsection
