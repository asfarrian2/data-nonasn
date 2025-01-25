@extends('layouts.user')

@section('content')

<!-- Begin Pesan Peringatan -->
<div class="">
@csrf
    @php
        $messagewarning = Session::get('warning');
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
<!-- End Pesan Peringatan -->

<div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
        <div class="x_title">
            <h2>PROFILE</h2>
            <div class="clearfix"></div>
        </div>
        <div class="col-md-4">
          <div id="" class="pull-left" style="background: #fff;    padding: 5px 10px; border: 1px solid #ccc">
            <i class="fa fa-home"></i>
            <span><a href="/beranda" style="color: #0a803f">Beranda</a> / <i class="fa fa-user"></i>
            <a href="javascript:window.history.go(-1);" style="color: #0a803f">Profile</a> /
             <span><i class="fa fa-pencil"></i> Edit</span>
          </div>
        </div>
		<div class="x_content">
		    <br>
			<form action="/profile/update" method="POST" data-parsley-validate class="form-horizontal form-label-left">
                @csrf
                <input type="text" hidden name="id_nonasn" value="{{ $pegawai->id_nonasn }}" id=""  class="form-control ">
                <div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">NIK</label>
						<div class="col-md-6 col-sm-6 ">
							<input type="number" name="nik" value="{{ $pegawai->nik }}" id="first-name" required="required" class="form-control ">
						</div>
					</div>
                    <div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nama</label>
						<div class="col-md-6 col-sm-6 ">
							<input type="text" name="nama" value="{{ $pegawai->nama }}" id="first-name" required="required" class="form-control ">
						</div>
					</div>
                    <div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Tempat Lahir</label>
						<div class="col-md-6 col-sm-6 ">
							<input type="text" name="tpt_lahir" value="{{ $pegawai->tpt_lahir }}" id="first-name" required="required" class="form-control ">
						</div>
					</div>
					<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Tanggal Lahir
						</label>
						<div class="col-md-2 col-sm-2">
							<input type="date" name="tgl_lahir" value="{{ $pegawai->tgl_lahir }}" id="first-name" required="required" class="form-control ">
						</div>
					</div>
                    <div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Alamat</label>
						<div class="col-md-6 col-sm-6 ">
							<input type="text" name="alamat" value="{{ $pegawai->alamat }}" id="first-name" required="required" class="form-control ">
						</div>
					</div>
                    <div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Jenis Kelamin</label>
						<div class="col-md-6 col-sm-6 ">
                        <select name="jen_kelamin" value="{{ $pegawai->jen_kelamin }}" id="jenis_kelamin" required="required" class="form-control">
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="Laki-laki" {{ $pegawai->jen_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="Perempuan" {{ $pegawai->jen_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                        </select>
						</div>
					</div>
                    <div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Pendidikan</label>
						<div class="col-md-6 col-sm-6 ">
							<input type="text" name="pendidikan" value="{{ $pegawai->pendidikan }}" id="first-name" required="required" class="form-control ">
						</div>
					</div>
                    <div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Jabatan</label>
						<div class="col-md-6 col-sm-6 ">
							<input type="text" name="jabatan" value="{{ $pegawai->jabatan }}" id="first-name" required="required" class="form-control ">
						</div>
					</div>
                    <div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Seksi / Bidang</label>
						<div class="col-md-6 col-sm-6 ">
                        <select name="seksi" value="{{ $pegawai->seksi }}" id="jenis_kelamin" required="required" class="form-control">
                            <option value="">Pilih Seksi/Bidang</option>
                            <option value="Tata Usaha" {{ $pegawai->seksi == 'Tata Usaha' ? 'selected' : '' }}>Tata Usaha</option>
                            <option value="Seksi Pendidikan dan Pelatihan SDM Koperasi" {{ $pegawai->seksi == 'Seksi Pendidikan dan Pelatihan SDM Koperasi' ? 'selected' : '' }}>Seksi Pendidikan dan Pelatihan SDM Koperasi</option>
                            <option value="Seksi Pendidikan dan Pelatihan SDM Usaha Kecil" {{ $pegawai->seksi == 'Seksi Pendidikan dan Pelatihan SDM Usaha Kecil' ? 'selected' : '' }}>Seksi Pendidikan dan Pelatihan SDM Usaha Kecil</option>
                        </select>
						</div>
					</div>
				<div class="ln_solid"></div>
				    <div class="item form-group">
				    	<div class="col-md-6 col-sm-6 offset-md-3">
				    		<button type="submit" class="btn btn-success">Simpan</button>
                            <a href="javascript:window.history.go(-1);" class="btn btn-dark">Batal</a>
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
