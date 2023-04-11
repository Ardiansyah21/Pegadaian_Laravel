<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
</head>
<body>

<style>
    .styled-table {
    border-collapse: collapse;
    margin: 20px 0;
    font-size: 13px;
    font-family: sans-serif;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
    
}
.styled-table thead tr {
    background-color: #9CFF2E;
    color: #0b0b0b;
    text-align: left;
}

.styled-table th,
.styled-table td {
    padding: 8px 10px;
}

.styled-table tbody tr {
    border-bottom: 1px solid #dddddd;
}

.styled-table tbody tr:nth-of-type(even) {
    background-color: #f3f3f3;
}

.styled-table tbody tr:last-of-type {
    border-bottom: 2px solid #9CFF2E;
}

a:link{
    text-decoration:none;};




    </style>
<div style="padding: 0 30px">
    <table class="styled-table">
    <thead>
        <tr>
             <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Age</th>
            <th>Phone</th>
            <th>Nik</th>
            <th>Item</th>
            <th>Foto</th>
            <th>Setatus Respon</th>
            <th>Shop Location</th>
            <th>update At</th>

        </tr>
    </thead>
    <tbody>

    @php
            $no = 1;
        @endphp
        @foreach ($pegadaians as $item)
    <tr>
        <td>{{ $no++ }}</td>
        <td>{{$item['nama']}}</td>
        <td>{{$item['email']}}</td>
        <td>{{$item['age']}}</td>
        <td>{{$item['no_tlp']}}</td>
        <td>{{$item['nik']}}</td>
        <td>{{$item['item']}}</td>
          <td><img src="assets/image/{{$item['foto']}}" style="height:100px; width:200px"></td>
            <td>
                @if ($item['response'])
                {{$item['response']['status']}}
                @else
                -
                @endif
        </td>
        <td>
        @if ($item['response'])
                {{$item['response']['pesan']}}
                @else
                -
                @endif
        </td>
        <td><p>{{\Carbon\Carbon::parse($item['created_at'])->format('j,F, y')}}</p></td>
        </tr>
            
         @endforeach       
    </tbody>
</table>
</body>
</html>

