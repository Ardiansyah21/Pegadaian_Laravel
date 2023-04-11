<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('assets/css/home.css')}}">
    <title>form</title>
</head>
<body>
    <form action="{{route('response.update', $pegadaianId)}}" method="POST" style="width: 500px; margin: 50px auto; display:block">
        @csrf
        @method('PATCH')
        <div class="input-card">
            <label for="status">Type </label>
            <select name="status" id="status">
                @if ($pegadaian)
                <option selected hidden disabled> Pilih Type</option>
                <option value="ditolak" {{$pegadaian['status'] == 'ditolak' ? 'selected' : ''}}>ditolak</option>
                <option value="proses" {{$pegadaian['status'] == 'proses' ? 'selected' : ''}}>proses</option>
                <option value="diterima" {{$pegadaian['status'] == 'diterima' ? 'selected' : ''}}>diterima</option>
            @else
                <option selected hidden disabled> Pilih status</option>
                <option value="ditolak">ditolak</option>
                <option value="proses">proses</option>
                <option value="diterima">diterima</option>
                @endif
            </select>
        </div>
        <div class="input-card">
            <label for="pesan">Shop Location:</label>
            <input name="pesan" placeholder="pesan" type="text"
        value="{{ $pegadaian['pesan']}}">        
    </div>

        <fieldset>
        <label for="">Target Date</label>
        <input name="date" placeholder="Target Date" type="date"
        value="{{ $pegadaian['date']}}">
    </fieldset>

        <button type="submit">kirim Response</button>
    </form>
</body>
</html>
