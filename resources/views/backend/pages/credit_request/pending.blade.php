@extends('backend.layouts.main')

@section('title')
    Pending Pengajuan
@endsection

@section('actions')
@endsection

@section('content')
    <div class="row" id="notification" style="display : none">
        <div class="col-md-12">
            <div class="alert alert-success notification-text">
                Data Berhasil di Simpan
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Alasan Dipending
                </div>
                <div class="panel-body">
                    <form action="{{route('manage.credit-request.pending-store',[$data->id])}}" method="POST" id="pendingForm">
                        @csrf
                        <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Alasan Pending</label>
                                        <textarea name="pending_message" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                        <button type="submit" class="btn btn-warning btn-addon " style=""><i class="fa fa-clock-o"></i> Pending</button>
                                </div>
                            </div>   
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="row">
        <div class="col-md-12">
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
                                        <th>{{$data->name}}</th>
                                    </tr>
                                    <tr>
                                        <td width="120">Gender</td>
                                        <td width="15">:</td>
                                        <th>{{$data->gender == 1 ? 'Laki - Laki' : 'Perempuan'}}</th>
                                    </tr>
                                    <tr>
                                        <td width="120">Telp</td>
                                        <td width="15">:</td>
                                        <th>{{$data->phone}}</th>
                                    </tr>
                                    <tr>
                                        <td width="120">Email</td>
                                        <td width="15">:</td>
                                        <th>{{$data->email == null ? '-' : $data->email}}</th>
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
                                        <th>{{$data->business_permission}}</th>
                                    </tr>
                                    <tr>
                                        <td width="120">NPWP</td>
                                        <td width="15">:</td>
                                        <th>{{$data->npwp == null ? '-' : ''}}</th>
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
                                        <th>{{$data->address}}</th>
                                    </tr>
                                            
                                    <tr>
                                        <td width="120">Nominal</td>
                                        <td width="15">:</td>
                                        <th>Rp {{$data->amount}}</th>
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
                                    <tr>
                                        <td width="120">Foto</td>
                                        <td width="15">:</td>
                                        <th></th>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <img src="{{$data->photo}}" alt="" height="150px">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>   
                </div>
            </div>
        </div>
    </div> --}}

    @include('backend.pages.credit_request.modals.detail')
    


    @include('backend.pages.credit_request.modals.detail')

@endsection

@push('scripts')
<script>
    $("#pendingForm").on('submit',function(){
        if(confirm("Apakah anda yakin akan mempending pengajuan ini? \nTindakan tidak dapat dibatalkan!")) {
            return true;
        }
        return false;

    });
</script>
@endpush