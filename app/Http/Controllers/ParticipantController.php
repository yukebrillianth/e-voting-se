<?php

namespace App\Http\Controllers;

use App\Models\kelas;
use App\Models\Participant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class ParticipantController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->setting();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role != 'super admin') {
            return abort(404);
        }
        $data = Participant::all();

        return view('dashboard.peserta.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->role != 'super admin') {
            return abort(404);
        }
        $data = kelas::all();

        return view('dashboard.peserta.add', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::user()->role != 'super admin') {
            return abort(404);
        }

        $validatedData = $request->validate(
            [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'class_id' => ['required'],
            ],
            [
                'name.required' => 'Nama Harus diisi!',
                'class_id.required' => 'Kelas Harus diisi!',
            ]
        );

        Participant::create([
            'name' => $validatedData["name"],
            'email' => $validatedData["email"],
            'password' => Hash::make($validatedData["password"]),
            'has_voted' => false,
            'class_id' => $validatedData["class_id"],
        ]);

        User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData["password"]),
        ]);


        Alert::success('Data Berhasil Ditambahkan!');
        return redirect()->route('peserta');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Participant  $Participant
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Participant  $Participant
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::user()->role != 'super admin') {
            return abort(404);
        }
        $class = kelas::all();
        $data = Participant::where('id', $id)->first();

        return view('dashboard.peserta.edit', compact('data', 'class'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Participant  $Participant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Participant  $Participant
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::user()->role != 'super admin') {
            return abort(404);
        }

        $data = Participant::findOrfail($id);
        $data->delete();

        Alert::success('Data Berhasil Dihapus!');
        return redirect()->route('peserta');
    }

    public function deleteAll()
    {
        if (Auth::user()->role != 'super admin') {
            return abort(404);
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        User::where('role', '!=', 'super admin')->delete();
        Participant::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        Alert::success('Data berhasil dihapus!');
        return redirect()->back();
    }
}
