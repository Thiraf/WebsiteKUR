@extends('backend.layout.main')

@section('title')
    Daftar Termin
@endsection

@section('actions')
    <a href="#" @click="addTermin()" class="btn btn-addon btn-info"><i class="fa fa-plus"></i> Tambah Termin</a>
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
                    Daftar Termin
                </div>
                <div class="table-responsive">

                    <table class="table table-bordered"  id="datatable">
                        <thead>
                            <tr>
                                <th width="170">Action</th>
                                <th>Nama</th>
                                <th>Nilai</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    @include('backend.pages.termin.modals.form')

@endsection

@push('scripts')
<script>
  var app = new Vue({
            el : "#content",
            data : function(){
                return {
                    termin : {
                        name : null,
                        value : null,
                        id : null,
                    },
                    isEdit : false,
                    idEdit : null,
                    datatable : null
                }
            },
            mounted() {
                this.dataTable = $("#datatable").DataTable({
                    ajax: "{{-- route('api.termin.index') --}}",
                    processing: true,
                    serverSide : true,
                    order: [[ 1, "asc" ]],
                    columns: [
                        { data: "action", name: "action", orderable: false },
                        { data: "name", name: "name", orderable: false },
                        { data: "value", name: "value", orderable: false },

                    // { data: "id_kepala", name: "id_kepala" }
                    ]
                });


            },
            methods : {

                addTermin() {
                    $("#form-termin-modal").modal('show')

                },

                reset() {
                    this.termin = {
                        name : null,
                        value : null,
                        id : null,
                    },
                    this.isEdit = false,
                    this.idEdit = null
                },

                editTermin(id) {
                    let self = this
                    axios.get('{{url("/")}}/api/termin/'+id)
                        .then(function (response) {
                            // handle success
                            if(!response.error) {
                                self.termin = {
                                    id : response.data.data.id,
                                    name : response.data.data.name,
                                    value : response.data.data.value,
                                }
                                self.isEdit = true,
                                self.idEdit = response.data.data.id

                                $("#form-termin-modal").modal('show')

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
                        axios.post('{{url("/")}}/api/termin', {
                            name: self.termin.name,
                            value: self.termin.value
                        })
                        .then(function (response) {
                            if(!response.data.data.error) {

                            }
                        })
                        .catch(function (error) {
                            console.log(error);
                        })
                        .finally(function () {
                            $("#form-termin-modal").modal('hide')
                            $("#notification").fadeIn()
                            self.dataTable.ajax.reload();

                            // always executed
                        });;

                    } else {

                        let self = this
                        axios.put('{{url("/")}}/api/termin/'+self.idEdit, {
                            name: self.termin.name,
                            value: self.termin.value
                        })
                        .then(function (response) {
                            if(!response.data.data.error) {

                            }
                        })
                        .catch(function (error) {
                            console.log(error);
                        })
                        .finally(function () {
                            $("#form-termin-modal").modal('hide')
                            $("#notification").fadeIn()
                            self.dataTable.ajax.reload();

                            // always executed
                        });;

                    }
                    this.reset()
                },

            }
         });

         $(document).on('click','.edit-item',function(){
            let id = $(this).data('id')
            app.editTermin(id)
         })

</script>
@endpush
