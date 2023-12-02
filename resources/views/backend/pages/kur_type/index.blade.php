@extends('backend.layout.main')

@section('title')
    Daftar Jenis KUR
@endsection

@section('actions')
    <a href="#" @click="addItem()" class="btn btn-addon btn-info"><i class="fa fa-plus"></i> Tambah Jenis KUR</a>
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
                    Daftar Jenis KUR
                </div>
                <div class="table-responsive">

                    <table class="table table-bordered"  id="datatable">
                        <thead>
                            <tr>
                                <th width="170">Action</th>
                                <th>Nama</th>
                                <th>Minimal Value</th>
                                <th>Maksimal Value</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    @include('backend.pages.kur_type.modals.form')

@endsection

@push('scripts')
<script>
  var app = new Vue({
            el : "#content",
            data : function(){
                return {
                    kur_type : {
                        name : null,
                        min_value : null,
                        max_value : null,
                        id : null,
                    },
                    isEdit : false,
                    idEdit : null,
                    datatable : null
                }
            },
            mounted() {
                this.dataTable = $("#datatable").DataTable({
                    ajax: "{{ route('api.kur-type.index') }}",
                    processing: true,
                    serverSide : true,
                    order: [[ 1, "asc" ]],
                    columns: [
                        { data: "action", name: "action", orderable: false },
                        { data: "name", name: "name", orderable: true },
                        { data: "min_value", name: "min_value", orderable: false },
                        { data: "max_value", name: "action", orderable: false },
                    // { data: "id_kepala", name: "id_kepala" }
                    ]
                });


            },
            methods : {

                addItem() {
                    $("#form-kur-type-modal").modal('show')

                },

                reset() {
                    this.kur_type = {
                        name : null,
                        min_value : null,
                        max_value : null,
                        id : null,
                    },
                    this.isEdit = false,
                    this.idEdit = null
                },

                editItem(id) {
                    let self = this
                    axios.get('{{url("/")}}/api/kur-type/'+id)
                        .then(function (response) {
                            // handle success
                            if(!response.error) {
                                self.kur_type = {
                                    id : response.data.data.id,
                                    name : response.data.data.name,
                                    min_value : response.data.data.min_value,
                                    max_value : response.data.data.max_value,
                                }
                                self.isEdit = true,
                                self.idEdit = response.data.data.id

                                $("#form-kur-type-modal").modal('show')

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

        //         deleteItem(id) {
        //     if (confirm("Apakah Anda yakin ingin menghapus item ini?")) {
        //         let self = this;
        //         axios
        //             .delete("{{ url('/') }}/api/kur-type/" + id)
        //             .then(function (response) {
        //                 if (!response.data.error) {
        //                 }
        //             })
        //             .catch(function (error) {
        //                 console.log(error);
        //             })
        //             .finally(function () {
        //                 self.dataTable.ajax.reload();
        //             });
        //     }
        // },

                submitForm() {

                    if(!this.isEdit) {
                        let self = this
                        axios.post('{{url("/")}}/api/kur-type', {
                            name: self.kur_type.name,
                            min_value: self.kur_type.min_value,
                            max_value: self.kur_type.max_value,
                        })
                        .then(function (response) {
                            if(!response.data.data.error) {

                            }
                        })
                        .catch(function (error) {
                            console.log(error);
                        })
                        .finally(function () {
                            $("#form-kur-type-modal").modal('hide')
                            $("#notification").fadeIn()
                            self.dataTable.ajax.reload();

                            // always executed
                        });;

                    } else {

                        let self = this
                        axios.put('{{url("/")}}/api/kur-type/'+self.idEdit, {
                            name: self.kur_type.name,
                            min_value: self.kur_type.min_value,
                            max_value: self.kur_type.max_value,
                        })
                        .then(function (response) {
                            if(!response.data.data.error) {

                            }
                        })
                        .catch(function (error) {
                            console.log(error);
                        })
                        .finally(function () {
                            $("#form-kur-type-modal").modal('hide')
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
            app.editItem(id)
         })

//          $(document).on('click', '.delete-item', function() {
//     let id = $(this).data('id');
//     app.deleteItem(id);
// });




</script>
@endpush
