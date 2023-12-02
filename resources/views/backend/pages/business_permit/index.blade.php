@extends('backend.layout.main')

@section('title')
    Daftar Izin Usaha
@endsection

@section('actions')
    <a href="#" @click="addItem()" class="btn btn-addon btn-info"><i class="fa fa-plus"></i> Tambah Izin Usaha</a>
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
                    Daftar Izin Usaha
                </div>
                <div class="table-responsive">

                    <table class="table table-bordered" id="datatable">
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


    @include('backend.pages.business_permit.modals.form')

@endsection

@push('scripts')
<script>
  var app = new Vue({
            el : "#content",
            data : function(){
                return {
                    businessPermit : {
                        name : null,
                        id : null,
                    },
                    isEdit : false,
                    idEdit : null,
                    datatable : null
                }
            },
            mounted() {
                this.dataTable = $("#datatable").DataTable({
                    ajax: "{{ route('api.business-permit.index') }}",
                    processing: true,
                    serverSide : true,
                    order: [[ 1, "asc" ]],
                    columns: [
                        { data: "action", name: "action", orderable: false },
                        { data: "name", name: "name", orderable: false },

                    // { data: "id_kepala", name: "id_kepala" }
                    ]
                });


            },
            methods : {

                addItem() {
                    $("#form-business-permit-modal").modal('show')

                },

                reset() {
                    this.businessPermit = {
                        name : null,
                        id : null,
                    },
                    this.isEdit = false,
                    this.idEdit = null
                },

                editItem(id) {
                    let self = this
                    axios.get('{{url("/")}}/api/business-permit/'+id)
                        .then(function (response) {
                            // handle success
                            if(!response.error) {
                                self.businessPermit = {
                                    id : response.data.data.id,
                                    name : response.data.data.name,
                                }
                                self.isEdit = true,
                                self.idEdit = response.data.data.id

                                $("#form-business-permit-modal").modal('show')

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
        //             .delete("{{ url('/') }}/api/business-permit/" + id)
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
                        axios.post('{{url("/")}}/api/business-permit', {
                            name: self.businessPermit.name,
                            value: self.businessPermit.value
                        })
                        .then(function (response) {
                            if(!response.data.data.error) {

                            }
                        })
                        .catch(function (error) {
                            console.log(error);
                        })
                        .finally(function () {
                            $("#form-business-permit-modal").modal('hide')
                            $("#notification").fadeIn()
                            self.dataTable.ajax.reload();

                            // always executed
                        });;

                    } else {

                        let self = this
                        axios.put('{{url("/")}}/api/business-permit/'+self.idEdit, {
                            name: self.businessPermit.name,
                            value: self.businessPermit.value
                        })
                        .then(function (response) {
                            if(!response.data.data.error) {

                            }
                        })
                        .catch(function (error) {
                            console.log(error);
                        })
                        .finally(function () {
                            $("#form-business-permit-modal").modal('hide')
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
