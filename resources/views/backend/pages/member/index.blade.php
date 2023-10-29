@extends('backend.layouts.main')

@section('title')
    Daftar Member
@endsection

{{-- @section('actions')
    <a href="#" @click="addItem()" class="btn btn-addon btn-info"><i class="fa fa-plus"></i> Tambah Member</a>
@endsection --}}

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
                    Daftar Member 
                </div>
                <div class="table-responsive">
                    
                    <table class="table table-bordered"  id="datatable">
                        <thead>
                            <tr>
                                <th width="170">Action</th>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>No Handphone</th>
                                <th>Jenis Kelamin</th>
                                <th>Status Blokir</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    @include('backend.pages.member.modals.form')
    @include('backend.pages.member.modals.form-blocked')

@endsection

@push('scripts')
<script>
  var app = new Vue({
            el : "#content",
            data : function(){
                return {
                    member : {
                        full_name : null,
                        nik: null,
                        email: null,
                        phone: null,
                        second_phone: null,
                        address: null,
                        gender: null,
                        dob: null,
                    },
                    form:{
                        is_blocked: null,
                    },
                    isEdit : false,
                    idEdit : null,
                    datatable : null              
                }
            },
            mounted() {
                this.dataTable = $("#datatable").DataTable({
                    ajax: "{{ route('api.member.index') }}",
                    processing: true,
                    serverSide : true,
                    order: [[ 1, "asc" ]],
                    columns: [
                        { data: "action", name: "action", orderable: false },
                        { data: "nik", name: "nik", orderable: true },
                        { data: "full_name", name: "full_name", orderable: false },
                        { data: "email", name: "email", orderable: false },
                        { data: "phone", name: "phone", orderable: false },
                        { data: "gender", name: "gender", orderable: false },
                        { data: "is_blocked", name: "is_blocked", orderable: false },
                    ]
                });

                
            },
            methods : {

                addItem() {
                    $("#form-member-modal").modal('show')

                },

                blockItem(id) {
                    let self = this
                    axios.get('{{url("/")}}/api/member/'+id)
                    .then(function (response) {
                        // handle success
                        if(!response.error) {
                            self.form = {
                                id : response.data.data.id,
                                is_blocked : response.data.data.is_blocked,
                            }
                            self.idEdit = response.data.data.id
                            
                            $("#form-member-block-modal").modal('show')

                        } else {

                        }
                    })
                    .catch(function (error) {
                        // handle error
                        
                    })
                    .finally(function () {
                        // always executed
                    });
                },

                reset() {
                    this.member = {
                        full_name : null,
                        nik: null,
                        email: null,
                        phone: null,
                        second_phone: null,
                        address: null,
                        gender: null,
                        dob: null,
                    },
                    this.isEdit = false,
                    this.idEdit = null  
                },

                editItem(id) {
                    let self = this
                    axios.get('{{url("/")}}/api/member/'+id)
                        .then(function (response) {
                            // handle success
                            if(!response.error) {
                                self.member = {
                                    id : response.data.data.id,
                                    full_name : response.data.data.full_name,
                                    nik: response.data.data.nik,
                                    email: response.data.data.email,
                                    phone: response.data.data.phone,
                                    second_phone: response.data.data.second_phone,
                                    address: response.data.data.address,
                                    gender: response.data.data.gender,
                                    dob: response.data.data.dob,
                                }
                                self.isEdit = true,
                                self.idEdit = response.data.data.id
                                
                                $("#form-member-modal").modal('show')

                            } else {

                            }
                        })
                        .catch(function (error) {
                            // handle error
                            
                        })
                        .finally(function () {
                            // always executed
                        });
                    
                },

                submitForm() {

                    if(!this.isEdit) {
                        let self = this
                        axios.post('{{url("/")}}/api/member', {
                            full_name: self.member.full_name,
                        })
                        .then(function (response) {
                            if(!response.data.data.error) {
                                
                            }
                        })
                        .catch(function (error) {
                            console.log(error);
                        })
                        .finally(function () {
                            $("#form-member-modal").modal('hide')
                            $("#notification").fadeIn()
                            self.dataTable.ajax.reload();

                            // always executed
                        });;

                    } else {

                        let self = this
                        axios.put('{{url("/")}}/api/member/'+self.idEdit, {
                            full_name: self.member.full_name,
                        })
                        .then(function (response) {
                            if(!response.data.data.error) {
                                
                            }
                        })
                        .catch(function (error) {
                            console.log(error);
                        })
                        .finally(function () {
                            $("#form-member-modal").modal('hide')
                            $("#notification").fadeIn()
                            self.dataTable.ajax.reload();

                            // always executed
                        });;

                    }
                    this.reset()
                },
                submitFormBlocked() {

                    let self = this
                    axios.put('{{url("/")}}/api/member/' + self.idEdit + '/open-block', {
                        is_blocked: self.form.is_blocked,
                    })
                    .then(function (response) {
                        if (!response.data.data.error) {

                        }
                    })
                    .catch(function (error) {
                        console.log(error);
                    })
                    .finally(function () {
                        $("#form-member-block-modal").modal('hide')
                        $("#notification").fadeIn()
                        self.dataTable.ajax.reload();
                        // always executed
                    });;
                    this.reset()
                },

            }
         });

         $(document).on('click','.edit-item',function(){
            let id = $(this).data('id')
            app.editItem(id)
         });

         $(document).on('click','.block-item',function(){
            let id = $(this).data('id')
            app.blockItem(id)
         })

</script>
@endpush