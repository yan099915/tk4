@extends('layouts.main')

@section('container')
    <div class="my-5">
        <h1 class="my-4 text-center">Jawab Kuesioner</h1>
        
        <table >
            <tbody >
              @foreach ($kuesioner as $kue)
                <tr class="m-2">
                    <td>{{ $kue['id_kuesioner'] }}.</td>
                    <td>{{ $kue['pertanyaan'] }}</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>A. <input " name="pilihan[{{ $kue['id_kuesioner'] }}]" type="radio" value="A"> {{ $kue['pila'] }} </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>B. <input name="pilihan[{{ $kue['id_kuesioner'] }}]" type="radio" value="B"> {{ $kue['pilb'] }}</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>C. <input name="pilihan[{{ $kue['id_kuesioner'] }}]" type="radio" value="C"> {{ $kue['pilc'] }}</td>
                </tr>
                <tr>
                <td>&nbsp;</td>
                    <td>D. <input name="pilihan[{{ $kue['id_kuesioner'] }}]" type="radio" value="D"> {{ $kue['pild'] }}</td>
                </tr>
                <tr>
                <td>&nbsp;</td>
                    <td>E. <input name="pilihan[{{ $kue['id_kuesioner'] }}]" type="radio" value="E"> {{ $kue['pile'] }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
    </div>
@endsection
