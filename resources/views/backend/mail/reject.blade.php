Yth. Bpk/Ibu {{$data->member->full_name}},
<br>
<br>
Pengajuan KUR dengan nomor Registrasi :  {{$data->registration_number}} telah <b>DITOLAK</b>, dengan alasan {{ $data->reject_message }}.
<br>
<br>
Data pengajuan anda adalah sebagai berikut :
<br><br>

<style>
    table {
        border-collapse : collapse;
        border : 1px solid #000;
        width : 100%;
    }
    table td{
        border : 1px solid #000;
        padding : 8px !important;
    }
</style>

<table style="border-collapse : collapse;border : 1px solid #000" border="1">
    <tr>
        <td>Nomor Registrasi</td>
        <td>:</td>
        <td>{{$data->registration_number}}</td>
    </tr>
    <tr>
        <td>Nama</td>
        <td>:</td>
        <td>{{$data->member->full_name}}</td>
    </tr>
    <tr>
        <td>Jenis Kelamin</td>
        <td>:</td>
        <td>{{$data->member->gender == 0 ? 'Perempuan' : 'Laki Laki'}}</td>
    </tr>
    <tr>
        <td>Telp</td>
        <td>:</td>
        <td>{{$data->member->phone}}</td>
    </tr>
    <tr>
        <td>Email</td>
        <td>:</td>
        <td>{{$data->member->email}}</td>
    </tr>
    <tr>
        <td>Kabupaten</td>
        <td>:</td>
        <td>{{$data->regency->name}}</td>
    </tr>
    <tr>
        <td>Kecamatan</td>
        <td>:</td>
        <td>{{$data->district->name}}</td>
    </tr>
    <tr>
        <td>Desa</td>
        <td>:</td>
        <td>{{$data->village}}</td>
    </tr>
    <tr>
        <td>Alamat</td>
        <td>:</td>
        <td>{{$data->member->address}}</td>
    </tr>
    <tr>
        <td>Jenis Usaha</td>
        <td>:</td>
        <td>{{$data->business->name}}</td>
    </tr>
    <tr>
        <td>Ijin Usaha</td>
        <td>:</td>
        <td>{{$data->business_permit->name}}</td>
    </tr>
    <tr>
        <td>NPWP</td>
        <td>:</td>
        <td>{{$data->npwp}}</td>
    </tr>
    <tr>
        <td>Nominal</td>
        <td>:</td>
        <td>Rp {{number_format($data->amount,0,',','.')}}</td>
    </tr>
    <tr>
        <td>Termin</td>
        <td>:</td>
        <td>{{$data->termin->name}}</td>
    </tr>
    <tr>
        <td>Bank Penyalur</td>
        <td>:</td>
        <td>{{$data->bank->name}}</td>
    </tr>
</table>
