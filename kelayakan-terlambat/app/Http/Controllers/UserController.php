<?php

// UserController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;
use App\Models\student;
use App\Models\rombel;
use App\Models\rayon;
use App\Models\lates;

use Carbon\Carbon;

use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    
    public function logout(){
        //menghapus sesion atau login (auth)
        Auth::logout();
        //setelah di hapus di arahkan ke login
        return redirect()->route('login');
    }
    
    public function loginAuth(Request $request)
    {
        //validasi
        $request->validate([
        'email' => 'required',
        'password' => 'required',
        ]);
        //ambil value dari input dan simpan sebuah variable
        $user = $request->only(['email','password']);


        //
        if (Auth::attempt($user)) {
            return redirect('/index');
        }else{
            return redirect()->back()->with('failed', 'Email dan Password tidak sesuai. silahkan coba lagi');
        }
    }
    public function index()
    {
        //panggil data yang mau di tampilkan 
        $user = user::all();

        //html yang di munculkan di index.balde.php folder user, lalu kirim data yang di ambil malalui (isi compact dengan nama variabel)
        return view('user.index', compact('user'));
    }

    public function create()
    {
        return view('user.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required',
            'role' => 'required',
        ]);

        $defaultPassword = substr($request->email, 0, 3) . substr($request->name, 0, 3);

        user::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => bcrypt($defaultPassword)
        ]);

        return redirect()->back()->with('success', 'Berhasil menambahkan data!');
    }
    public function edit($id)
    {
        $user = User::find($id); // Menggunakan Eloquent untuk mencari pengguna berdasarkan ID

        return view('user.edit', compact('user'));
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required',
            'role' => 'required',
        ]);

        $defaultPassword = substr($request->email, 0, 3) . substr($request->name, 0, 3);

        User::where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => bcrypt($defaultPassword),
        ]);

        return redirect()->route('user.index')->with('success', 'Berhasil mengubah data pengguna!');
    }

    public function home()
    {
        $user = Auth::user();
        $rayonId = null;
        if ($user->rayon) {
            $rayonId = $user->rayon->id;
        }

        // Count student from Rayon
        $studentCount = student::where('rayon_id', $rayonId)->count();
        // Count late entries for today
        $todayLates = lates::whereDate('date_time', Carbon::today())->with(['student' => function($query) use ($rayonId) {
            $query->where('rayon_id', $rayonId);
        }])->get();

        $todayLateCount = $todayLates->count();

        return view('index', compact('studentCount', 'todayLateCount'));
    }


}
