{{-- <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Detail Pengajuan {{$data->registration_number}}
            </div>
            <div class="panel-body">
                <div class="row">
                        <div class="col-md-6">
                            <table>
                                <tr>
                                    <td width="120">Nomor Registrasi</td>
                                    <td width="15">:</td>
                                    <th>{{$data->registration_number}}</th>
                                </tr>
                                <tr>
                                    <td width="120">Name</td>
                                    <td width="15">:</td>
                                    <th class="text-uppercase">{{$data->member->full_name}}</th>
                                </tr>
                                <tr>
                                    <td width="120">Gender</td>
                                    <td width="15">:</td>
                                    <th>{{$data->gender == 1 ? 'Laki - Laki' : 'Perempuan'}}</th>
                                </tr>
                                <tr>
                                    <td width="120">Telp</td>
                                    <td width="15">:</td>
                                    <th>{{$data->member->phone}}</th>
                                </tr>
                                <tr>
                                    <td width="120">Email</td>
                                    <td width="15">:</td>
                                    <th>{{$data->member->email == null ? '-' : $data->member->email}}</th>
                                </tr>
                                <tr>
                                    <td width="120">Kabupaten</td>
                                    <td width="15">:</td>
                                    <th>{{$data->regency->name}}</th>
                                </tr>
                                <tr>
                                    <td width="120">Kecamatan</td>
                                    <td width="15">:</td>
                                    <th>{{$data->district->name}}</th>
                                </tr>
                                <tr>
                                    <td width="120">Jenis Usaha</td>
                                    <td width="15">:</td>
                                    <th>{{$data->business->name}}</th>
                                </tr>
                                <tr>
                                    <td width="120">Ijin Usaha</td>
                                    <td width="15">:</td>
                                    <th>{{$data->business_permit->name}}</th>
                                </tr>
                                <tr>
                                    <td width="120">NPWP</td>
                                    <td width="15">:</td>
                                    <th>{{$data->npwp == null ? '-' : $data->npwp}}</th>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <table>

                                <tr>
                                    <td width="120">Desa</td>
                                    <td width="15">:</td>
                                    <th>{{$data->village}}</th>
                                </tr>
                                <tr>
                                    <td width="120">Alamat</td>
                                    <td width="15">:</td>
                                    <th>{{$data->member->address}}</th>
                                </tr>

                                <tr>
                                    <td width="120">Nominal</td>
                                    <td width="15">:</td>
                                    <th>Rp {{number_format($data->amount,0,',','.')}}</th>
                                </tr>

                                <tr>
                                    <td width="120">Bank Penyalur</td>
                                    <td width="15">:</td>
                                    <th>{{$data->bank->name}}</th>
                                </tr>
                                <tr>
                                    <td width="120">Termin</td>
                                    <td width="15">:</td>
                                    <th>{{$data->termin->name}}</th>
                                </tr>
                                <tr>
                                    <td width="120">Status</td>
                                    <td width="15">:</td>
                                    <th>{{$data->status}}</th>
                                </tr>
                                @if($data->status == 'DITOLAK')
                                <tr>
                                    <td width="120">Alasan Penolakan</td>
                                    <td width="15">:</td>
                                    <th>{{$data->reject_message}}</th>
                                </tr>
                                @endif
                                @if($data->status == 'DISETUJUI')
                                <tr>
                                    <td width="120">Plafon Disetujui</td>
                                    <td width="15">:</td>
                                    <th>Rp {{  number_format($data->accepted_plafond,0,',','.') }}</th>
                                </tr>
                                @endif
                                <tr>
                                    <td width="120">Foto Tempat Usaha</td>
                                    <td width="15">:</td>
                                    <th></th>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <img src="{{$data->business_place_photo}}" alt="" height="150px">
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
            </div>
        </div>
    </div> --}}

<div class="row">
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                Data Identitas
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <table>
                            <tr>
                                <td width="120">Name</td>
                                <td width="15">:</td>
                                <th class="text-uppercase">{{$data->member->full_name}}</th>
                            </tr>
                            <tr>
                                <td width="120">Gender</td>
                                <td width="15">:</td>
                                <th>{{$data->gender == 1 ? 'Laki - Laki' : 'Perempuan'}}</th>
                            </tr>
                            <tr>
                                <td width="120">Telp</td>
                                <td width="15">:</td>
                                <th>{{$data->member->phone}}</th>
                            </tr>
                            <tr>
                                <td width="120">Email</td>
                                <td width="15">:</td>
                                <th>{{$data->member->email == null ? '-' : $data->member->email}}</th>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                Data Alamat Usaha
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <table>
                            <tr>
                                <td width="120">Kabupaten</td>
                                <td width="15">:</td>
                                <th>{{$data->regency->name}}</th>
                            </tr>
                            <tr>
                                <td width="120">Kecamatan</td>
                                <td width="15">:</td>
                                <th>{{$data->district->name}}</th>
                            </tr>
                            <tr>
                                <td width="120">Desa</td>
                                <td width="15">:</td>
                                <th>{{$data->village}}</th>
                            </tr>
                            <tr>
                                <td width="120">Alamat</td>
                                <td width="15">:</td>
                                <th>{{$data->member->address}}</th>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="row">
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                Data Usaha
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <table>
                            <tr>
                                <td width="120">Jenis Usaha</td>
                                <td width="15">:</td>
                                <th>{{$data->business->name}}</th>
                            </tr>
                            <tr>
                                <td width="120">Ijin Usaha</td>
                                <td width="15">:</td>
                                <th>{{$data->business_permit->name}}</th>
                            </tr>
                            <tr>
                                <td width="120">NPWP</td>
                                <td width="15">:</td>
                                <th>{{$data->npwp == null ? '-' : $data->npwp}}</th>
                            </tr>
                            <tr>
                                <td width="120">Kode Pos</td>
                                <td width="15">:</td>
                                <th>{{$data->postal_code == null ? '-' : $data->postal_code}}</th>
                            </tr>
                            <tr>
                                <td width="120">Foto Tempat Usaha</td>
                                <td width="15">:</td>
                                <th>
                                    <img src="{{$data->business_place_photo}}" alt="" width="100%">
                                </th>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                Data Pengajuan
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <table>
                            <tr>
                                <td width="120">Nominal</td>
                                <td width="15">:</td>
                                <th>Rp {{number_format($data->amount,0,',','.')}}</th>
                            </tr>
                            <tr>
                                <td width="120">Bank Penyalur</td>
                                <td width="15">:</td>
                                <th>{{$data->bank->name}}</th>
                            </tr>
                            <tr>
                                <td width="120">Termin</td>
                                <td width="15">:</td>
                                <th>{{$data->termin->name}}</th>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="row">
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                Status
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <table>
                            <tr>
                                <td width="120">Status</td>
                                <td width="15">:</td>
                                <th>{{$data->status}}</th>
                            </tr>
                            @if($data->status == 'DITOLAK')
                            <tr>
                                <td width="120">Alasan Penolakan</td>
                                <td width="15">:</td>
                                <th>{{$data->reject_message}}</th>
                            </tr>
                            @endif
                            @if($data->status == 'DISETUJUI')
                            <tr>
                                <td width="120">Plafon Disetujui</td>
                                <td width="15">:</td>
                                <th>Rp {{  number_format($data->accepted_plafond,0,',','.') }}</th>
                            </tr>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                History
            </div>
            <div class="panel-body">
                <div class="row">
                    @foreach ($activity as $item)
                        <div class="col-sm-12">
                            <small>{{date('Y-m-d - H:i', strtotime($item->created_at))}}</small>
                            <p>{{$item->remark}}</p>
                            <hr>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

</div>
