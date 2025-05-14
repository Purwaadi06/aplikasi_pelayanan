<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Surat Keterangan Pindah</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
            width: 21cm;
            min-height: 33cm;
            padding: 2cm;
            margin: auto;
            border: 1px solid #000;
            box-sizing: border-box;
        }
        .header {
            text-align: center;
        }
        .logo {
            float: left;
            height: 80px;
        }
        .kop {
            text-align: center;
            margin-bottom: 20px;
        }
        h3, h4, p {
            margin: 2px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        table.data th, table.data td {
            border: 1px solid #000;
            padding: 6px;
            text-align: center;
        }
        table.no-border td {
            padding: 4px;
            vertical-align: top;
        }
        .text-left { text-align: left; }
        .ttd {
            width: 40%;
            float: right;
            text-align: center;
            margin-top: 50px;
        }
        .clear {
            clear: both;
        }
    </style>
    <style>
        @media print {
            .no-print {
                display: none !important;
            }
        }
        </style>
</head>
<body>
    <div class="no-print" style="margin-bottom: 20px;">
        <button onclick="window.print()" style="padding: 8px 16px; background-color: #007bff; color: white; border: none; border-radius: 5px; margin-right: 10px; cursor: pointer;">
            🖨️ Cetak
        </button>
    
        <button onclick="shareSurat()" style="padding: 8px 16px; background-color: #28a745; color: white; border: none; border-radius: 5px; cursor: pointer;">
            📤 Share
        </button>
    </div>
    <div class="kop">
        <img src="{{ public_path('logo.png') }}" class="logo">
        <h3>PEMERINTAH KOTA SUKABUMI</h3>
        <h3>KECAMATAN LEMBURSITU</h3>
        <h3>KELURAHAN CIKUNDUL</h3>
        <p>Jl. Merdeka II No. 239 Telp. (0266) 240088 43156</p>
        <hr style="border: 1px solid #000;">
        <h4 style="text-decoration: underline;">SURAT KETERANGAN PINDAH</h4>
        <p>Nomor: 475/{{ $surat->no_surat }}/006.104/2025</p>
    </div>

    <p>Lurah Cikundul Kecamatan Lembursitu Kota Sukabumi, dengan ini menerangkan bahwa:</p>

    <table class="no-border">
        <tr><td style="width: 35%;">Nama</td><td>: MARETA SITA VALENTINUS SUBRAKTI</td></tr>
        <tr><td>NIK</td><td>: 3271065208020007</td></tr>
        <tr><td>No. KK</td><td>: 1271103013020001</td></tr>
        <tr><td>Tempat, Tanggal Lahir</td><td>: EMMA, 03 Oktober 1982</td></tr>
        <tr><td>Jenis Kelamin</td><td>: Perempuan</td></tr>
        <tr><td>Pekerjaan</td><td>: Wiraswasta</td></tr>
        <tr><td>Status Perkawinan</td><td>: Kawin</td></tr>
        <tr><td>Agama</td><td>: Islam</td></tr>
        <tr><td>Alamat Lama</td><td>: Perumahan Baharaja Blok E.4 No.5 RT.006/RW.003, Kelurahan Cikundul, Kec. Lembursitu, Kota Sukabumi</td></tr>
        <tr><td>Alamat Baru</td><td>: Lebak Jami Gintung No.93, Medan Tuntungan, Kota Medan, Sumatera Utara</td></tr>
    </table>

    <p>Adalah benar warga RT 06 / RW 003 Kelurahan Cikundul Kecamatan Lembursitu Kota Sukabumi.</p>
    <p>Dengan ini diberikan Surat Keterangan Pindah Domisili untuk keperluan administrasi sesuai pengantar RT.</p>

    <p>Daftar anggota keluarga yang ikut pindah:</p>

    <table class="data">
        <thead>
            <tr>
                <th>No</th>
                <th>NIK / No. KTP</th>
                <th>Nama</th>
                <th>TTL</th>
                <th>Pekerjaan</th>
                <th>Pendidikan</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <tr><td>1</td><td>3271065208020007</td><td>EMMA</td><td>Medan, 03-10-1982</td><td>Ibu Rumah Tangga</td><td>SLA</td><td>Istri</td></tr>
            <tr><td>2</td><td>3271060209060004</td><td>HIMAYAT BRINTANG GINANJAR</td><td>Jakarta, 02-09-2006</td><td>Pelajar</td><td>SLTA</td><td>Anak</td></tr>
            <tr><td>3</td><td>1271103013020001</td><td>VALENTINUS SUBRAKTI</td><td>Subang, 14-07-1977</td><td>Wiraswasta</td><td>SLA</td><td>Kepala Keluarga</td></tr>
            <tr><td>4</td><td>3271062709050001</td><td>ANGEL SHAFIRA SUBRAKTI</td><td>Bogor, 27-09-2005</td><td>Pelajar</td><td>SLTA</td><td>Anak</td></tr>
            <tr><td>5</td><td>6203067202010001</td><td>SARAH VALENTINUS SUBRAKTI</td><td>Jakarta, 07-02-2020</td><td>-</td><td>PAUD</td><td>Anak</td></tr>
        </tbody>
    </table>

    <div class="ttd">
        <p>Sukabumi, 30 Januari 2025</p>
        <p>LURAH CIKUNDUL</p>
        <br><br><br>
        <p><strong>(......................................)</strong></p>
    </div>

    <div class="clear"></div>

</body>
<script>
    function shareSurat() {
        if (navigator.share) {
            navigator.share({
                title: document.title,
                text: 'Cek surat ini.',
                url: window.location.href
            }).then(() => {
                console.log('Berhasil dishare!');
            }).catch((err) => {
                console.error('Gagal share:', err);
            });
        } else {
            alert('Browser kamu belum support tombol share. Copy link manual aja ya 😅');
        }
    }
    </script>
    
</html>
