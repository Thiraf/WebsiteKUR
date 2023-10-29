@extends('backend.layouts.main')

@section('title')
    Daftar Informasi KUR
@endsection

@section('actions')
    <a href="#" @click="addItem()" class="btn btn-addon btn-info"><i class="fa fa-plus"></i> Tambah Informasi KUR</a>
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
                    Daftar Informasi KUR 
                </div>
                <div class="table-responsive">
                    
                    <table class="table table-bordered"  id="datatable">
                        <thead>
                            <tr>
                                <th width="170">Action</th>
                                <th>Nama</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    @include('backend.pages.requirement.modals.form')

@endsection

@push('scripts')
<script>
  var app = new Vue({
            el : "#content",
            data : function(){
                return {
                    requirement : {
                        content : null,
                        short_description: null,
                        img : null,
                        title : null,
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
                    ajax: "{{ route('api.requirement.index') }}",
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
                    $("#form-requirement-modal").modal('show')

                },

                reset() {
                    this.requirement = {
                        content : null,
                        short_description: null,
                        img : null,
                        title : null,
                        id : null,
                    },
                    this.isEdit = false,
                    this.idEdit = null  
                    $(".dropify-clear").trigger("click");    
                    this.dropify = $(".dropify").dropify()
                    $("#inputJawaban").html("")
                },

                editItem(id) {
                    
                    $("#form-requirement-modal").modal('show')
                    
                    let self = this
                    this.dropify = this.dropify.data('dropify');
                    this.dropify.resetPreview();
                    this.dropify.clearElement();
                    
                    axios.get('{{url("/")}}/api/requirement/'+id)
                        .then(function (response) {
                            // handle success
                            if(!response.error) {
                                self.requirement = {
                                    id : response.data.data.id,
                                    title : response.data.data.title,
                                    content : response.data.data.content,
                                    short_description : response.data.data.short_description,
                                    img : response.data.data.img,
                                }
                                self.isEdit = true,
                                self.idEdit = response.data.data.id
                                $("#inputJawaban").html(response.data.data.content)
                                
                                self.dropify.settings.defaultFile = response.data.data.img;
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
                        let imagefile = $("input[name=photo]")[0];
                        formData.append("photo", imagefile.files[0]);
                        formData.append("title", self.requirement.title);
                        formData.append("short_description", self.requirement.short_description);
                        formData.append("content", $("#inputJawaban").html());
                        axios.post('{{url("/")}}/api/requirement', formData, {
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
                            $("#form-requirement-modal").modal('hide')
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
                        let imagefile = $("input[name=photo]")[0];
                        formData.append("photo", imagefile.files[0]);
                        formData.append("title", self.requirement.title);
                        formData.append("short_description", self.requirement.short_description);
                        formData.append("content", $("#inputJawaban").html());
                        formData.append("_method", "PUT");
                        axios.post('{{url("/")}}/api/requirement/'+self.idEdit, formData, {
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
                            $("#form-requirement-modal").modal('hide')
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