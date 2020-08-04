@extends('admin.backend.master')

@section('content')
<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Quick Example</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{route('siswa.update',$siswa->id)}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            @method('PUT')
            <div class="box-body">
                <div class="form-group">
                <label>Nomor Induk Siswa (NIS)</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="number" class="form-control" name="nis" placeholder="NIS" value="{{$siswa->nis}}">
                </div>
              </div>
              <div class="form-group">
                <label>Nama Lengkap</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap Siswa" value="{{$siswa->nama}}">
                </div>
              </div>

              <div class="form-group">
                <label>Username</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control" name="username" placeholder="Username" value="{{$siswa->username}}">
                </div>
              </div>

              <div class="form-group">
                <label>Email</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="email" class="form-control" name="email" placeholder="Email" value="{{$siswa->email}}">
                </div>
              </div>

              <div class="form-group">
                <label>Password</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  @foreach($siswa as $user)
                  <input type="password" class="form-control" name="password" placeholder="Password" value="{{$user->password}}">
                @endforeach
                </div>
              </div>

              <div class="form-group">
                <label>Jenis Kelamin</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <select name="jk" class="form-control">
                  <option value="Laki-Laki" @if($siswa->jk == 'Laki-Laki') selected @endif>Laki-Laki</option>
                  <option value="Perempuan" @if($siswa->jk == 'Perempuan') selected @endif>Perempuan</option>
                  
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label>Nomor Telepon</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="number" class="form-control" name="tlp" placeholder="Nomor Telepon" value="{{$siswa->tlp}}">
                </div>
              </div>

              <div class="form-group">
                <label>Tanggal Lahir Siswa</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="date" class="form-control" name="tgl_lahir" value="{{$siswa->tgl_lahir}}">
                </div>
              </div>

              <div class="form-group">
                <label>Status</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <select name="status" class="form-control">
                  <option value="Aktif" @if($siswa->status == 'Aktif') selected @endif>Aktif</option>
                  <option value="Tidak-Aktif" @if($siswa->status == 'Tidak-Aktif') selected @endif>Tidak Aktif</option>
                  </select>
                </div>
              </div>

              <div class="form-group">
              <label for="exampleFormControlTextarea1">Alamat</label>
               <textarea name="alamat" class="form-control" rows="3">{{$siswa->alamat}}</textarea>
               </div>

  <div class="form-group">
                    <label for="exampleInputEmail1">Photo</label>
                    <img src="{{url($siswa->foto) }}" width="100px">
                    <input type="file" class="form-control" name="file">
                  </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary pull-right">Submit</button>
              </div>
            </form>
          </div>
@endsection