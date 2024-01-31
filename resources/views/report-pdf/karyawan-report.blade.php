<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Report Karyawan - IMP</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: small;
        }

        h1,
        h3,
        h4 {
            margin-bottom: 10px;
            text-align: center;
            /* Memberikan ruang di bawah judul */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        td {
            background-color: #fff;
        }


        tfoot {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <h1>REKAPAN EVENT KARYAWAN</h1>
    <h3>INDONESIA MULTIMEDIA PROJECT</h3>
    <h4>{{ $crewEvents[0]->karyawan->nama }}</h4>
    <h4>{{ $crewEvents[0]->karyawan->jenis_bank }} | {{ $crewEvents[0]->karyawan->nomer_rekening }}</h4>

    <table border='1'>
        <thead>
            <tr>
                <th>NO</th>
                <th>TANGGAL ACARA</th>
                <th>UKURAN</th>
                <th>VENUE</th>
                <th>STATUS</th>
                <th>KETERANGAN</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($crewEvents as $crewEvent)
                <tr>
                    <th>{{ $loop->iteration }}</th>
                    <td>{{ $crewEvent->event->getFormattedDateRangeAttribute() }}</td>
                    <td>{{ $crewEvent->event->ukuran_led }}</td>
                    <td>{{ $crewEvent->event->venue }}</td>
                    <td>{{ $crewEvent->status->status_crew }}</td>
                    <td>{{ $crewEvent->keterangan->keterangan_crew }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="5">TOTAL EVENT</td>
                <td>{{ count($crewEvents) }}</td>
            </tr>
        </tfoot>
    </table>
</body>

</html>
