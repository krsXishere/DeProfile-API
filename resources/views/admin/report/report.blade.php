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
			background-color: #F17F67;
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
    <div style="margin: 0 auto;display: block;width: 500px;">
        <p style="text-align:center;">Laporan De'Profile</p>
        <table class="table table-stripped table-hover" width="100%" border='1'>
            <thead>
                <tr style="color:#66806A;">
                    <td style="text-align:center;">Jumlah Sekolah</td>
                    <td style="text-align:center;">Jumlah Siswa</td>
                    <td style="text-align:center;">Jumlah Guru</td>
                    <td style="text-align:center;">Jumlah Akun</td>
                </tr>
            </thead>
            <tbody>
                <tr style="text-align:center; border: none;">
                    <td>{{$sekolah}}</td>
                    <td>{{$siswa}}</td>
                    <td>{{$guru}}</td>
                    <td>{{$akun}}</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>