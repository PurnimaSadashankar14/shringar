<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Booking;
use App\Models\Package;
use App\Models\Service;
use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        // Count of all clients (users with role 'user')
        $totalClients = User::where('role', 'user')->count();

        // Count of all bookings
        $totalAppointments = Booking::count();

        // Count of all services
        $totalServices = Service::count();

        // Count of all packages
        $totalPackages = Package::count();

        // Count of pending bookings
        $pending = Booking::where('status', 'pending')->count();

        // Count of confirmed bookings
        $confirmed = Booking::where('status', 'confirmed')->count();

        // Count of in-progress bookings
        $inProgress = Booking::where('status', 'in_progress')->count();

        // Count of completed bookings
        $completed = Booking::where('status', 'completed')->count();

        // Count of canceled bookings
        $canceled = Booking::where('status', 'canceled')->count();

        // Pass all the variables to the view
        return view('dashboard', compact(
            'totalClients',
            'totalAppointments',
            'totalServices',
            'totalPackages',
            'pending',
            'confirmed',
            'inProgress',
            'completed',
            'canceled'
        ));
    }
}
