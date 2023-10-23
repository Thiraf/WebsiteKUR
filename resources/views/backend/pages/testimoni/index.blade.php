@extends('backend.layout.main')

@section('title')
Daftar Testimoni
@endsection

@section('actions')
<a href="#" @click="addItem()" class="btn btn-addon btn-info"><i class="fa fa-plus"></i> Tambah Testimoni</a>
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
                Daftar Testimoni
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


@include('backend.pages.testimoni.modals.form')

@endsection

@push('scripts')
<script>
var app = new Vue({
    el: "#content",
    data: function() {
        return {
            testimoni: {
                content: null,
                img: null,
                title: null,
                id: null,
            },
            isEdit: false,
            idEdit: null,
            datatable: null,
            dropify: null
        }
    },
    mounted() {
        this.dataTable = $("#datatable").DataTable({
            // ajax: "{{-- route('api.testimoni.index') --}}",
            ajax: "{{route('api.testimoni.index') }}",

            processing: true,
            serverSide: true,
            order: [
                [1, "asc"]
            ],
            columns: [{
                    data: "action",
                    name: "action",
                    orderable: false
                },
                {
                    data: "title",
                    name: "title",
                    orderable: false
                },

                // { data: "id_kepala", name: "id_kepala" }
            ]
        });

        this.dropify = $(".dropify").dropify()


    },
    methods: {

        addItem() {
            $("#form-testimoni-modal").modal('show')

        },

        reset() {
            this.testimoni = {
                    content: null,
                    img: null,
                    title: null,
                    id: null,
                },
                this.isEdit = false,
                this.idEdit = null
            $(".dropify-clear").trigger("click");
            this.dropify = $(".dropify").dropify()
            $("#inputJawaban").html("")
        },

        editItem(id) {

            $("#form-testimoni-modal").modal('show')

            let self = this
            this.dropify = this.dropify.data('dropify');
            this.dropify.resetPreview();
            this.dropify.clearElement();

            axios.get('{{url("/")}}/api/testimoni/' + id)
                .then(function(response) {
                    // handle success
                    if (!response.error) {
                        self.testimoni = {
                            id: response.data.data.id,
                            title: response.data.data.title,
                            content: response.data.data.content,
                            img: response.data.data.img,
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
                .catch(function(error) {
                    // handle error

                })
                .finally(function() {
                    // always executed
                });

        },

        submitForm() {

            $(".btn-save").attr('disabled', 'disabled')
            $(".btn-save").removeClass('btn-addon')
            $(".btn-save").html('<i class="fa fa-spinner fa-spin"></i> Menyimpan ...')
            if (!this.isEdit) {
                let self = this
                let formData = new FormData();
                let imagefile = $("input[name=photo]")[0];
                formData.append("photo", imagefile.files[0]);
                formData.append("title", self.testimoni.title);
                formData.append("content", $("#inputJawaban").html());
                axios.post('{{url("/")}}/api/testimoni', formData, {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    })
                    .then(function(response) {
                        console.log(response)
                        if (!response.data.data.error) {

                        }
                    })
                    .catch(function(error) {
                        console.log(error);
                    })
                    .finally(function() {
                        $("#form-testimoni-modal").modal('hide')
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
                formData.append("title", self.testimoni.title);
                formData.append("content", $("#inputJawaban").html());
                formData.append("_method", "PUT");
                axios.post('{{url("/")}}/api/testimoni/' + self.idEdit, formData, {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    })
                    .then(function(response) {
                        console.log(response)
                        if (!response.data.data.error) {

                        }
                    })
                    .catch(function(error) {
                        console.log(error);
                    })
                    .finally(function() {
                        $("#form-testimoni-modal").modal('hide')
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

$(document).on('click', '.edit-item', function() {
    let id = $(this).data('id')
    app.editItem(id)
})
</script>
@endpush
