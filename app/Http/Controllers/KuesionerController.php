<?php

namespace App\Http\Controllers;

use App\Models\kuesioner;
use App\Models\jawaban;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KuesionerController extends Controller
{
    //
    public function homepage() {
       $dimensi_1 = DB::table('jawabans')
       ->join('kuesioners', 'jawabans.id_kuesioner', '=', 'kuesioners.id')
       ->select(DB::raw('count(*) as jumlah, jawaban'))
       ->where('id_dimensi', '=', 1)
       ->groupBy('jawaban')
       ->get();
       $dimensi_2 = DB::table('jawabans')
       ->join('kuesioners', 'jawabans.id_kuesioner', '=', 'kuesioners.id')
       ->select(DB::raw('count(*) as jumlah, jawaban'))
       ->where('id_dimensi', '=', 2)
       ->groupBy('jawaban')
       ->get();
       $dimensi_3 = DB::table('jawabans')
       ->join('kuesioners', 'jawabans.id_kuesioner', '=', 'kuesioners.id')
       ->select(DB::raw('count(*) as jumlah, jawaban'))
       ->where('id_dimensi', '=', 3)
       ->groupBy('jawaban')
       ->get();
       $dimensi_4 = DB::table('jawabans')
       ->join('kuesioners', 'jawabans.id_kuesioner', '=', 'kuesioners.id')
       ->select(DB::raw('count(*) as jumlah, jawaban'))
       ->where('id_dimensi', '=', 4)
       ->groupBy('jawaban')
       ->get();


        $data1 = [];
        $data2 = [];
        $data3 = [];
        $data4 = [];
        foreach($dimensi_1 as $dim1){
            $data1[] = $dim1->jumlah;
        }
        foreach($dimensi_2 as $dim2){
            $data2[] = $dim2->jumlah;
        }
        foreach($dimensi_3 as $dim3){
            $data3[] = $dim3->jumlah;
        }
        foreach($dimensi_4 as $dim4){
            $data4[] = $dim4->jumlah;
        }

        return view('/home', [
            "title" => "Home Page",
            "dimensi_1" => $data1,
            "dimensi_2" => $data2,
            "dimensi_3" => $data3,
            "dimensi_4" => $data4,
        ]);
    }

    public function index() {
        return view('kuesioner', [
            "title" => "Kuesioner",
            "kuesioner" => kuesioner::all()

        ]);
    }

    public function index2() {
        return view('jawaban', [
            "title" => "Jawaban",
            "kuesioner" => kuesioner::all()
        ]);
    }

    public function create(Request $request)
    {
        $data = $request->validate([
            'pertanyaan' => 'required|max:255',
            'id_dimensi' =>  'required|max:255',
            'variabel' =>  'required|max:255',
            'pila' =>  'required|max:255',
            'pilb' =>  'required|max:255',
            'pilc' =>  'required|max:255',
            'pild' =>  'required|max:255',
            'pile' =>  'required|max:255',
        ]);

        if ($data) {
            // memasukan informasi user kedalam database
            kuesioner::create($data);
            
            return redirect('/kuesioner'
            )->with('success', 'berhasil menambahkan pertanyaan');

        } 
    }

    public function destroy(kuesioner $kuesioner)
    {

        kuesioner::destroy($kuesioner['id']);
        return redirect('/kuesioner')->with('success', 'kuesioner berhasil dihapus');
    }

    public function edit(kuesioner $kuesioner)
    {
        
        return view('/editkuesioner', [
            "title" => "kuesioner",
            'kues' => $kuesioner,
            'kuesioner' => kuesioner::all()
        ]);
    }

    public function update(Request $request, kuesioner $kuesioner)
    {   

        $data = $request->validate([
            'pertanyaan' => 'required|max:255',
            'id_dimensi' =>  'required|max:255',
            'variabel' =>  'required|max:255',
            'pila' =>  'required|max:255',
            'pilb' =>  'required|max:255',
            'pilc' =>  'required|max:255',
            'pild' =>  'required|max:255',
            'pile' =>  'required|max:255',
        ]);

        kuesioner::where('id', $request->id)->update($data);
        return redirect('/kuesioner')->with('success', 'berhasil update pertanyaan');
    }

}
