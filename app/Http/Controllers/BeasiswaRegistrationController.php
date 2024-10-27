<?php

namespace App\Http\Controllers;

use App\Http\Requests\BeasiswaRegistrationRequest;
use App\Models\BeasiswaRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

    class BeasiswaRegistrationController extends Controller
    {
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('beasiswa-registration.index', [
            'beasiswaRegistrations' => BeasiswaRegistration::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('beasiswa-registration.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('beasiswa-registrations.index')->with('error', 'You must be logged in to create a registration.');
        }

        $existingRegistration = BeasiswaRegistration::where('user_id', Auth::id())->first();
        if ($existingRegistration) {
            return redirect()->back()->with('error', 'You have already registered.');
        }
    
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:beasiswa_registrations,email',
            'phone_number' => 'required|numeric',
            'semester' => 'required|integer|between:1,8',
            'jenis_pilihan_beasiswa' => 'required|in:akademik,non-akademik',
            'file' => 'nullable|file|mimes:pdf,jpg,zip|max:2048',
        ]);
    
        $filePath = $request->file('file') ? $request->file('file')->store('uploads') : null;
    
        try {
            $registration = BeasiswaRegistration::create([
                'user_id' => Auth::id(),
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'phone_number' => $validatedData['phone_number'],
                'semester' => $validatedData['semester'],
                'jenis_pilihan_beasiswa' => $validatedData['jenis_pilihan_beasiswa'],
                'file_path' => $filePath,
            ]);
    
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to save registration.');
        }
    
        return redirect()->route('beasiswa-registrations.index')->with('success', 'Registration created successfully.');
    }
    
    

    /**
     * Display the specified resource.
     */
    public function show(BeasiswaRegistration $beasiswaRegistration)
    {
        
    }
    public function view()
    {
        $userId = Auth::id();
        
        $registration = BeasiswaRegistration::where('user_id', $userId)->first();

        return view('beasiswa-registration.view', [
            'registration' => $registration,
            'error' => !$registration ? 'Tidak ditemukan pendaftaran beasiswa.' : null,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BeasiswaRegistration $beasiswaRegistration)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BeasiswaRegistration $beasiswaRegistration)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BeasiswaRegistration $beasiswaRegistration)
    {
        //
    }
}