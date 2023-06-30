<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        #absensi {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #absensi td,
        #absensi th {
            border: 1px solid #ddd;
            padding: 8px;
        }

      

    </style>
</head>

<body>
    <table>
        <tr>
            <td>Nama </td>
            <td>:</td>
            <td>{{Auth::user()->name}}</td>
        </tr>
        <tr>
            <td>TLP</td>
            <td>:</td>
            <td>{{Auth::user()->phone ?? '-'}}</td>
        </tr>
        <tr>
            <td>Sekolah </td>
            <td>:</td>
            <td>{{Auth::user()->ojt->sekolah}}</td>
        </tr>

    </table>
    <table id="absensi">
        <thead>
            <tr>
                <td>No</td>
                <td>Pertemuan</td>
                <td>Keterangan Absensi</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($absensis as $absensi)
            <tr >
                <td >
                    {{$loop->iteration}}
                </td>
                <td >
                    {{$absensi->pertemuan->judul}}
                </td>
                <td >
                    {{$absensi->absensi}}
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
</body>

</html>
