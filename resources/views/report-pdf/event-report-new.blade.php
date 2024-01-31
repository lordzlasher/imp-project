<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Report Event - IMP</title>
    <style>
        /* Add your styles directly within the Blade template */
        body {
            font-family: Arial, sans-serif;
            font-size: small;
        }

        h1,
        h3 {
            margin-bottom: 20px;
            text-align: center;
        }

        .tg {
            border-collapse: collapse;
            border-spacing: 0;
            table-layout: fixed;
            /* Explicitly set table layout */
            width: 100%;
            /* Ensure the table takes the full width */
        }

        .tg th,
        .tg td {
            border: 1px solid black;
            font-family: Arial, sans-serif;
            font-size: 14px;
            overflow: hidden;
            padding: 10px 5px;
            word-break: normal;
        }

        .tg th {
            font-weight: normal;
            background-color: #f2f2f2;
        }

        .tg .tg-ve69 {
            background-color: #F2F2F2;
            font-weight: bold;
            text-align: left;
            vertical-align: middle;
        }

        .tg .tg-zr06 {
            background-color: #FFF;
            text-align: left;
            vertical-align: middle;
        }

        tfoot {
            font-weight: bold;
        }

        @media print {
            tr {
                page-break-inside: initial;
                display: block;
            }
        }
    </style>
</head>

<body>
    <div id="header">
        <h1>REKAPAN EVENT</h1>
        <h3>INDONESIA MULTIMEDIA PROJECT</h3>
    </div>

    <table class='tg' border='1'>
        <thead>
            <tr>
                <th class="tg-ve69">NO</th>
                <th class="tg-ve69">TANGGAL LOADING</th>
                <th class="tg-ve69">TANGGAL ACARA</th>
                <th class="tg-ve69">UKURAN</th>
                <th class="tg-ve69">VENUE</th>
                <th class="tg-ve69">CREW</th>
                <th class="tg-ve69">STATUS</th>
                <th class="tg-ve69">KETERANGAN</th>
                <th class="tg-ve69">NOTE</th>
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
            @endforeach
        </tbody>
        <tfoot>
            <tr class="tg-ve69">
                <td colspan="8">TOTAL EVENT</td>
                <td>2</td>
            </tr>
        </tfoot>
    </table>
</body>

</html>
