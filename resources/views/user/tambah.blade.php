@extends('main.bootstrap')
@section('content')
<div class="text-center py-5 h-100 bg-dark text-white">
    <h3>Kelola User</h3>
</div>
<div class="container mt-4">
    <div class="d-flex justify-content-between">
        <div>
            <h4>tambah User</h4>
        </div>
        <div>
        <a href="{{url('user/tambah')}}" class="btn btn-warning">kembali</a>
        </div>
    </div>
    <hr>
    <form action="{{ url('user/simpan') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="name">nama</label>
            <input type="text" name="name" id="name" class="form-control" requried>
        </div>
        
        <div class="form-group">
            <label for="email">email</label>
            <input type="email" name="email" id="email" class="form-control" requried>
        </div>

        <div class="form-group">
            <label for="password">password</label>
            <input type="password" name="password" id="password" class="form-control" requried>
        </div><div class="form-group">
            <label for="level">level</label>
            <select name="level" id="" class="form-select" requried>
                <option value="" disable selected>Pilih Level User</option>
                <option value="admin">Admin</option>
                <option value="petugas">Petugas</option>
                <option value="siswa">Siswa</option>
            </select>
        </div>

        <div class="mt-3 text-end">
          <button type="reset" class="btn btn-secondary">Reset</button>  
          <button type="sumbit" class="btn btn-success">Simpan</button>  
        </div>
    </form>
</div>
@endsection