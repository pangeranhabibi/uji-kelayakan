<?php

namespace App\Http\Controllers;
use PDF;
use Excel;
use App\Models\Lates;
use App\Models\Student;
use App\Models\rayon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Exports\DatatelatExport;
use App\Exports\DatatelatExport1;


class LatesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $lates = Lates::orderBy('id', 'ASC')->get();
        $students = Student::all();

        return view('lates.admin.index', compact('lates', 'students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $students = Student::all();
        return view('lates.admin.create', compact('students'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'siswa' => 'required',
            'date_time' => 'required',
            'information' => 'required|string',
            'bukti' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $buktiPath = $request->file('bukti')->store('public/bukti');
        $request->bukti->move(public_path('uploads'), $buktiPath);
        // dd($request);
        Lates::create([
            'student_id' => $request->siswa,
            'bukti' => basename($buktiPath),
            'date_time' => $request->date_time,
            'information' => $request->information,
        ]);

        return redirect()->route('admin.lates.index')->with('success', 'Berhasil menambahkan data!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $lates = Lates::findOrFail($id);
        return view('lates.admin.edit', compact('lates'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $lates = Lates::findOrFail($id);
        $lates->update($request->all());
        return redirect()->route('admin.lates.index')->with('success', 'Record updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $lates = Lates::findOrFail($id);
        $lates->delete();
        return redirect()->route('admin.lates.index')->with('success', 'Record deleted successfully.');
    }

    public function downloadExcel()
    {
        return Excel::download(new DatatelatExport, 'datatelat.xlsx');
    }

    public function downloadPDF($studentId)
{
    // Ambil data yang akan ditampilkan di PDF
    $lates = student::where('id', $studentId)->with('rayon', 'rombel')->get();
    $totallate = lates::select('student_id')->where('student_id', $studentId)->count();

    // // Periksa apakah data ditemukan
    if (!$lates) {
        // Handle ketika data tidak ditemukan, misalnya redirect atau tampilkan pesan kesalahan
        return redirect()->back()->with('error', 'Data tidak ditemukan.');
    }

    // // Unduh PDF langsung tanpa menampilkan view
    $pdf = PDF::loadView('lates.admin.download', compact('lates', 'totallate'));

    // // Download file PDF dengan nama tertentu
    return $pdf->download('Surat-Pernyataan.pdf');
}

    // app/Http/Controllers/LateController.php

public function show($id)
{
    $lateDetails = Lates::where('student_id', $id)->get();

    return view('lates.admin.show', compact('lateDetails'));
}

public function rekap()
{
    $rayon = rayon::where('user_id', Auth::user()->id)->pluck('id');
    $siswa = student::whereIn('rayon_id', $rayon)->get();
    $lates = Lates::whereIn('student_id', $siswa->pluck('id'))->with('student')->get();

    $groupedLates = $lates->groupBy('student.nis');

    return view('lates.ps.rekap', compact('lates', 'groupedLates', 'siswa'));
}

public function home()
{
    $rayon = rayon::where('user_id', Auth::user()->id)->pluck('id');
    $siswa = student::whereIn('rayon_id', $rayon)->get();
    $lates = Lates::whereIn('student_id', $siswa->pluck('id'))->with('student')->get();

    $groupedLates = $lates->groupBy('student.nis');

    return view('lates.ps.home', compact('lates', 'groupedLates', 'siswa'));
}

public function downloadPDF1($studentId)
{
    // Ambil data yang akan ditampilkan di PDF
    $lates = student::where('id', $studentId)->with('rayon', 'rombel')->get();
    $totallate = lates::select('student_id')->where('student_id', $studentId)->count();

    // // Periksa apakah data ditemukan
    if (!$lates) {
        // Handle ketika data tidak ditemukan, misalnya redirect atau tampilkan pesan kesalahan
        return redirect()->back()->with('error', 'Data tidak ditemukan.');
    }

    // // Unduh PDF langsung tanpa menampilkan view
    $pdf = PDF::loadView('lates.ps.download-pdf', compact('lates', 'totallate'));

    // // Download file PDF dengan nama tertentu
    return $pdf->download('Surat-Pernyataan.pdf');
}

public function downloadExcel1()
{
    return Excel::download(new DatatelatExport1, 'datatelat.xlsx');
}

}

