<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{asset('assets/css/data.css')}}" rel="stylesheet">
    <title>Dashboard Admin</title>
</head>
<body>

     <div class="halaman">
    <p style="text-align:center; font-weight: bold; font-size:25px;">Laporan Pegadaian</p>
</div>
<div class="menu" style="text-align:center">
                    <a href="{{route('index')}}">Home</a> |
                    <a href="{{route('logout')}}">Log-Out</a>
            </div>
            <div style="display: flex; justify-content: flex-end; align-items: center;">
        <form action="" method="GET">
            @csrf
            {{--menggunakan method GET karna route unutk masuk ke halaman data ini menggunakan ::get--}}
            <input type="text" name="search" placeholder="Cari berdasarkan nama...">
            <button type="submit" class="btn-login" style="margin-top: -1px;border-radius:70px; background-color:#9CFF2E; color: black; width:80px;height:20px;">Cari</button>
        </form>
        {{-- refresh balik lagi ke route data karna nanti pas di kluk refresh mau bersihin riwayat pencarian 
             sebelumnya dan balikin lagi nya ke halaman data lagi--}}
        <a href="{{route('data')}}" style="margin-left: 10px; margin-top: -2px">Refresh</a>
        <a href="/exportpdf" style="margin-left: 10px; margin-top:-2px;">Cetak PDF</a>
        <a href="#" style="margin-left: 10px; margin-top:-2px;">Cetak Excel</a>

    </div>
    </div>
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
            <th>Aksi</th>

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
        @php
            $tlp = substr_replace($item->no_tlp, "62",0,1);
            @endphp

            @php
            if($item->response) {
             $PesanWA='hallo' . $item->nama . ' ! pegadaian anda ' .
             $item->response['status'] . '.Silahkan Pergi ke cabang kami yang ada :' .
             $item->response['pesan'];
            }
            else{
                $PesanWA ='Pengaduan anda';
            }
             @endphp
            
            <td><a href="https://wa.me/{{$tlp}}?text={{$PesanWA}}"
            target="_blank">{{$tlp}}</a></td>
        <td>{{$item['nik']}}</td>
        <td>{{$item['item']}}</td>
          <td><a href="../assets/image/{{$item->foto}}"
                target="_blank">
            <img src="{{asset('assets/image/' . $item->foto)}}" style="height:100px; width:200px"></td>
            <td>
                @if ($item->response)
                {{$item->response['status']}}
                @else
                -
                @endif
        </td>
        <td>
        @if ($item->response)
                {{$item->response['pesan']}}
                @else
                -
                @endif
        </td>
        <td><p>{{\Carbon\Carbon::parse($item['created-at'])->format('j,F, y')}}</p></td>
        <td>
                <form action="/hapus/{{$item->id}}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-danger" type="submit"style="border-radius:70px; background-color:#FF0032; color: black; width:100px;height:30px;"> Hapus</button>
                </form><br>
                <form action="{{route('create.pdf', $item->id)}}" method="GET">
                                @csrf
                                <button class="button-17" type="submit" style="border-radius:70px; background-color:#9CFF2E; color: black; width:100px;height:30px;">Print</button>
                            </form>
            </td>
        </tr>
            
         @endforeach       
    </tbody>
</table>
</body>
</html>

