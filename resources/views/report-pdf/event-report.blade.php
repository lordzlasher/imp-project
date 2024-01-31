<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Report Event - IMP</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: small;
        }

        h1,
        h3 {
            margin-bottom: 20px;
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
    <div id="header">
        <h1>REKAPAN EVENT</h1>
        <h3>INDONESIA MULTIMEDIA PROJECT</h3>
    </div>

    <table border='1'>
        <thead>
            <tr>
                <th>NO</th>
                <th>TANGGAL LOADING</th>
                <th>TANGGAL ACARA</th>
                <th>UKURAN</th>
                <th>VENUE</th>
                <th>CREW</th>
                <th>STATUS</th>
                <th>KETERANGAN</th>
                <th>NOTE</th>
            </tr>
        </thead>
        <tbody>
            @php
                $count = 1;
            @endphp
            @foreach ($events as $event)
                @php
                    $eventCrews = $event->eventCrew;
                    $rowCount = count($eventCrews);
                @endphp

                {{-- Check if eventCrews is not empty --}}
                @if ($rowCount > 0)
                    @foreach ($eventCrews as $index => $eventCrew)
                        <tr>
                            @if ($index === 0)
                                <td rowspan="{{ $rowCount }}">{{ $count++ }}</td>
                                <td rowspan="{{ $rowCount }}">
                                    {{ $event->getTanggalLoadingFormattedAttribute() }}
                                </td>
                                <td rowspan="{{ $rowCount }}">{{ $event->getFormattedDateRangeAttribute() }}
                                </td>
                                <td rowspan="{{ $rowCount }}">{{ $event->ukuran_led }}</td>
                                <td rowspan="{{ $rowCount }}">{{ $event->venue }}</td>
                            @endif
                            <td>{{ $eventCrew->karyawan->nama }}</td>
                            <td>{{ $eventCrew->status->status_crew }}</td>
                            <td>{{ $eventCrew->keterangan->keterangan_crew }}</td>
                            @if ($index === 0)
                                <td rowspan="{{ $rowCount }}">{{ $event->note }}</td>
                            @endif
                        </tr>
                    @endforeach
                @else
                    {{-- If eventCrews is empty, display a row with event information --}}
                    <tr>
                        <td>{{ $count++ }}</td>
                        <td>{{ $event->getTanggalLoadingFormattedAttribute() }}</td>
                        <td>{{ $event->getFormattedDateRangeAttribute() }}</td>
                        <td>{{ $event->ukuran_led }}</td>
                        <td>{{ $event->venue }}</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>{{ $event->note }}</td>
                    </tr>
                @endif
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="8">TOTAL EVENT</td>
                <td>{{ $count - 1 }}</td>
            </tr>
        </tfoot>
    </table>
</body>

</html>
