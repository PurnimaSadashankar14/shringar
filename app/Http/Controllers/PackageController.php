<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index()
    {
    // Fetch all packages from the database
    $packages = Package::all();

    // Return the view with the packages data
    return view('package.index', compact('packages'));
}

public function update(Request $request, Package $package)
{
    // Validate the request data
    $data = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'inclusions' => 'required|string',
        'price' => 'required|integer',
        'status' => 'required|string',
        'photopath' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Check if a new photo is uploaded
    if ($request->hasFile('photopath')) {
        $photo = $request->file('photopath');
        $photoname = time() . '.' . $photo->extension();
        $photo->move(public_path('images/packages'), $photoname);

        // Update the photo path in the data array
        $data['photopath'] = $photoname;
    }

    // Update the package with new data
    $package->update($data);

    return redirect()->route('package.index')->with('success', 'Package Updated Successfully');
}



    public function create()
{
    // No need to fetch categories since i am not using them
    return view('package.create');
}

public function edit(Package $package)
{
    return view('package.edit', compact('package'));
}


public function showClientPackages()
{
    // Fetch only the packages with status 'Show'
    $packages = Package::where('status', 'Show')->get();

    // Return the client-side view
    return view('packages.client', compact('packages'));
}


public function bridalPackages()
{
    $packages = Package::where('status', 'Show')->get(); // Adjust the query as needed
    return view('package', compact('packages')); // Use 'package' as the Blade file name
}




    public function show($id)
    {
        $package = Package::findOrFail($id);
        return view('viewpackage', compact('package')); // Corrected view path
    }
    public function store(Request $request)
    {
        // Validate the incoming request data without the category validation
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'inclusions' => 'required|string',
            'price' => 'required|integer',
            'status' => 'required|string',
            'photopath' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $photo = $request->file('photopath');
        $photoname = time() . '.' . $photo->extension();
        $photo->move(public_path('images/packages'), $photoname);
        $data['photopath'] = $photoname;

// Create the package and store the image path

Package::create($data);

    return redirect()->route('package.index')->with('success', 'Package Created Successfully');
}

    public function destroy($id)
    {
        // Find the package by its ID
        $package = Package::find($id);

        // If the package is found
        if ($package) {
            // Get the path of the package image
            $photo = public_path('images/packages/' . $package->photopath);

            // Check if the file exists and delete it
            if (file_exists($photo)) {
                unlink($photo);  // Delete the image
            }

            // Delete the package from the database
            $package->delete();

            // Redirect back to the package index page with a success message
            return redirect()->route('package.index')->with('success', 'Package Deleted Successfully');
        }

        else {
            // If the package is not found, return an error message
            return redirect()->route('package.index')->with('error', 'Package Not Found');
        }
    }


    public function submitBooking(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'skin_type' => 'required|string',
            'booking_date' => 'required|date',
            'booking_time' => 'required|date_format:H:i',
            'comments' => 'nullable|string|max:500',
        ]);

        // Save booking details (you might need a Booking model/table)
        Booking::create([
            'package_id' => $id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'skin_type' => $request->skin_type,
            'booking_date' => $request->booking_date,
            'booking_time' => $request->booking_time,
            'comments' => $request->comments,
        ]);

        // Return a JSON response to indicate success
        return response()->json(['success' => 'Your booking has been successfully submitted!']);
    }



// Add this method to PackageController


    }

