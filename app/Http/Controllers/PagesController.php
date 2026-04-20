<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\Service;
use Illuminate\Http\Request;

class PagesController extends Controller
{

    public function index(){

        $packages= Package::where('status','Show')->latest()->limit(3)->get();
        $services= Service::where('status','Show')->latest()->limit(3)->get();

        return view('welcome',compact('packages','services'));

    }

    // public function search(Request $request)
    // {
    //     // Get the search term
    //     $query = $request->input('search');

    //     // Search for packages (or other models) based on the query
    //     $results = Package::where('name', 'like', "%$query%")
    //                     ->orWhere('description', 'like', "%$query%")
    //                     ->get();

    //     // Return results to a view
    //     return view('search-results', compact('results'));
    // }

    public function search(Request $request)
    {
        $query = trim($request->input('query'));

        // Fetch packages where the name or inclusions match the search query
        $packages = Package::where('name', 'LIKE', "%$query%")
                            ->orWhere('inclusions', 'LIKE', "%$query%")
                            ->get();

        // Fetch services where the name or description match the search query
        $services = Service::where('name', 'LIKE', "%$query%")
                            ->orWhere('description', 'LIKE', "%$query%")
                            ->get();

        return view('search', compact('query', 'packages', 'services'));
    }

}
