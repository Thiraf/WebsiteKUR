@extends('backend.layout.main')

@section('title')
    Dashboard
@endsection
@push('styles')
  <link rel="stylesheet" href="{{ asset('theme/libs/jquery/jquery-ui/jquery-ui.min.css') }}" type="text/css" />
  <link rel="stylesheet" href="{{ asset('theme/libs/jquery/chosen/bootstrap-chosen.css') }}" type="text/css" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
  rel="stylesheet">
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

    <div id="delete-modal" class="modal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Delete Item</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Are you sure you want to delete this item?</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
              <button type="button" class="btn btn-danger" id="confirm-delete">Delete</button>
            </div>
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
                        <div class="col-md-2">
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

			    <div class="col-md-2">
				<div class="form-group">
				   <label for="">Kabupaten/Kota</label>
				  <select name="regency" class="form-control" v-model="filter.regency">
					<?php
					$kota = \DB::table('regencies')
		           		 ->select('id','name')
           				 ->where('province_id',34)
					 ->get();
					?>
					@foreach($kota as $reg)
						<option value="{{$reg->id}}">{{$reg->name}}</option>
					@endforeach
				  </select>
				</div>
			   </div>

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

		  <div class="col-md-2">
		    <div class="form-group">
		     <label for="">Status</label>
			<div class="input-group m-b">
			  <select class="form-control" name="status" v-model="filter.status" >
                    		<option value="DIAJUKAN">DIAJUKAN</option>
                    		<option value="DIPROSES">DIPROSES</option>
                    		<option value="DISETUJUI">DISETUJUI</option>
                    		<option value="DIPENDING">DIPENDING</option>
                  		<option value="DITOLAK">DITOLAK</option>
			 </select>
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
                                <th>Nomor Registrasi</th>
                                <th>Pemohon</th>
                                <th>Telp</th>
                                <th>Alamat</th>
				                <th>Kelurahan</th>
                                <th>Jenis Usaha</th>
                                <th>Jenis KUR</th>
                                <th>Jumlah Pengajuan</th>
                                <th>Tanggal Pengajuan</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
<script src="{{ asset('theme/libs/jquery/chosen/chosen.jquery.min.js') }}"></script>
<script src="{{ asset('theme/libs/jquery/jquery-ui/jquery-ui.min.js') }}"></script>
<script>
  var app = new Vue({
            el : "#content",
            data : function(){
                return {
                    filter : {
                        bank: '',
                        registration_no: '',
                        start_date: '',
                        end_date: '',
			status: '',
			regency:''
                    },
                    isEdit : false,
                    idEdit : null,
                    datatable : null,
                    filter_by : null,
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
                    ajax: "{{ url('manage/') }}?type=datatable",
                    processing: true,
                    serverSide : true,
                    order: [[ 1, "asc" ]],
                    columns: [
                        { data: "registration_number", name: "registration_number", orderable: false },
                        { data: "member_name", name: "member_name", orderable: false },
                        { data: "member_phone", name: "member_phone", orderable: false },
                        { data: "member_address", name: "member_address", orderable: false },
			            { data: "village", name: "village", orderable: false },
                        { data: "business_name", name: "business_name", orderable: false },
                        { data: "kur_types_name", name: "kur_types_name", orderable: false},
                        { data: "amount", name: "amount", orderable: false },
                        { data: "created_at", name: "created_at", orderable: false },
                        { data: "status", name: "status", orderable: false },
                        {
                            data: "action",
                            className: "action",
                            orderable: false,
                            // "mRender" : function ( data, type, row ) {
                            //     return '<a href="#" class="btn btn-danger" id="btnDelete"><i class="bi bi-trash"></i></a>';
                            // }
                        },

                        // { data: "action", name: "action", orderable: false },

                    // { data: "id_kepala", name: "id_kepala" }
                    ]
                });


                self = this;
                $("select[name=filter_by]").chosen({
                    width : '100%',
                }).on('change',function(){
                    self.filter_by = $(this).val()
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
                    let exportURL = "{{route('manage.credit-request.export')}}?" + `registration_no=${this.filter.registration_no}&bank=${this.filter.bank}&start_date=${$('input[name=start_date]').val()}&end_date=${$('input[name=end_date]').val()}&status=${this.filter.status}&regency=${this.filter.regency}`
                    window.location = exportURL
                },
                filterDatatable(){
                    let datatableURL = "{{ route('api.credit-request.index') }}?" + `registration_no=${this.filter.registration_no}&bank=${this.filter.bank}&start_date=${$('input[name=start_date]').val()}&end_date=${$('input[name=end_date]').val()}&status=${this.filter.status}&regency=${this.filter.regency}`
                    this.dataTable.ajax.url(datatableURL).load();
                },
                deleteData(id, row){
                    if(confirm("Apakah anda ingin menghapus data ?")){
                        this.$store.dispatch('deleteTable', {id:row.id});
                    }
                },
                showAlert(){
                    alert('CEK ALERT')
                }
            }
         });

         $(document).on('click','.show-detail',function(){
            let id = $(this).data('id')
            app.showData(id);
         });

         $(document).on('click','#deleteData',function(){


            var confirmed = confirm('Apakah anda yakin akan menghapus data?');
            if (confirmed) {
            // Execute the action here

            } else {
            // Cancel the action or do nothing
                event.preventDefault();
            }
         });

         $(document).on('click','#btnDelete',function(){
            alert("data")
         })

</script>
@endpush
