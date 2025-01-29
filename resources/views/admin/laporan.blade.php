<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>LAPORAN PRESENSI</title>

    <!-- Normalize or reset CSS with your favorite library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css">

    <!-- Load paper.css for happy printing -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css">

    <!-- Set page size here: A5, A4 or A3 -->
    <!-- Set also "landscape" if you need -->
    <style>
    @media print {
    @page {
    size: A4 landscape;
    margin: 1in;
    }
    }
        @page {
            size: Legal landscape
        }

        .sheet {
         page-break-after: always;
        }

        #title {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 18px;
            font-weight: bold;
        }

        .tabeldatakaryawan {
            margin-top: 40px;
        }

        .tabeldatakaryawan tr td {
            padding: 5px;
        }

        .tabelpresensi {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        .tabelpresensi tr th {
            border: 1px solid #131212;
            padding: 8px;
            background-color: #dbdbdb;
        }

        .tabelpresensi tr td {
            border: 1px solid #131212;
            padding: 5px;
            font-size: 12px;
        }

        .foto {
            width: 40px;
            height: 30px;

        }
    </style>
</head>

<!-- Set "A5", "A4" or "A3" for class name -->
<!-- Set also "landscape" if you need -->

<body class="legal landscape">

    <!-- Each sheet element should have the class "sheet" -->
    <!-- "padding-**mm" is optional: you can set 10, 15, 20 or 25 -->

    <table style="width: 100%">
            <tr>
                <td>
                    <span id="title">
                    NAMA UNIT KERJA   : BALAI PELATIHAN KOPERASI DAN USAHA KECIL PROVINSI KALIMANTAN SELATAN
                    </span>
                </td>
            </tr>
        </table>
        <table class="tabelpresensi">
            <tr>
            <th class="text-center">No.</th>
            <th class="text-center">Nama</th>
            <th class="text-center">NIK</th>
            <th class="text-center">Pendidikan</th>
            <th class="text-center">Jabatan</th>
            <th class="text-center">Nomor SK</th>
            <th class="text-center">Tanggal</th>
            <th class="text-center">Jabatan</th>
            <th class="text-center">Penempatan / Seksi</th>
            </tr>
            @foreach ($pegawai as $d)
                            <tr>
                            <td rowspan="{{$d->total + 1}}">{{ $loop->iteration }}</td>
                            <td rowspan="{{$d->total + 1}}">{{ $d->nama }}</td>
                            <td rowspan="{{$d->total + 1}}">{{ $d->nik }}</td>
                            <td rowspan="{{$d->total + 1}}">{{ $d->pendidikan }}</td>
                            <td rowspan="{{$d->total + 1}}">{{ $d->jabatan }}</td>
                            @foreach ($sk as $s)
                            @if ($d->id_nonasn == $s->id_nonasn)
                            <td>{{$s->nomor}}</td>
                            <td>{{date('d-m-Y', strtotime($s->tgl_sk))}}</td>
                            <td>{{$s->jabatan_sk}}</td>
                            <td>{{$s->penempatan}}</td>
                            @endif
                            </tr>
                            @endforeach
                            @endforeach
                        </table>

        <table width="100%" style="margin-top:100px">
            <tr>
                <td style="text-align: center"></td>
                <?php
function tgl_indo($tanggal){
	$bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkan = explode('-', $tanggal);

	// variabel pecahkan 0 = tanggal
	// variabel pecahkan 1 = bulan
	// variabel pecahkan 2 = tahun

	return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
    } ?>
                <td style="text-align: center">Pelaihari, <?php echo tgl_indo(date('Y-m-d')); ?></td>
            </tr>
            <tr>
                <td style="text-align: center">Mengetahui,</td>

                <td style="text-align: center"></td>
            </tr>
            <tr>
                <td style="text-align: center"><b>KEPALA UPPD PELAIHARI</b></td>

                <td style="text-align: center"><b>KEPALA SEKSI PELAYANAN <br> PKB & BBNKB</b></td>
            </tr>
            <tr>
                <td style="text-align: center; vertical-align:bottom" height="100px">
                    <b><u>FEBRY RAHARJO, S.IP, MM</b></u><br>
                    <span>NIP. 19870222 200701 1 002 <span>
                </td>
                <td style="text-align: center; vertical-align:bottom">
                <b><u>ADIMAS FITRIANDI, ST</b></u><br>
                <span>NIP. 19800813 200712 1 001<span>
                </td>
            </tr>
        </table>
    </section>

</body>

</html>
