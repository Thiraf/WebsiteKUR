@extends('backend.layouts.main')

@section('title')
    Daftar Bank Penyalur UMI
@endsection

@section('actions')
    <a href="#" @click="addItem()" class="btn btn-addon btn-info"><i class="fa fa-plus"></i> Tambah Bank Penyalur UMI</a>
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
                    Daftar Bank 
                </div>
                <div class="table-responsive">
                    
                    <table class="table table-bordered"  id="datatable">
                        <thead>
                            <tr>
                                <th width="170">Action</th>
                                <th>Nama</th>
                                <th>Kode</th>
                                <th>Status</th>
                                <th>Logo</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    @include('backend.pages.financial_instituion_umi.modals.form')

@endsection

@push('scripts')
<script>
  var app = new Vue({
            el : "#content",
            data : function(){
                return {
                    bank : {
                        logo : null,
                        reason_status: null,
                        status: null,
                        code : null,
                        link: null,
                        name : null,
                        id : null,
                    },
                    isEdit : false,
                    idEdit : null,
                    datatable : null,
                    dropify : null              
                }
            },
            mounted() {
                this.dataTable = $("#datatable").DataTable({
                    ajax: "{{ route('api.financial-institution-umi.index') }}",
                    processing: true,
                    serverSide : true,
                    order: [[ 1, "asc" ]],
                    columns: [
                        { data: "action", name: "action", orderable: false },
                        { data: "name", name: "name", orderable: false },
                        { data: "code", name: "code", orderable: false },
                        { data: "status", name: "status", orderable: false },
                        { data: "logo_rendered", name: "logo_rendered", orderable: false },
                    
                    // { data: "id_kepala", name: "id_kepala" }
                    ]
                });

                this.dropify = $(".dropify").dropify()

                
            },
            methods : {

                addItem() {
                    $("#form-financial-institution-umi-modal").modal('show')

                },

                reset() {
                    this.bank = {
                        logo : null,
                        reason_status: null,
                        status: null,
                        code : null,
                        link: null,
                        name : null,
                        id : null,
                    },
                    this.isEdit = false,
                    this.idEdit = null  
                    $(".dropify-clear").trigger("click");    
                    this.dropify = $(".dropify").dropify()

                },

                editItem(id) {
                    
                    $("#form-financial-institution-umi-modal").modal('show')
                    
                    let self = this
                    this.dropify = this.dropify.data('dropify');
                    this.dropify.resetPreview();
                    this.dropify.clearElement();
                    
                    axios.get('{{url("/")}}/api/financial-institution-umi/'+id)
                        .then(function (response) {
                            // handle success
                            if(!response.error) {
                                self.bank = {
                                    id : response.data.data.id,
                                    name : response.data.data.name,
                                    link : response.data.data.link,
                                    code : response.data.data.code,
                                    status : response.data.data.status,
                                    reason_status : response.data.data.reason_status ? response.data.data.reason_status : null,
                                    logo : response.data.data.logo,
                                }
                                self.isEdit = true,
                                self.idEdit = response.data.data.id
                                
                                self.dropify.settings.defaultFile = response.data.data.logo;
                                self.dropify.destroy();
                                self.dropify.init();

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

                    $(".btn-save").attr('disabled','disabled')
                    $(".btn-save").removeClass('btn-addon')
                    $(".btn-save").html('<i class="fa fa-spinner fa-spin"></i> Menyimpan ...')
                    if(!this.isEdit) {
                        let self = this
                        let formData = new FormData();
                        let imagefile = $("input[name=bank_logo]")[0];
                        formData.append("logo", imagefile.files[0]);
                        formData.append("name", self.bank.name);
                        formData.append("link", self.bank.link);
                        formData.append("code", self.bank.code);
                        formData.append("status", self.bank.status);
                        formData.append("reason_status", self.bank.reason_status);
                        axios.post('{{url("/")}}/api/financial-institution-umi', formData, {
                            headers: {
                                    'Content-Type': 'multipart/form-data'
                            }
                        })
                        .then(function (response) {
                            console.log(response)
                            if(!response.data.data.error) {
                                
                            }
                        })
                        .catch(function (error) {
                            console.log(error);
                        })
                        .finally(function () {
                            $("#form-financial-institution-umi-modal").modal('hide')
                            $("#notification").fadeIn()
                            $(".dropify-clear").trigger("click");    
                            self.dataTable.ajax.reload();

                            $(".dropify-clear").trigger("click");    
                            $(".btn-save").addClass('btn-addon')
                            $(".btn-save").removeAttr('disabled')
                            $(".btn-save").html('<i class="fa fa-save"></i> Simpan')
                            // always executed
                            self.reset()
                        });;

                    } else {

                        let self = this
                        let formData = new FormData();
                        let imagefile = $("input[name=bank_logo]")[0];
                        formData.append("logo", imagefile.files[0]);
                        formData.append("name", self.bank.name);
                        formData.append("link", self.bank.link);
                        formData.append("code", self.bank.code);
                        formData.append("status", self.bank.status);
                        formData.append("reason_status", self.bank.reason_status);
                        formData.append("_method", "PUT");
                        axios.post('{{url("/")}}/api/financial-institution-umi/'+self.idEdit, formData, {
                            headers: {
                                    'Content-Type': 'multipart/form-data'
                            }
                        })
                        .then(function (response) {
                            console.log(response)
                            if(!response.data.data.error) {
                                
                            }
                        })
                        .catch(function (error) {
                            console.log(error);
                        })
                        .finally(function () {
                            $("#form-financial-institution-umi-modal").modal('hide')
                            $("#notification").fadeIn()
                            $(".dropify-clear").trigger("click");    
                            self.dataTable.ajax.reload();

                            $(".dropify-clear").trigger("click");    
                            $(".btn-save").addClass('btn-addon')
                            $(".btn-save").removeAttr('disabled')
                            $(".btn-save").html('<i class="fa fa-save"></i> Simpan')
                            // always executed
                            self.reset()
                        });;
                    }
                },

            }
         });

         $(document).on('click','.edit-item',function(){
            let id = $(this).data('id')
            app.editItem(id)
         })

</script>
@endpush