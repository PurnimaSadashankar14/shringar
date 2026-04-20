<?php
namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Package;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail; // This is correct
use Carbon\Carbon;  // <-- This line was missing

class BookingController extends Controller
{
    /**
     * Display a list of all bookings.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $bookings = Booking::with('package', 'service')->get(); // Load related package and service
        return view('booking.index', compact('bookings'));
    }

    /**
     * Show the form for creating a new booking for a specific package or service.
     *
     * @param int $id
     * @param string $type
     * @return \Illuminate\View\View
     */
    public function create($id, $type = null)
    {
        $type = strtolower($type);

        // Determine if it's a package or service and fetch the model accordingly
        if ($type == 'package') {
            $model = Package::findOrFail($id);
        } elseif ($type == 'service') {
            $model = Service::findOrFail($id);
        } else {
            abort(404); // If neither package nor service, return a 404 error
        }

        // Get all available time slots between 6 AM and 6 PM
        $availableSlots = $this->getAvailableTimeSlots($id, $type);

        // Pass the model, available slots, and type to the view
        return view('booking.create', [
            'model' => $model, // Package or Service model
            'type' => $type,   // Type, either 'package' or 'service'
            'id' => $id,       // ID of the package or service
            'availableSlots' => $availableSlots // Available time slots
        ]);
    }

    /**
     * Get available time slots between 6 AM and 6 PM.
     * If a time slot is already booked, remove it from the list.
     */
    private function getAvailableTimeSlots($id, $type)
    {
        // Set the available time range from 6 AM to 6 PM
        $startTime = Carbon::createFromTime(6, 0); // 6 AM
        $endTime = Carbon::createFromTime(18, 0); // 6 PM

        // Initialize the available time slots
        $timeSlots = [];

        // Loop through the time range and add available slots
        while ($startTime <= $endTime) {
            $timeSlots[] = $startTime->format('h:i A');
            $startTime->addMinutes(30); // Add 30-minute slots
        }

        // Check which time slots are already booked
        $bookedSlots = Booking::whereDate('booking_date', Carbon::today())
                              ->pluck('booking_time')
                              ->toArray();

        // Filter out booked slots from the available time slots
        $availableSlots = array_diff($timeSlots, $bookedSlots);

        return $availableSlots;
    }


    /**
     * Store a newly created booking in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @param string $type
     * @return \Illuminate\Http\RedirectResponse
     */



public function store(Request $request, $id, $type)
{
    // Validate the incoming request data
    $validatedData = $request->validate([
        'name'          => 'required|string|max:255',
        'email'         => 'required|email|max:255',
        'phone'         => 'required|string|max:15',
        'skin_type'     => 'required|string|in:Normal,Oily,Dry,Combination,Sensitive',
        'booking_date'  => 'required|date|after_or_equal:today',
        'booking_time'  => 'required',
        'comments'      => 'nullable|string|max:500',
    ]);

    // Trim any whitespace and ensure AM/PM format
    $validatedData['booking_time'] = trim($validatedData['booking_time']);

    // Convert the time to 24-hour format, handling AM/PM properly
    try {
        $validatedData['booking_time'] = Carbon::createFromFormat('h:i A', $validatedData['booking_time'])->format('H:i:s');
    } catch (\Exception $e) {
        return back()->with('error', 'Invalid time format. Please use 12-hour format with AM/PM.');
    }

    // Ensure $type is lowercase to avoid case sensitivity issues
    $type = strtolower($type);

    // Dynamically find the correct model (Package or Service)
    if ($type == 'package') {
        $model = Package::findOrFail($id);
        $bookingData = ['package_id' => $model->id, 'service_id' => null]; // Ensure service_id is null
    } elseif ($type == 'service') {
        $model = Service::findOrFail($id);
        $bookingData = ['service_id' => $model->id, 'package_id' => null]; // Ensure package_id is null
    } else {
        return back()->with('error', 'Invalid booking type or ID not found.');
    }

    // Merge validated data with package_id or service_id
    Booking::create(array_merge($bookingData, [
        'name'          => $validatedData['name'],
        'email'         => $validatedData['email'],
        'phone'         => $validatedData['phone'],
        'skin_type'     => $validatedData['skin_type'],
        'booking_date'  => $validatedData['booking_date'],
        'booking_time'  => $validatedData['booking_time'],
        'comments'      => $validatedData['comments'] ?? null,
    ]));

    // Redirect to the user dashboard or confirmation page instead of admin panel
    return redirect()->route('home')->with('success', 'Booking created successfully!');
}



    /**
     * Display the specified booking details.
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $booking = Booking::with('package', 'service')->findOrFail($id); // Load package and service
        return view('booking.show', compact('booking'));
    }

    /**
     * Show the form for editing the specified booking.
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $booking = Booking::findOrFail($id);
        $packages = Package::all(); // Retrieve all packages for selection
        $services = Service::all(); // Retrieve all services for selection
        return view('booking.edit', compact('booking', 'packages', 'services'));
    }

    /**
     * Update the specified booking in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);

        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:15',
            'skin_type' => 'required|string|in:Normal,Oily,Dry,Combination,Sensitive',
            'booking_date' => 'required|date|after_or_equal:today',
            'booking_time' => 'required',
            'comments' => 'nullable|string|max:500',
        ]);

        // Update the booking details
        $booking->update($validatedData);

        return redirect()->route('booking.index')->with('success', 'Booking updated successfully!');
    }

    /**
     * Remove the specified booking from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();

        return redirect()->route('booking.index')->with('success', 'Booking deleted successfully!');
    }

    /**
     * Update the status of a booking and notify the user.
     *
     * @param int $id
     * @param string $status
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateStatus(Request $request, $id)
{
    $booking = Booking::find($id);
    if ($booking) {
        // Get the status from the form
        $status = $request->input('status'); // Get the status from the form input

        // Update the booking status
        $booking->status = $status;
        $booking->save();

        // Prepare email data
        $data = [
            'name' => $booking->name,
            'status' => $status,
            'booking_date' => $booking->booking_date,
            'booking_time' => $booking->booking_time,
        ];

        // Define the subject and email content based on the status
        $subject = '';
        $view = '';

        switch ($status) {
            case 'confirmed':
                $subject = 'Your Booking is Confirmed!';
                $view = 'mail.booking_confirmed';
                break;
            case 'in_progress':
                $subject = 'Your Booking is Now In Progress';
                $view = 'mail.booking_in_progress';
                break;
            case 'completed':
                $subject = 'Your Booking is Completed';
                $view = 'mail.booking_completed';
                break;
            case 'canceled':
                $subject = 'Your Booking has been Canceled';
                $view = 'mail.booking_canceled';
                break;
            default:
                $subject = 'Booking Status Update';
                $view = 'mail.booking_status';
                break;
        }

        // Send the email notification
        Mail::send($view, $data, function ($message) use ($booking, $subject) {
            $message->to($booking->email, $booking->name)
                    ->subject($subject);
        });

        // Redirect with success message
        return redirect()->route('booking.index')->with('success', 'Booking status updated to ' . ucfirst($status));
    } else {
        return redirect()->route('booking.index')->with('error', 'Booking not found.');
    }
}



public function getAvailableSlots(Request $request)
{
    $date = $request->input('date');

    // Define available slots (From 6 AM to 6 PM)
    $allSlots = [
        '06:00 AM', '07:00 AM', '08:00 AM', '09:00 AM', '10:00 AM',
        '11:00 AM', '12:00 PM', '01:00 PM', '02:00 PM', '03:00 PM',
        '04:00 PM', '05:00 PM', '06:00 PM'
    ];

    // Fetch booked slots from the database for the selected date
    $bookedSlots = Booking::where('booking_date', $date)
                          ->where('status', '!=', 'completed') // Only block active bookings
                          ->pluck('booking_time')
                          ->toArray();

    // Filter out booked slots
    $availableSlots = array_diff($allSlots, $bookedSlots);

    return response()->json(array_values($availableSlots));
}

}
?>
