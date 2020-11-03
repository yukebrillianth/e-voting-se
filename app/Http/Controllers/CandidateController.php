<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\kelas;
use Dotenv\Validator;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CandidateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->setting();
    }

    public function index()
    {
        if (Auth::user()->role != 'super admin' && 'pengawas') {
            return abort(404);
        }
        return view('dashboard.kandidat.index');
    }

    public function add()
    {
        $data = kelas::all();
        return view('dashboard.kandidat.add', compact('data'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_kandidat' => 'required|max:45|alpha|min:4',
            'kelas' => 'required',
            'visi' => 'required|min:20|max:600|',
            'misi' => 'required|min:20|max:600|',
            'image' => 'required|max:4000|mimes:png,jpg,jpeg',
        ]);

        if ($validatedData['file']['image']) {
            $image = $validatedData['file']['image']->store('candidate_image', 'public');
        } else {
            $image = null;
        }

        Candidate::insert([
            'nama_kandidat' => $request->nama_kandidat,
            'visi' => $request->get('visi'),
            'misi' => $request->get('misi'),
            'image' => $image,
            'class_id' => $request->get('class_id')
        ]);

        return redirect()->route('kandidat')->with('status', 'Data berhasil ditambahkan!');
    }
}
