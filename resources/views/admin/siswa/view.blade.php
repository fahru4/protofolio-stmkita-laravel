@extends('admin.backend.master')

@section('content')

<div class="col-md-10">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="{{asset('siswa/foto/user.png')}}" alt="User profile picture">

              <h3 class="profile-username text-center"></h3>
              
              <h3 class="text-center">{{$siswa->nama}}</h3>
              <p class="text-muted text-center">{{$siswa->nis}}</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Email</b><a class="text-muted pull-right">{{$siswa->email}}</a>
                </li>
                <li class="list-group-item">
                  <b>Tanggal Lahir</b> <a class="text-muted pull-right">{{$siswa->tgl_lahir}}</a>
                </li>
                <li class="list-group-item">
                  <b>No Telepon</b> <a class="text-muted pull-right">{{$siswa->tlp}}</a>
                </li>
                <li class="list-group-item">
                  <b>Jeni Kelamin</b> <a class="text-muted pull-right">{{$siswa->jk}}</a>
                </li>
                <li class="list-group-item">
                  <b>Alamat</b> <a class="text-muted pull-right">{{$siswa->alamat}}</a>
                </li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>

          <!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">About Me</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-book margin-r-5"></i> Education</strong>

              <p class="text-muted">
                B.S. in Computer Science from the University of Tennessee at Knoxville
              </p>

              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

              <p class="text-muted">Malibu, California</p>

              <hr>

              <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

              <p>
                <span class="label label-danger">UI Design</span>
                <span class="label label-success">Coding</span>
                <span class="label label-info">Javascript</span>
                <span class="label label-warning">PHP</span>
                <span class="label label-primary">Node.js</span>
              </p>

              <hr>

              <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        @endsection