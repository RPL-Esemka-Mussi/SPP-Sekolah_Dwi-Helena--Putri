<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\User;
use App\Models\Siswa;

class SiswaController extends Controller
{   public function index()
    {
       $siswa = Siswa::with('user','kelas')->get();

        return view('siswa.index', compact('siswa'));
    }

    public function tambah()
    {

        $kelas = Kelas::all();

        return view('siswa.tambah', compact('kelas'));
    }

    public function simpan(Request $request)
    {
        $users = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'level' => 'siswa',

        ]);
        try {
         
           Siswa::create([
            'user_id'=> $users->id,
            'nis'=> $request->nis,
            'kelas_id'=> $request->kelas_id,
            'alamat'=> $request->alamat,
            'no_hp'=> $request->no_hp,
           ]);

            return redirect('siswa')->with('sukses', 'data berhasil ditambahkan✨.');
        } catch (\Exception  $e) {
            $message = $e->getMessage();
            return redirect('siswa')->with('gagal', 'data gagal ditambahkan❌.' . "($message)");
        }
    }
    public function edit($id)
    {
        try {
           $siswa = Siswa::findOrFail($id);
           $kelas = Kelas::all();


            return view('siswa.edit', compact('siswa', 'kelas'));
        } catch (\Exception $e) {
            return redirect('siswa')->with('gagal', 'Data tidak ditemukan❌');
        }
    }
    public function update(Request $request)
    {
        // dd($request);

        try {
            $siswa = Siswa::findOrFail($request->id);
            
            if ($request->password != null) {
                User::where('id', $siswa->user_id)->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => bcrypt($request->password),
                
                ]);
            } else {
                User::where('id', $siswa->user_id)->update([
                    'name' => $request->name,
                    'email' => $request->email,
                ]);
            }

            Siswa::where('id', $siswa->id)->update([
                'nis' => $request->nis,
                'kelas_id' => $request->kelas_id,
                'alamat' => $request->alamat,
                'no_hp' => $request->no_hp,
            ]);


            return redirect('siswa')->with('sukses', 'Data berhasil diupdate✨');
        }catch(\Exception $e){
            $message = $e->getMessage();
            return redirect('siswa')->with('gagal', 'Data gagal diupdate❌');
        }
    }

    public function hapus($id)
    {
            try {
                Siswa::findOrFail($id);
                Siswa::destroy($id);

            return redirect('siswa')->with('sukses', 'Data berhasil dihapus✨');
        } catch (\Exception $e) {
            return redirect('siswa')->with('gagal', 'Data gagal dihapus❌');
        }
    }
}
