<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Slip Gaji | {{$name}}</title>
    <link rel="stylesheet" href="pdf.css">
</head>
<body>
    <div class="header">
        <div class="col1">
            <img src="data:image/png;base64,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" alt="Logo Perusahaan" width="70" style="padding-left: 40px;">
        </div>
        <div class="col2">
            <h1>PT. Karisma Garuda Mulia</h1>
            <p>Jl. Watu Gong No.18, Ketawanggede, Kec. Lowokwaru, Kota Malang, Jawa Timur 65145</p>
            <p>Contact Person : 08123456789</p>
        </div>
    </div>
    <hr style="border-top: 1.5px solid black;">
    <h2 style="text-align: center; line-height: 20px;">SLIP GAJI</h2>
    <div class="title">
        <p>Nama Karyawan : {{$name}}</p>
        <p>Tanggal : {{$date}}</p>
        <p>Jabatan : {{$jabatan}}</p>
    </div>
	<div class="body-slip">
		<table>
			<tr>
				<th>Gaji Pokok : </th>
				<td>{{$pokok}}</td>
			</tr>
			<tr>
				<th>Tunjangan : </th>
				<td>{{$tunjangan}}</td>
			</tr>
			<tr>
				<th>Bonus : </th>
				<td>{{$bonus}}</td>
			</tr>
			<tr>
				<th>Bonus Lembur : </th>
				<td>{{$lembur}}</td>
			</tr>
			<tr>
				<th style="text-align: center">Total : </th>
				<td >@money($total,'IDR',true)</td>
			</tr>
		</table>
	</div>
	<div class="ttd">
		<div class="col1">
			<p style="padding-left: 100px; font-weight: bolder">HRD</p>

			<p class="name-ttd">(.......,...)</p>
		</div>
	</div>
	<div class="footer">
		<p class="apresiasi">1 | Terima kasih telah bekerja dengan baik.</p>
	</div>
</body>
</html>