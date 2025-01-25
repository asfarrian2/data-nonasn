@extends('layouts.user')

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

<div class="col-md-12 col-sm-12 ">
<h2>Pastikan Biodata Terisi dengan Benar</h2>
    <div class="x_panel">
        <div class="x_title">
            <h2>PROFILE</h2>
            <div class="clearfix"></div>
        </div>
        <div class="col-md-4">
          <div id="" class="pull-left" style="background: #fff;    padding: 5px 10px; border: 1px solid #ccc">
            <i class="fa fa-home"></i>
            <span><a href="/beranda" style="color: #0a803f">Beranda</a> /
            <i class="fa fa-user"></i> Profile</span> <b class="caret"></b>
          </div>
        </div>
		<div class="x_content">
		    <br>
			<form action="/panel/data-nonasn/update" method="POST" data-parsley-validate class="form-horizontal form-label-left">
                @csrf
                <input type="text" hidden name="id_nonasn" value="{{ $pegawai->id_nonasn }}" id=""  class="form-control ">
                <div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">NIK</label>
						<div class="col-md-6 col-sm-6 ">
						<label class="col-form-label col-md-12 col-sm-3 label-right form-control" for="first-name">{{ $pegawai->nik }}</label>
						</div>
					</div>
                    <div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nama</label>
						<div class="col-md-6 col-sm-6 ">
						<label class="col-form-label col-md-12 col-sm-3 label-right form-control" for="first-name">{{ $pegawai->nama }}</label>
						</div>
					</div>
                    <div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Tempat Lahir</label>
						<div class="col-md-6 col-sm-6 ">
						<label class="col-form-label col-md-12 col-sm-3 label-right form-control" for="first-name">{{ $pegawai->tpt_lahir }}</label>
						</div>
					</div>
					<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Tanggal Lahir
						</label>
						<div class="col-md-2 col-sm-2">
						<label class="col-form-label col-md-12 col-sm-3 label-right form-control" for="first-name">{{ date('d-m-Y', strtotime($pegawai->tgl_lahir)) }}</label>
						</div>
					</div>
                    <div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Alamat</label>
						<div class="col-md-6 col-sm-6 ">
						<label class="col-form-label col-md-12 col-sm-3 label-right form-control" for="first-name">{{ $pegawai->alamat }}</label>
						</div>
					</div>
                    <div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Jenis Kelamin</label>
						<div class="col-md-6 col-sm-6 ">
						<label class="col-form-label col-md-12 col-sm-3 label-right form-control" for="first-name">{{ $pegawai->jen_kelamin }}</label>
						</div>
					</div>
                    <div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Pendidikan</label>
						<div class="col-md-6 col-sm-6 ">
						<label class="col-form-label col-md-12 col-sm-3 label-right form-control" for="first-name">{{ $pegawai->pendidikan }}</label>
						</div>
					</div>
                    <div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Jabatan</label>
						<div class="col-md-6 col-sm-6 ">
						<label class="col-form-label col-md-12 col-sm-3 label-right form-control" for="first-name">{{ $pegawai->jabatan }}</label>
						</div>
					</div>
                    <div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Seksi / Bidang</label>
						<div class="col-md-6 col-sm-6 ">
						<label class="col-form-label col-md-12 col-sm-3 label-right form-control" for="first-name">{{ $pegawai->seksi }}</label>
						</div>
					</div>
				<div class="ln_solid"></div>
				    <div class="item form-group">
				    	<div class="col-md-6 col-sm-6 offset-md-3">
                            <a href="/profile/edit/{{ Auth::guard('pegawai')->user()->id_nonasn }}" class="btn btn-primary"><i class="fa fa-pencil"></i> Edit</a>
				    	</div>
				    </div>
		        	</form>
		        </div>
			</div>
		</div>
	</div>


@endsection
@push('myscript')
<script src="/gentella/vendors/uang/jquery.mask.min.js"></script>
<script>
    $(document).ready(function(){
        $('#pagu').mask("#,##0", {
            reverse:true
        });
    });
    $(document).ready(function(){
        $('#pagu2').mask("#,##0", {
            reverse:true
        });
    });
</script>
@endpush
