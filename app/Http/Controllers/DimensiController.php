<?php

namespace App\Http\Controllers;

use App\Models\dimensi;

use Illuminate\Http\Request;

class DimensiController extends Controller
{
    //
    public function index() {
        return view('dimensi', [
            "title" => "Dimensi",
            "dimensi" => dimensi::all()
        ]);
    }

    public function create(Request $request)
    {
        $data = $request->validate([
            'dimensi' => 'required|max:255',
            'bobot' =>  'required|max:255',
        ]);

        if ($data) {
            // memasukan informasi user kedalam database
            dimensi::create($data);
            
            return redirect('/dimensi'
            )->with('success', 'berhasil menambahkan dimensi');

        } 
    }

    public function destroy(dimensi $dimensi)
    {

        dimensi::destroy($dimensi['id']);
        return redirect('/dimensi')->with('success', 'dimensi telah dihapus');
    }

    public function edit(dimensi $dimensi)
    {
        
        return view('/editDimensi', [
            "title" => "Dimensi",
            'dims' => $dimensi,
            'dimensi' => dimensi::all()
        ]);
    }

    public function update(Request $request, dimensi $dimensi)
    {   

        $data = $request->validate([
            'dimensi' => 'required|max:255',
            'bobot' =>  'required|max:255',
        ]);

        dimensi::where('id', $request->id)->update($data);
        return redirect('/dimensi')->with('success', 'berhasil update dimensi');
    }


}
