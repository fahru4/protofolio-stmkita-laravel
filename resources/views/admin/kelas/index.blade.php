@extends('admin.backend.master')

@section('content')

<div class="row" >
<div class="col-md-6">
<div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Kelas</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"><div class="col-sm-6"><div class="dataTables_length" id="example1_length"><label>Show <select name="example1_length" aria-controls="example1" class="form-control input-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-6"><div id="example1_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control input-sm" placeholder="" aria-controls="example1"></label></div></div></div><div class="row"><div class="col-sm-12">
              <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                <thead>
                <tr role="row">
                <th>No</th>
                <th>Nama Kelas</th>
                <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                @php $no=1; @endphp
                @foreach($kelas as $kelas)
                <tr>
                  <td width="10px">{{$no++}}</td>
                  <td>{{$kelas->n_kelas}}</td>
                  <td>
                  <form action="{{ route('kelas.destroy', $kelas->id) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <a href="{{route ('kelas.edit', $kelas->id) }}" class="btn btn-warning btn-sm"
                  data-toggle="modal" data-target="#exampleModal">
                  <i class="fa fa-edit"></i>
                  </a>
                  <button type="sumbit" class="btn btn-danger btn-sm">
                  <i class="fa fa-trash-o"></i>
                </button>
                </td>
                </form>
                </tr>
                </tbody>
                @endforeach
                <tfoot>
                </tfoot>
              </table></div></div><div class="row"><div class="col-sm-5"><div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div></div><div class="col-sm-7"><div class="dataTables_paginate paging_simple_numbers" id="example1_paginate"><ul class="pagination"><li class="paginate_button previous disabled" id="example1_previous"><a href="#" aria-controls="example1" data-dt-idx="0" tabindex="0">Previous</a></li><li class="paginate_button active"><a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0">1</a></li><li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="2" tabindex="0">2</a></li><li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="3" tabindex="0">3</a></li><li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="4" tabindex="0">4</a></li><li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="5" tabindex="0">5</a></li><li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="6" tabindex="0">6</a></li><li class="paginate_button next" id="example1_next"><a href="#" aria-controls="example1" data-dt-idx="7" tabindex="0">Next</a></li></ul></div></div></div></div>
            </div>
            <!-- /.box-body -->
          </div>
          </div>
          
<!-- Tambah Kelas -->
<div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Quick Example</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{route('kelas.store')}}" method="post">
            {{csrf_field()}}
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Kelas</label>
                  <input type="text" class="form-control" name="n_kelas" id="exampleInputEmail1" placeholder="Nama Kelas">
                </div> 
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
        </div>
        </div>

        <!-- Modal -->
<div class="modal modal-primary fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
      </div>
      <form role="form" action="{{route('kelas.update',$kelas->id)}}" method="post">
      <div class="modal-body">
      <div class="">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah Siswa</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
            {{csrf_field()}}
            @method('PUT')
              <div class="box-body">
                <div class="form-group">
                <label>Edit Kelas</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control" name="n_kelas"
                  value="{{$kelas->n_kelas}}">       
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