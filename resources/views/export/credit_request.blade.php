<table>
    <thead>
    <tr>
        <th>Nomor Registrasi</th>
        <th>Nama Pemohon</th>
        <th>Nomor Telepon Pemohon</th>
        <th>Alamat Pemohon</th>
        <th>Jenis Usaha</th>
        <th>Ijin Usaha</th>
        <th>NPWP</th>
        <th>Kode Pos</th>
        <th>Kabupaten</th>
        <th>Kecamatan</th>
        <th>Desa</th>
        <th>Jenis Kur</th>
        <th>Termin</th>
        <th>Bank Pengajuan</th>
        <th>Jumlah Pengajuan</th>
        <th>Tanggal Pengajuan</th>
        <th>Status</th>
    </tr>
    </thead>
    <tbody>
    @foreach($credit_request as $item)
        <tr>
            <td>{{ $item->registration_number }}</td>
            <td>{{ $item->member->full_name ?? '-' }}</td>
            <td>{{ $item->member->phone ?? '-' }}</td>
            <td>{{ $item->member->address ?? '-' }}</td>
            <td>{{ $item->business->name ?? '-' }}</td>
            <td>{{ $item->business_permit->name ?? '-' }}</td>
            <td>{{"'". $item->npwp ?? '-' }}</td>
            <td>{{ $item->postal_code ?? '-' }}</td>
            <td>{{ $item->regency->name ?? '-' }}</td>
            <td>{{ $item->district->name ?? '-' }}</td>
            <td>{{ $item->village ?? '-' }}</td>
            <td>{{ $item->kur_type->name ?? '-' }}</td>
            <td>{{ $item->termin->name ?? '-' }}</td>
            <td>{{ $item->bank->name ?? '-' }}</td>
            <td>{{ $item->amount }}</td>
            <td>{{ $item->created_at }}</td>
            <td>{{ $item->status }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
