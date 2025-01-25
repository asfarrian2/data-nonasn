@extends('layouts.master')

@section('content')

<!-- Begin Pesan Peringatan -->
<div class="">
    @csrf
    @php
    $messagewarning = Session::get('warning');
    $messagesuccess = Session::get('success');
@endphp
@if (Session::get('warning'))
<div class="x_content bs-example-popovers">
    <div class="alert alert-danger alert-dismissible " role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
        </button>
        <i class="fa fa-warning"></i> &nbsp;
      {{ $messagewarning }}
      </div>
</div>
<br>
@endif

@if (Session::get('success'))
<div class="x_content bs-example-popovers">
    <div class="alert alert-success alert-dismissible " role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
        </button>
        <i class="fa fa-check-circle"></i> &nbsp;
      {{ $messagesuccess }}
      </div>
</div>
<br>
@endif

<!-- End Pesan Peringatan -->

<!-- Begin Judul Halaman -->
<div class="row">
<div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
        <div class="x_title">
            <h2>DATA NON-ASN</h2>
            <div class="clearfix"></div>
        </div>
        <div class="col-md-4">
          <div id="" class="pull-left" style="background: #fff;    padding: 5px 10px; border: 1px solid #ccc">
            <i class="fa fa-home"></i>
            <span><a href="/panel/home" style="color: #0a803f">Home</a> /
                <i class="fa fa-users"></i> Data Non-ASN</span> <b class="caret"></b>
          </div>
        </div>
        <br>
        <br>
        <div class="col-md-4">
            <a href="/panel/data-nonasn/create" class="btn btn-primary btn-sm" id="btntambahkoderekening">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus"
                  width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                  stroke="currentColor" fill="none" stroke-linecap="round"
                  stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                  <path d="M12 5l0 14"></path>
                  <path d="M5 12l14 0"></path>
              </svg>
              Tambah
            </a>
        </div>

<!-- End Judul Halaman -->

<!-- Begin Tabel -->
        <div class="x_content">
            <div class="row">
                <div class="col-sm-12">
                  <div class="card-box table-responsive">
                      <table id="datatable" class="table table-striped table-bordered" width="100%">
                        <thead>
                            <tr>
                            <th class="text-center">No.</th>
                            <th class="text-center">ID</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">NIK</th>
                            <th class="text-center">Tpt Lahir</th>
                            <th class="text-center">Tgl Lahir</th>
                            <th class="text-center">Jenis Kelamin</th>
                            <th class="text-center">Alamat</th>
                            <th class="text-center">Pendidikan</th>
                            <th class="text-center">Jabatan</th>
                            <th class="text-center">Seksi / Bidang</th>
                            <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php
                            $total = 0;
                        @endphp
                            @forelse ($pegawai as $d)
                            <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $d->id_nonasn }}</td>
                            <td>{{ $d->nama }}</td>
                            <td>{{ $d->nik }}</td>
                            <td>{{ $d->tpt_lahir }}</td>
                            <td>{{ date('d-m-Y', strtotime($d->tgl_lahir)) }}</td>
                            <td>{{ $d->jen_kelamin }}</td>
                            <td>{{ $d->alamat }}</td>
                            <td>{{ $d->pendidikan }}</td>
                            <td>{{ $d->jabatan }}</td>
                            <td>{{ $d->seksi }}</td>
                        @csrf
                            <td>
                            <a href="/panel/data-nonasn/edit/{{ $d->id_nonasn }}" title="Edit Data"><i class="fa fa-pencil text-succsess btn btn-warning btn-sm" ></i></a>
                            <a class="hapus" href="#" data-id="{{ $d->id_nonasn }}" title="Hapus Data"><i class="hapus fa fa-trash text-succsess btn btn-danger btn-sm" ></i></a>
                            </td>
                            </tr>
                            @empty
                                {{-- jika data tidak ada, tampilkan pesan data tidak tersedia --}}
                            <tr>
                                <td colspan="11">
                                    <div class="d-flex justify-content-center align-items-center">
                                       <p> <i class="fa fa-exclamation"></i> Tidak ada data tersedia.</p>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
<!-- End Begin Tabel -->
</div>
</div>
</div>
</div>

@endsection
@push('myscript')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    $('.hapus').click(function(){
        var id_nonasn = $(this).attr('data-id');
    Swal.fire({
      title: "Apakah Anda Yakin Data Ini Ingin Di Hapus ?",
      text: "Jika Ya Maka Data Akan Terhapus Permanen",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Ya, Hapus Saja!"
    }).then((result) => {
      if (result.isConfirmed) {
        window.location = "/panel/data-nonasn/hapus/"+id_nonasn
        Swal.fire({
          title: "Data Berhasil Dihapus !",
          icon: "success"
        });
      }
    });
    });
    </script>
    <script>

        $("#tambah").click(function() {
           $("#modal-inputobjek").modal("show");
       });


       var span = document.getElementsByClassName("close")[0];
       </script>
@endpush
