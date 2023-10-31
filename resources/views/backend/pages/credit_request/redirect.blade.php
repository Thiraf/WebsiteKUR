@extends('backend.layout.main')

@section('title')
    Alihkan Pengajuan
@endsection
@push('styles')
  <link rel="stylesheet" href="{{ asset('theme/libs/jquery/jquery-ui/jquery-ui.min.css') }}" type="text/css" />
  <link rel="stylesheet" href="{{ asset('theme/libs/jquery/chosen/bootstrap-chosen.css') }}" type="text/css" />
@endpush
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
                    PIC Daerah Tujuan
                </div>
                <div class="panel-body">
                    <form action="{{route('manage.credit-request.redirect-store',[$data->id])}}" method="POST">
                        @csrf
                        <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Kontak</label>
                                        <select name="pic_contact" required id="" class="form-control">
                                            <option value=""></option>
                                            @foreach($pics as $item)

                                            <option value="{{$item->id}}">{{$item->roles->name}} - {{ $item->name }} - {{ $item->bank->name }} -
                                                @foreach ($item->userpostalcode as $dt)
                                                    {{ $dt->postal_code }}
                                                @endforeach
                                                {{-- {{ $dt->postal_code !== null ? $dt->postal_code : '-'}}</option> --}}

                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">&nbsp;</label>
                                        <button type="submit" class="btn btn-info btn-addon mt-4" style="margin-top : 25px"><i class="fa fa-pencil"></i> Alihkan</button>
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
<script src="{{ asset('theme/libs/jquery/chosen/chosen.jquery.min.js') }}"></script>
<script src="{{ asset('theme/libs/jquery/jquery-ui/jquery-ui.min.js') }}"></script>
<script>
  $('select[name=pic_contact]').chosen({
        width : '100%',
    }).on('change',function(){

    });
</script>
@endpush
