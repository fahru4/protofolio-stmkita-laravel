@extends('admin.backend.master')

@section('content')
<link rel="stylesheet" href="{{asset('admin/assets/backend/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
<div class="box">
<div class="row">
            <div class="box-header">
                <div class="col-md-6">
              <h3 class="box-title">Daftar Siswa</h3>
</div>

<div class="col-md-6">
<button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#exampleModal">
<i class="fa fa-user-plus"></i>
</button>
</div>
            </div>
            </div>
            <!-- /.box-header -->
            <form action="{{ url('siswa.del') }}" method="POST">
            {{csrf_field()}}
            <div class="box-body">
              <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"><div class="col-sm-6"><div class="dataTables_length" id="example1_length"><label>Show <select name="example1_length" aria-controls="example1" class="form-control input-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-6"><div id="example1_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control input-sm" placeholder="" aria-controls="example1"></label></div></div></div><div class="row"><div class="col-sm-12"><table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                <thead>
                <tr role="row">
                <th>#</th>
                <th>NO</th>
                <th>NIS</th>
                <th>FOTO</th>
                <th>NAMA</th>
                <th>JENIS KELAMIN</th>
                <th>ALAMAT</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
                </thead>
                
                <tbody>
                @php
                $no=1;
                @endphp
                @foreach($siswa as $siswa)
                <tr>
                <td><input type="checkbox" name="delid[]" value="{{$siswa->nis}}"></td>
                <td width="10px">{{$no++}}</td>
                <td>{{$siswa->nis}}</td>
                <td><img src="{{asset($siswa->foto)}}" width="50px"></td>
                <td>{{$siswa->nama}}</td>
                <td>{{$siswa->jk}}</td>
                <td>{{$siswa->alamat}}</td>
                <td>{{$siswa->status}}</td>
                <td>
                <form action="{{ route('siswa.destroy', $siswa->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <a href="{{route ('siswa.show', $siswa->id) }}" class="btn btn-info btn-sm">
                <i class="fa fa-eye"></i>
                </a>
                <a href="{{route ('siswa.edit', $siswa->id) }}" class="btn btn-warning btn-sm">
                <i class="fa fa-edit"></i>
                </a>
                <button type="sumbit" class="btn btn-danger btn-sm">
                <i class="fa fa-trash-o"></i>
                </button>
                </td>
                </form>
                </tr>
                @endforeach
            </tbody>
            @method('GET')
            <button type="sumbit" class="btn btn-danger btn-sm">
                <i class="fa fa-trash-o"></i>
                </button>
            </form>
                <tfoot>
                
                </tfoot>
              </table></div></div><div class="row"><div class="col-sm-5"><div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div></div><div class="col-sm-7"><div class="dataTables_paginate paging_simple_numbers" id="example1_paginate"><ul class="pagination"><li class="paginate_button previous disabled" id="example1_previous"><a href="#" aria-controls="example1" data-dt-idx="0" tabindex="0">Previous</a></li><li class="paginate_button active"><a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0">1</a></li><li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="2" tabindex="0">2</a></li><li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="3" tabindex="0">3</a></li><li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="4" tabindex="0">4</a></li><li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="5" tabindex="0">5</a></li><li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="6" tabindex="0">6</a></li><li class="paginate_button next" id="example1_next"><a href="#" aria-controls="example1" data-dt-idx="7" tabindex="0">Next</a></li></ul></div></div></div></div>
            </div>
            <!-- /.box-body -->
          </div>
<!-- Modal -->
<div class="modal modal-primary fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
      </div>
      <form role="form" action="{{route('siswa.store')}}" method="post" enctype="multipart/form-data">
      <div class="modal-body">
      <div class="">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah Siswa</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
            {{csrf_field()}}
              <div class="box-body">
                <div class="form-group {{$errors->has('nis') ? ' has-error' : ''}}">
                <label>Nomor Induk Siswa (NIS)</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="number" class="form-control" name="nis" placeholder="NIS"
                  value="{{old('nis')}}">
                  @if($errors->has('nis'))
                  <span class="help-block">{{$errors->first('nis')}}</span>
                  @endif
                
              </div>

              <div class="form-group {{$errors->has('nama') ? ' has-error' : ''}}">
                <label>Nama Lengkap</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap Siswa"
                  value="{{old('nama')}}">
                  @if($errors->has('nama'))
                  <span class="help-block">{{$errors->first('nama')}}</span>
                  @endif
                </div>
                </div>
              </div>

              <div class="form-group {{$errors->has('username') ? ' has-error' : ''}}">
                <label>Username</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control" name="username" placeholder="Username"
                  value="{{old('username')}}">
                  @if($errors->has('username'))
                  <span class="help-block">{{$errors->first('username')}}</span>
                  @endif
                </div>
              </div>

              <div class="form-group {{$errors->has('email') ? ' has-error' : ''}}">
                <label>Email</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="email" class="form-control" name="email" placeholder="Email"
                  value="{{old('email')}}">
                  @if($errors->has('email'))
                  <span class="help-block">{{$errors->first('email')}}</span>
                  @endif
                </div>
              </div>

              <div class="form-group {{$errors->has('jk') ? ' has-error' : ''}}">
                <label>Jenis Kelamin</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <select name="jk" class="form-control">
                  <option value="Laki-Laki" {{(old('jk') == 'Laki-Laki') ? ' selected' : ''}}>Laki-Laki</option>
                  <option value="Perempuan" {{(old('jk') == 'Perempuan') ? ' selected' : ''}}>Perempuan</option>
                  </select>
                  @if($errors->has('jk'))
                  <span class="help-block">{{$errors->first('jk')}}</span>
                  @endif
                </div>
              </div>

              <div class="form-group {{$errors->has('tlp') ? ' has-error' : ''}}">
                <label>Nomor Telepon</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="number" class="form-control" name="tlp" placeholder="Nomor Telepon"
                  value="{{old('tlp')}}">
                  @if($errors->has('tlp'))
                  <span class="help-block">{{$errors->first('tlp')}}</span>
                   @endif
                </div>
              </div>

              <div class="form-group {{$errors->has('tgl_lahir') ? ' has-error' : ''}}">
                <label>Tanggal Lahir Siswa</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="date" class="form-control" name="tgl_lahir" value="{{old('tgl_lahir')}}">
                  @if($errors->has('tgl_lahir'))
                  <span class="help-block">{{$errors->first('tgl_lahir')}}</span>
                   @endif
                </div>
              </div>

              <div class="form-group {{$errors->has('status') ? ' has-error' : ''}}">
                <label>Status</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <select name="status" class="form-control">
                  <option value="Aktif" {{(old('status') == 'Aktif') ? ' selected' : ''}}>Aktif</option>
                  <option value="Tidak-Aktif" {{(old('status') == 'Tidak-Aktif') ? ' selected' : ''}}>Tidak Aktif</option>
                  </select>
                  @if($errors->has('status'))
                  <span class="help-block">{{$errors->first('status')}}</span>
                  @endif
                </div>
              </div>

              <div class="form-group">
    <label for="exampleFormControlTextarea1">Alamat</label>
    <textarea name="alamat" class="form-control" rows="3">{{old('alamat')}}</textarea>
  </div>

  <div class="form-group {{$errors->has('foto') ? ' has-error' : ''}}">
      <label for="exampleInputEmail1">Foto</label>
          <input type="file" class="form-control" name="file">
             @if($errors->has('foto'))
               <span class="help-block">{{$errors->first('foto')}}</span>
               @endif
                  </div>
              </div>
              </div>
          </div>
      <div class="modal-footer">
        <button type="button" class="btn bg-navy margin" data-dismiss="modal">Close</button>
        <button type="submit" class="btn bg-navy">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>
@endsection
