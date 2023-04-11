<?php

namespace App\Http\Controllers;

use App\Models\Pegadaian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

class PegadaianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pegadaians = Pegadaian::orderBy('created_at' , 'DESC')->simplePaginate(2);
        // compact untuk kirim data
        return view("dashboard.index", compact('pegadaians'));    }

        public function data(Request $request)
        {
            $search = $request->search;
            $pegadaians = Pegadaian::where('nama', 'LIKE', '%' . $search . '%')->orderBy('created_at', 'DESC')->get();
            // compact untuk kirim data
            return view("dashboard.data", compact('pegadaians'));
        }

    public function login()
    {
        return view('login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function datapetugas( Request $request)
    {
        // $search = $request->search;  
        $pegadaians = Pegadaian::with('response')->orderBy('created_at', 'DESC')->get();
        // compact untuk kirim data
        return view("dashboard.petugas", compact('pegadaians'));   
     }
        

    public function auth(Request $request)
    {
        $request->validate([
            'email' => 'required|exists:users,email',
            'password' => 'required',
        ],[
            'email.exists' => "This email doesn't exists"
        ]);

        $user = $request->only('email', 'password');
        if (Auth::attempt($user)) {
        if(Auth::user()->role == 'admin'){
            return redirect()->route('data');
        }elseIf(Auth::user()->role == 'petugas'){
            return redirect()->route('data.petugas');
        }
            return redirect()->route('data');
        } else {
            return redirect('/')->with('fail', "Gagal login, periksa dan coba lagi!");
        }
    }

    public function exportpdf(){
        $pegadaians = Pegadaian::with('response')->get()->toArray();

       view()->share('pegadaians', $pegadaians);
        $pdf = PDF::loadview('dashboard.datapegadaian-pdf')->setPaper('a4', 'landscape');
        return $pdf->download('data.pdf');
    }

    public function createpdf($id){
        $pegadaians = Pegadaian::with('response')->get()->toArray();

       view()->share('pegadaians', $pegadaians);
        $pdf = PDF::loadview('dashboard.datapegadaian-pdf',)->setPaper('a4', 'landscape');
        return $pdf->download('data.pdf');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        {
            $request->validate([
                'nama' => 'required|min:3',
                'email' => 'required',
                'age' => 'required',
                'no_tlp' => 'required',
                'item' => 'required',
                'nik' => 'required',
                'foto' => 'required|image|mimes:jpeg,jpg,png,svg',
            ]);
    
            $image = $request->file('foto');
            $imgName = rand(). '.' .  $image->extension();
            $path = public_path('assets/image/');
            $image->move($path, $imgName);
    
            Pegadaian::create([
                'nama' => $request->nama,
                'email' => $request->email,
                'age' => $request->age,
                'no_tlp' => $request->no_tlp,
                'item' => $request->item,
                'nik' => $request->nik,
                'foto' => $imgName,
    
            ]);
    
            return redirect()->back()->with('Succes', 'Berhasil menambahkan data baru!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Pegadaian $pegadaian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pegadaian $pegadaian)
    {
        //
    }

    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pegadaian $pegadaian)
    {
        //
    }

    public function logout()
    { 
        Auth::logout();
        return redirect('/login');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Pegadaian::where('id', $id)->firstOrFail();
        //$data isinya -> nik sampe foto dr pengaduan 
        //hapus foto data dr folder public : path . nama fotonya
        //nama foto nya diambil dari $data yang diatas trs ngambil dari column 'foto'
        $image = public_path('assets/image/'.$data['foto']);
        unlink($image);

        $data->delete();
        return redirect()->back();
}
}
