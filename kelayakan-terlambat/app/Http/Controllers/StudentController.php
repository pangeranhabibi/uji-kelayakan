<?php

namespace App\Http\Controllers;

use App\Models\student;
use App\Models\rombel;
use App\Models\rayon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $student = student::all();

        //html yang di munculkan di index.balde.php folder student, lalu kirim data yang di ambil malalui (isi compact dengan nama variabel)
        return view('student.admin.index', compact('student'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rayons = Rayon::all();
        $rombels = Rombel::all();

        return view('student.admin.create', compact('rayons', 'rombels'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nis' => 'required|min:3',
            'name' => 'required',
            'rombel_id' => 'required|exists:rombels,id',
            'rayon_id' => 'required|exists:rayons,id',
      ]);

         student::create([
            'nis' => $request->nis,
            'name' => $request->name,
            'rombel_id' => $request->rombel_id,
            'rayon_id' => $request->rayon_id,
        ]);


    return redirect()->back()->with('success', 'Berhasil menambahkan data!');
}

    public function student(){
        $rayon = rayon::where('user_id', Auth::user()->id)->pluck('id');
        $siswa = student::whereIn('rayon_id', $rayon)->get();

        return view('student.ps.student',compact('siswa'));
    }

    
    
    /**
     * Display the specified resource.
     */
    public function show(student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        
    }


    /**
     * Update the specified resource in storage.
     */

     public function update(Request $request)
     {

     }
     
     
     

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
       
    }
}
