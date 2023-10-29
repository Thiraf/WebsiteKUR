@extends('backend.layout.main')

@section('title')
    Riwayat Pengajuan
@endsection

@section('actions')
@endsection

@push('styles')
  <link rel="stylesheet" href="{{ asset('theme/libs/jquery/jquery-ui/jquery-ui.min.css') }}" type="text/css" />
  <link rel="stylesheet" href="{{ asset('theme/libs/jquery/chosen/bootstrap-chosen.css') }}" type="text/css" />
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Riwayat Pengajuan Diterima
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered"  id="datatable">
                        <thead>
                            <tr>
                                <th>Nomor Registrasi</th>
                                <th>Pemohon</th>
                                <th>Telp</th>
                                <th>Alamat</th>
                                <th>Jenis Usaha</th>
                                <th>Jenis KUR</th>
                                <th>Jumlah Pengajuan</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    Riwayat Pengajuan Ditolak
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered"  id="datatable2">
                        <thead>
                            <tr>
                                <th>Nomor Registrasi</th>
                                <th>Pemohon</th>
                                <th>Telp</th>
                                <th>Alamat</th>
                                <th>Jenis Usaha</th>
                                <th>Jenis KUR</th>
                                <th>Jumlah Pengajuan</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    {{-- @include('backend.pages.credit_request.modals.detail') --}}

@endsection

@push('scripts')
<script src="{{ asset('theme/libs/jquery/chosen/chosen.jquery.min.js') }}"></script>
<script src="{{ asset('theme/libs/jquery/jquery-ui/jquery-ui.min.js') }}"></script>
<script>
  var app = new Vue({
            el : "#content",
            data : function(){
                return {
                    datatable : null,
                    datatable2 : null,
                }
            },
            mounted() {
                this.dataTable = $("#datatable").DataTable({
                    ajax: "{{ route('api.credit-request.history') }}?type=datatable_accepted",
                    processing: true,
                    serverSide : true,
                    order: [[ 1, "asc" ]],
                    columns: [
                        { data: "registration_number", name: "registration_number", orderable: false },
                        { data: "member_name", name: "member_name", orderable: false },
                        { data: "member_phone", name: "member_phone", orderable: false },
                        { data: "member_address", name: "member_address", orderable: false },
                        { data: "business_name", name: "business_name", orderable: false },
                        { data: "kur_types_name", name: "kur_types_name", orderable: false},
                        { data: "amount", name: "amount", orderable: false },
                        { data: "status", name: "status", orderable: false },
                    ]
                });
                this.dataTable = $("#datatable2").DataTable({
                    ajax: "{{ route('api.credit-request.history')}}?type=datatable_rejected",
                    processing: true,
                    serverSide : true,
                    order: [[ 1, "asc" ]],
                    columns: [
                        { data: "registration_number", name: "registration_number", orderable: false },
                        { data: "member_name", name: "member_name", orderable: false },
                        { data: "member_phone", name: "member_phone", orderable: false },
                        { data: "member_address", name: "member_address", orderable: false },
                        { data: "business_name", name: "business_name", orderable: false },
                        { data: "kur_types_name", name: "kur_types_name", orderable: false},
                        { data: "amount", name: "amount", orderable: false },
                        { data: "status", name: "status", orderable: false },
                    ]
                });
                $('.datepicker').datepicker();
            },
            methods : {
                showData(id) {
                    self = this
                    fetch('/api/credit-request/'+id)
                        .then(function(data) {
                            return data.json();
                        })
                        .then(function(data) {
                            console.log(data.data);
                            self.data = data.data
                            $("#detail-credit-request-modal").modal('show')
                        })
                }
            }
         });

         $(document).on('click','.show-detail',function(){
            let id = $(this).data('id')
            app.showData(id);
         })

</script>
@endpush
