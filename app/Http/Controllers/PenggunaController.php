<?php

namespace App\Http\Controllers;
use App\Models\pengguna;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class PenggunaController extends Controller
{
    //
    public function LoginView()
    {   
        // mengembalikan tampilan form login
        return view('login', [
            "title" => "Login",
        ]);

    }

    public function index() {
        return view('pengguna', [
            "title" => "Pengguna",
            "pengguna" => pengguna::all()
        ]);
    }

    public function login() {
        return view('pengguna', [
            "title" => "Pengguna",
            "pengguna" => pengguna::all()
        ]);
    }

    public function create(Request $request)
    {
        $data = $request->validate([
            'username' => 'required|max:255',
            'password' =>  'required|max:255',
            'hak_akses' =>  'required|max:255',
        ]);

        if ($data) {
            // memasukan informasi user kedalam database
            pengguna::create($data);
            
            return redirect('/pengguna'
            )->with('success', 'berhasil menambahkan pengguna');

        } 
    }

    public function edit(pengguna $pengguna)
    {
        
        return view('/editPengguna', [
            "title" => "pengguna",
            'peng' => $pengguna,
            'pengguna' => pengguna::all()
        ]);
    }

    public function update(Request $request, pengguna $pengguna)
    {   

        $data = $request->validate([
            'username' => 'required|max:255',
            'password' =>  'required|max:255',
            'hak_akses' =>  'required|max:255',
        ]);

        pengguna::where('id', $request->id)->update($data);
        return redirect('/pengguna')->with('success', 'berhasil update informasi pengguna');
    }

    public function destroy(pengguna $pengguna)
    {

        pengguna::destroy($pengguna['id']);
        return redirect('/pengguna')->with('success', 'pengguna berhasil dihapus');
    }

    public function authenticate(Request $request)
    {   
        // validasi untuk memastikan bahwa form sudah terisi dan memiliki format email yang sesuai
        $credentials =  $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);
        

        
        // pengkondisian untuk melakukan pengecekan kebenaran password dan email yang di input oleh user
        if (Auth::attempt(['username' => $request['username'], 'password' => $request['password']])) {
            // membuat session baru untuk dapat mengakses halaman dashboard
            $request->session()->regenerate();

            // pindahkan tampilan ke halaman dashboard jika email dan password benar
            return redirect()->intended('/'
                );
        }
        
        // kondisi dimana email dan password tidak sesuai maka akan dikembalikan notifikasi error
        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ])->onlyInput('username');
    }


    public function logout(Request $request)
    {   

        Auth::logout();
 
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
     
        return redirect('/login');
    }
}
