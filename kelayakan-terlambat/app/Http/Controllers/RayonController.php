<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rayon;
use App\Models\User;

class RayonController extends Controller
{
    // ... other methods

    /**
     * Show the form for creating a new resource.
     */
    public function index()
    {
        //panggil data yang mau di tampilkan 
        $rayon = Rayon::all();

        //html yang di munculkan di index.balde.php folder rayon, lalu kirim data yang di ambil malalui (isi compact dengan nama variabel)
        return view('rayon.index', compact('rayon'));
    }

   
        // ... other methods
    
    public function create()
    {
        $users = User::all(); // or use your specific query to get users
        return view('rayon.create', compact('users'));
    }

        public function store(Request $request)
        {
            $request->validate([
                'rayon' => 'required|min:3',
                'user_id' => 'required|exists:users,id',
            ]);
    
            rayon::create([
                'rayon' => $request->rayon,
                'user_id' => $request->user_id,
            ]);
            
            return redirect()->back()->with('success', 'Berhasil menambahkan data!');
        }

        public function search(Request $request)
        {
            $searchTerm = $request->input('search');
            $rayon = rayon::where('rayon', 'like', '%' . $searchTerm . '%')->paginate(5);
    
            return view('rayon.index', compact('rayon'));
        }
}
    
    
    



