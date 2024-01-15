<!DOCTYPE html>
<html lang="en">

<head>
</head>

<body>

    <table>
        <tr>
            <th style="font-weight: text-align: center; bolder; width: 25px">No</th>
            <th style="font-weight: text-align: center; bolder; width: 250px">Nama</th>
            <th style="font-weight: text-align: center; bolder;">Total</th>
        </tr>
        @foreach ($names as $name)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $name->name }}</td>
                <td style="text-align: center">{{ $name->count }}</td>
            </tr>
        @endforeach
        <tr>
            <td colspan="2" style="font-weight: bolder; text-align: center">Total</td>
            <td style="font-weight: bolder; text-align: center">{{ $names->sum('count') }}</td>
        </tr>
    </table>


</body>

</html>
