@extends('backend.layout.main')

@section('title')
    Daftar Pengajuan
@endsection

@section('actions')
@endsection

@push('styles')
  <link rel="stylesheet" href="{{ asset('theme/libs/jquery/jquery-ui/jquery-ui.min.css') }}" type="text/css" />
  <link rel="stylesheet" href="{{ asset('theme/libs/jquery/chosen/bootstrap-chosen.css') }}" type="text/css" />
@endpush

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
                    Daftar Pengajuan
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Nomor Registrasi</label>
                                <input type="text" name="registration_no" v-model="filter.registration_no" class="form-control">
                            </div>
                        </div>
                        @if(auth()->user()->role_id == 1 || auth()->user()->role_id == 2 || auth()->user()->role_id == 3)
                            <input type="hidden" value="{{auth()->user()->bank_id}}" class="form-control">
                        @else
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">Bank Penyalur</label>
                                    <select name="banks" class="form-control" v-model="filter.bank">
                                        @foreach($banks as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        @endif
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Periode</label>
                                <div class="input-group m-b">
                                    <input type="text" readonly name="start_date" v-model="filter.start_date" class="form-control datepicker" style="background: white">
                                    <span class="input-group-addon" style="background: white">-</span>
                                    <input type="text" readonly name="end_date" v-model="filter.end_date" class="form-control datepicker" style="background: white">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <button class="btn btn-search btn-addon btn-info form-control" @click="filterDatatable"><i class="fa fa-search"></i> Filter</button>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <a href="#" class="btn btn-addon btn-success form-control" @click="exportExcel"><i class="fa fa-download"></i> Export Excel</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">

                    <table class="table table-bordered"  id="datatable">
                        <thead>
                            <tr>
                                @if(auth()->user()->role_id != 0 && auth()->user()->role_id != 3)
                                <th width="250">Action</th>
                                @endif
                                <th>Nomor Registrasi</th>
                                <th>Pemohon</th>
                                <th>Telp</th>
                                <th>Alamat</th>
                                <th>Kelurahan</th>
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
                    data : {
                        address: null,
                        amount: null,
                        bank_id: null,
                        bank_name: null,
                        business_name: null,
                        business_permission: null,
                        business_type_id: null,
                        created_at: null,
                        deleted_at: null,
                        district_id: null,
                        email: null,
                        gender: null,
                        id: null,
                        name: null,
                        npwp: null,
                        phone: null,
                        photo: null,
                        process_by: null,
                        regency_id: null,
                        registration_number: null,
                        reject_message: null,
                        status: null,
                        termin_id: null,
                        termin_name: null,
                        updated_at: null,
                        verification_date: null,
                        village: null,
                    },
                    filter : {
                        bank: '',
                        registration_no: '',
                        start_date: '',
                        end_date: ''
                    },
                    isEdit : false,
                    idEdit : null,
                    datatable : null,
                }
            },
            directives : {
                'bank-select' : {
                    inserted : function(el,binding,vnode) {
                        console.log(vnode.context)


                        $(el).chosen({
                            width : '100%',
                        }).on('change',function(){
                            vnode.context.data.bank_id = $(this).val()
                            vnode.context.filter.bank = $(this).val()
                        });


                    }
                }
            },
            mounted() {
                this.dataTable = $("#datatable").DataTable({
                    ajax: "{{ route('api.credit-request.index') }}",
                    processing: true,
                    serverSide : true,
                    order: [[ 1, "asc" ]],
                    columns: [
                        @if(auth()->user()->role_id != 0 && auth()->user()->role_id != 3)
                        { data: "action", name: "action", orderable: false },
                        @endif
                        { data: "registration_number", name: "registration_number", orderable: false },
                        { data: "member_name", name: "member_name", orderable: false },
                        { data: "member_phone", name: "member_phone", orderable: false },
                        { data: "member_address", name: "member_address", orderable: false },
                        { data: "village", name: "village", orderable: false },
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
                },
                exportExcel(){
                    let exportURL = "{{route('manage.credit-request.export')}}?" + `registration_no=${this.filter.registration_no}&bank=${this.filter.bank}&start_date=${$('input[name=start_date]').val()}&end_date=${$('input[name=end_date]').val()}`
                    window.location = exportURL
                },
                filterDatatable(){
                    let datatableURL = "{{ route('api.credit-request.index') }}?" + `registration_no=${this.filter.registration_no}&bank=${this.filter.bank}&start_date=${$('input[name=start_date]').val()}&end_date=${$('input[name=end_date]').val()}`
                    this.dataTable.ajax.url(datatableURL).load();
                }
            }
         });

         $(document).on('click','.show-detail',function(){
            let id = $(this).data('id')
            app.showData(id);
         })

</script>
@endpush

