<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTeacherRequest;
use App\Models\TeacherRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TeacherRequestController extends Controller
{

    public function create()
    {
        return view('front.request'); // Halaman form untuk request teacher
    }

    public function index()
    {
        $requests = TeacherRequest::with(['user'])->orderByDesc('id')->get();
        return view('admin.requests.index', compact('requests'));
    }

    public function show(TeacherRequest $teacherRequest)
    {
        
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'cv' => 'required|file|mimes:pdf,doc,docx|max:2048', // hanya izinkan file PDF, DOC, atau DOCX
        ]);

        // Simpan file CV ke storage
        $path = $request->file('cv')->store('cvs');

        // Simpan data request ke database
        TeacherRequest::create([
            'name' => $request->name,
            'email' => $request->email,
            'cv_path' => $path,
            'user_id' => Auth::id(), // Mengaitkan request dengan user yang sedang login
        ]);

        return redirect()->route('front.request')->with('success', 'Your request has been submitted successfully!');
    }

    public function update(Request $request, TeacherRequest $teacherRequest)
    {
        
    }

    public function downloadCV(TeacherRequest $file)
    {
        $filePath = storage_path("app/cvs/{$file->generated_name}");

        if (file_exists($filePath)) {
            return response()->download($filePath, $file->original_name);
        } else {
            abort(404, 'File not found');
        }
    }
    

}
