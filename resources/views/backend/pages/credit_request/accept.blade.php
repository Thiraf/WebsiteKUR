@extends('backend.layout.main')

@section('title')
    Terima Pengajuan
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
                    Nominal Penyetujuan
                </div>
                <div class="panel-body">
                    <form action="{{route('manage.credit-request.accept-store',[$data->id])}}" method="POST">
                        @csrf
                        <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Nominal Pengajuan</label>
                                        <input type="text" readonly class="form-control number-input" value="Rp {{number_format($data->amount,0,',','.')}}">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Jangka Waktu</label>
                                        <input type="text" readonly class="form-control" value="{{$data->termin->name}}">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Plafon Disetujui</label>
                                        <div class="input-group m-b">
                                            <span class="input-group-addon">Rp</span>
                                            <input type="text" class="form-control number-input" name="accepted_plafond" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">&nbsp;</label>
                                        <button type="submit" class="btn btn-success btn-addon mt-4" style="margin-top : 25px"><i class="fa fa-check"></i> Setujui</button>
                                    </div>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('backend.pages.credit_request.detail-component')


    @include('backend.pages.credit_request.modals.detail')

@endsection

@push('scripts')
<script>

</script>
@endpush
