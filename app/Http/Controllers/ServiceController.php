<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
      //fetch all services from the database
        $services = Service::all();

     // Return the view with the services data
        return view('service.index', compact('services'));
    }


    public function create()
    {
 return view('service.create');
    }


    public function store(Request $request)
    {
        // Validate the incoming request data without the category validation
        $data=$request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|integer',
            'status' => 'required|string',
            'photopath' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        // Handle image upload
        $photo = $request->file('photopath');
        $photoname = time() . '.' . $photo->extension();
        $photo->move(public_path('images/services'), $photoname);
        $data['photopath'] = $photoname;


Service::create([
    'name' => $request->input('name'),
    'description' => $request->input('description'),
    'price' => $request->input('price'),
    'status' => $request->input('status'),
    'photopath' => 'images/' . $request->file('photopath')->getClientOriginalName(), // Store the relative path
]);

return redirect()->route('service.index')->with('success', 'Service Created Successfully');
}
public function edit(Service $service)
{
    return view('service.edit', compact('service'));
}

public function update(Request $request, Service $service)
{
    $data = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|integer',
        'status' => 'required|string',
        'photopath' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $photo = $request->file('photopath');
        $photoname = time() . '.' . $photo->extension();
        $photo->move(public_path('images/services'), $photoname);
        $data['photopath'] = $photoname;


    // Update the package with new data
    $service->update($data);

    return redirect()->route('service.index')->with('success', 'Service Updated Successfully');
}


public function show($id){
    $service= Service::findOrFail($id);
    return view('viewservice', compact('service')); // Corrected view path
}


public function destroy($id)
    {
        // Find the package by its ID
        $service = Service::find($id);

        // If the package is found
        if ($service) {
            // Get the path of the package image
            $photo = public_path('images/services/' . $service->photopath);

            // Check if the file exists and delete it
            if (file_exists($photo)) {
                unlink($photo);  // Delete the image
            }

            // Delete the package from the database
            $service->delete();

            // Redirect back to the package index page with a success message
            return redirect()->route('service.index')->with('success', 'Service Deleted Successfully');
        }

        else {
            // If the package is not found, return an error message
            return redirect()->route('service.index')->with('error', 'Service Not Found');
        }
    }

    public function showServices()
{
    $services = Service::all(); // Retrieve all services from the database
    return view('service', compact('services')); // Pass data to the `service.blade.php` view
}



}
