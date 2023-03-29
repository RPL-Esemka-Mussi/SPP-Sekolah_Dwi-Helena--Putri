<?php

namespace App\Http\Controllers;
use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
       $kelas = Kelas::all();

        return view('kelas.index', compact('kelas'));
    }

    public function tambah()
    {
        return view('kelas.tambah');
    }

    public function simpan(Request $request)
    {
        try {
         
           Kelas::create([
            'kelas'=> $request->kelas,
            'kompetensi_keahlian'=> $request->kompetensi_keahlian,
           ]);

            return redirect('kelas')->with('sukses', 'data berhasil ditambahkan✨.');
        } catch (\Exception  $e) {
            return redirect('kelas')->with('gagal', 'data gagal ditambahkan❌.');
        }
    }
    public function edit($id)
    {
        try {
           $kelas = Kelas::findOrFail($id);

            return view('kelas.edit', compact('kelas'));
        } catch (\Exception $e) {
            return redirect('kelas')->with('gagal', 'Data tidak ditemukan❌');
        }
    }
    public function update(Request $request)
    {
        // dd($request->all());

        try {

            Kelas::where('id', $request->id)->update([
                'kelas' => $request->kelas,
                'kompetensi_keahlian' => $request->kompetensi_keahlian
            ]);

        
            return redirect('kelas')->with('sukses', 'Data berhasil diupdate✨');
        }catch(\Exception $e){
            return redirect('kelas')->with('gagal', 'Data gagal diupdate❌');
        }
    }

    public function hapus($id)
    {
            try {
                kelas::findOrFail($id);
                kelas::destroy($id);

            return redirect('kelas')->with('sukses', 'Data berhasil dihapus✨');
        } catch (\Exception $e) {
            return redirect('kelas')->with('gagal', 'Data gagal dihapus❌');
        }
    }
}


