<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Report De'Profile</title>

    <style type="text/css">
		table {
			border-collapse: collapse;
			font-family: Tahoma, Geneva, sans-serif;
		}
        p {
            font-family: Tahoma, Geneva, sans-serif;
        }
		table td {
			padding: 15px;
		}
		table thead tr {
			border: 1px solid #54585d;
		}
		table thead th {
			background-color: #66806A   ;
			color: #ffffff;
			font-weight: bold;
			font-size: 13px;
			border: 1px solid #54585d;
		}
		table tbody td {
			color: #636363;
			border: 1px solid #54585d;
		}
		table tbody tr {
			background-color: #f9fafb;
		}
		table tbody tr:nth-child(odd) {
			background-color: #ffffff;
		}
	</style>
</head>
<body>
    <div style="display: block;">
        <p style="text-align:center;">Laporan Sekolah di De'Profile</p>
        <table class="table table-stripped table-hover" width="100%" border='1'>
            <thead>
                <tr style="color:#66806A;">
                    <th class="text-center" scope="col">No.</th>
                    <th class="text-center" scope="col">NPSN</th>
                    <th class="text-center" scope="col">Nama Sekolah</th>
                    <th class="text-center" scope="col">Alamat</th>
                    <th class="text-center" scope="col">No. Telpon</th>
                    <th class="text-center" scope="col">No. Fax</th>
                    <th class="text-center" scope="col">Email</th>
                    <th class="text-center" scope="col">Kepala Sekolah</th>
                    <th class="text-center" scope="col">Desa/Kelurahan</th>
                </tr>
            </thead>
            <tbody>
                @php($no = 1)
                @forelse ($sekolah as $row)
                <tr>
                    <td class="text-center">{{$no++}}</td>
                    <td class="text-center">{{ $row->npsn }}</td>
                    <td class="text-center">{{ $row->nama }}</td>
                    <td class="text-center">{{ $row->alamat }}</td>
                    <td class="text-center">{{ $row->no_telpon }}</td>
                    <td class="text-center">{{ $row->no_fax }}</td>
                    <td class="text-center">{{ $row->email }}</td>
                    <td class="text-center">{{ $row->kepala_sekolah }}</td>
                    <td class="text-center">{{ $row->desa }}</td>
                </tr>
                @empty
                    <div class="alert alert-danger">
                        Data sekolah belum Tersedia.
                    </div>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>