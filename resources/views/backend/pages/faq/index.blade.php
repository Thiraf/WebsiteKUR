@extends('backend.layouts.main')

@section('title')
    Daftar FAQ
@endsection

@section('actions')
    <a href="#" @click="addItem()" class="btn btn-addon btn-info"><i class="fa fa-plus"></i> Tambah FAQ</a>
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
                    Daftar FAQ 
                </div>
                <div class="table-responsive">
                    
                    <table class="table table-bordered"  id="datatable">
                        <thead>
                            <tr>
                                <th width="170">Action</th>
                                <th>Judul</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    @include('backend.pages.faq.modals.form')

@endsection

@push('scripts')
<script>
  var app = new Vue({
            el : "#content",
            data : function(){
                return {
                    faq : {
                        content : null,
                        img : null,
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
                    ajax: "{{ route('api.faq.index') }}",
                    processing: true,
                    serverSide : true,
                    order: [[ 1, "asc" ]],
                    columns: [
                        { data: "action", name: "action", orderable: false },
                        { data: "title", name: "title", orderable: false },
                    
                    // { data: "id_kepala", name: "id_kepala" }
                    ]
                });

                this.dropify = $(".dropify").dropify()

                
            },
            methods : {

                addItem() {
                    $("#form-faq-modal").modal('show')

                },

                reset() {
                    this.faq = {
                        code : null,
                        img : null,
                        name : null,
                        id : null,
                    },
                    this.isEdit = false,
                    this.idEdit = null  
                    $(".dropify-clear").trigger("click");    
                    this.dropify = $(".dropify").dropify()
                    $("#inputJawaban").html("")
                },

                editItem(id) {
                    
                    $("#form-faq-modal").modal('show')
                    
                    let self = this
                    
                    axios.get('{{url("/")}}/api/faq/'+id)
                        .then(function (response) {
                            // handle success
                            if(!response.error) {
                                self.faq = {
                                    id : response.data.data.id,
                                    title : response.data.data.title,
                                }

                                $("#inputJawaban").html(response.data.data.content)

                                self.isEdit = true,
                                self.idEdit = response.data.data.id
                                

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
                        
                        formData.append("title", self.faq.title);
                        formData.append("content", $("#inputJawaban").html());
                        axios.post('{{url("/")}}/api/faq', formData, {
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
                            $("#form-faq-modal").modal('hide')
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
                        formData.append("title", self.faq.title);
                        formData.append("content", $("#inputJawaban").html());
                        formData.append("_method", "PUT");
                        axios.post('{{url("/")}}/api/faq/'+self.idEdit, formData, {
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
                            $("#form-faq-modal").modal('hide')
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