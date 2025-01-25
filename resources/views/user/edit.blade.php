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
            <h2>EDIT DATA SK</h2>
            <div class="clearfix"></div>
        </div>
        <div class="col-md-4">
          <div id="" class="pull-left" style="background: #fff;    padding: 5px 10px; border: 1px solid #ccc">
            <i class="fa fa-file"></i>
            <span><a href="/beranda" style="color: #0a803f">Data SK</a> /
            <i class="fa fa-pencil"></i> Edit Data</span> <b class="caret"></b>
          </div>
        </div>
		<div class="x_content">
		    <br>
			<form action="/sk/rubah" method="POST" data-parsley-validate class="form-horizontal form-label-left">
                @csrf
                <input type="text" hidden name="id_sk" value="{{ $sk->id_sk }}" id=""  class="form-control ">
                    <div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nomor SK</label>
						<div class="col-md-6 col-sm-6 ">
							<input type="text" name="nomor" value="{{ $sk->nomor }}" id="first-name" required="required" class="form-control ">
						</div>
					</div>
					<div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Tanggal SK
						</label>
						<div class="col-md-2 col-sm-2">
							<input type="date" name="tgl_sk" value="{{ $sk->tgl_sk }}" id="first-name" required="required" class="form-control ">
						</div>
					</div>
                    <div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Jabatan SK</label>
						<div class="col-md-6 col-sm-6 ">
							<input type="text" name="jabatan_sk" value="{{ $sk->jabatan_sk }}" id="first-name" required="required" class="form-control ">
						</div>
					</div>
                    <div class="item form-group">
						<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Penempatan Seksi</label>
						<div class="col-md-6 col-sm-6 ">
                        <select name="penempatan" id="jenis_kelamin" required="required" class="form-control">
                            <option value="">Pilih Seksi/Bidang</option>
                            <option value="Tata Usaha" {{ $sk->penempatan == 'Tata Usaha' ? 'selected' : '' }}>Tata Usaha</option>
                            <option value="Seksi Pendidikan dan Pelatihan SDM Koperasi" {{ $sk->penempatan == 'Seksi Pendidikan dan Pelatihan SDM Koperasi' ? 'selected' : '' }}>Seksi Pendidikan dan Pelatihan SDM Koperasi</option>
                            <option value="Seksi Pendidikan dan Pelatihan SDM Usaha Kecil" {{ $sk->penempatan == 'Seksi Pendidikan dan Pelatihan SDM Usaha Kecil' ? 'selected' : '' }}>Seksi Pendidikan dan Pelatihan SDM Usaha Kecil</option>
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
