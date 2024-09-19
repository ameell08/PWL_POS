<!DOCTYPE html>
<html>
    <head>
        <title>
            Data User
        </title>
    </head>
    <body>
        <h1>
            Data User
        </h1>
        <table border="1" cellpadding="2" cellspacing="0">
            <tr>
                <th>Jumlah Pengguna</th>
            </tr>
            {{-- @foreach ($data as $d) --}}
                <tr>
                    <td>{{ $data }}</td>
                </tr>
            {{-- @endforeach --}}
        </table>
    </body>
</html>