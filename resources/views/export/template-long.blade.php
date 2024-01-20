<!DOCTYPE html>
<html lang="en">

<head>
</head>

<body>

<table style="margin-bottom: 20px;">
    <tr>
        <td>
            <table>
                <tr>
                    <td colspan="3"  style="font-weight: bold; text-align: center; width: 25px;">
                        Adjust Stuffing Box
                    </td>
                </tr>
                <tr>
                    <th style="font-weight: bold; text-align: center; width: 25px;">No</th>
                    <th style="font-weight: bold; text-align: center; width: 250px;">Nama</th>
                    <th style="font-weight: bold; text-align: center;">Total</th>
                </tr>
                @foreach ($adjustStuffingBox as $name)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $name->name }}</td>
                        <td style="text-align: center">{{ $name->count }}</td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="2" style="font-weight: bold; text-align: center">Total</td>
                    <td style="font-weight: bold; text-align: center">{{ $adjustStuffingBox->sum('count') }}</td>
                </tr>
            </table>
        </td>
        <td style="padding-left: 20px;">
            <table>
                <tr>
                    <td colspan="3"  style="font-weight: bold; text-align: center; width: 25px;">
                        Top Soil
                    </td>
                </tr>
                <tr>
                    <th style="font-weight: bold; text-align: center; width: 25px;">No</th>
                    <th style="font-weight: bold; text-align: center; width: 250px;">Nama</th>
                    <th style="font-weight: bold; text-align: center;">Total</th>
                </tr>
                @foreach ($topSoil as $name)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $name->name }}</td>
                        <td style="text-align: center">{{ $name->count }}</td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="2" style="font-weight: bold; text-align: center">Total</td>
                    <td style="font-weight: bold; text-align: center">{{ $topSoil->sum('count') }}</td>
                </tr>
            </table>
        </td>
        <td style="padding-left: 20px;">
            <table>
                <tr>
                    <td colspan="3"  style="font-weight: bold; text-align: center; width: 25px;">
                        CRSB
                    </td>
                </tr>
                <tr>
                    <th style="font-weight: bold; text-align: center; width: 25px;">No</th>
                    <th style="font-weight: bold; text-align: center; width: 250px;">Nama</th>
                    <th style="font-weight: bold; text-align: center;">Total</th>
                </tr>
                @foreach ($csrb as $name)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $name->name }}</td>
                        <td style="text-align: center">{{ $name->count }}</td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="2" style="font-weight: bold; text-align: center">Total</td>
                    <td style="font-weight: bold; text-align: center">{{ $csrb->sum('count') }}</td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>
