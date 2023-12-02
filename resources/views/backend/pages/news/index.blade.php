@extends('backend.layout.main')

@section('title')
    Daftar Berita
@endsection

@section('actions')
    <a href="#" @click="addItem()" class="btn btn-addon btn-info"><i class="fa fa-plus"></i> Tambah Berita</a>
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
                    Daftar Berita
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


    @include('backend.pages.news.modals.form')

@endsection

@push('scripts')
<script>
  var app = new Vue({
            el : "#content",
            data : function(){
                return {
                    news : {
                        content : null,
                        img : null,
                        title : null,
                        id : null,
                        category_news_id: null,
			url_yt : null,
                    },
                    newscategory: null,
                    isEdit : false,
                    idEdit : null,
                    datatable : null,
                    dropify : null
                }
            },
            mounted() {
                this.dataTable = $("#datatable").DataTable({
                    ajax: "{{ route('api.news.index') }}",
                    processing: true,
                    serverSide : true,
                    order: [[ 1, "asc" ]],
                    columns: [
                        { data: "action", name: "action", orderable: false },
                        { data: "title", name: "title", orderable: false },
                    ]
                });

                this.dropify = $(".dropify").dropify()
                this.loadDataCategory()
            },
            methods : {
                loadDataCategory(){
                    let self = this

                    axios.get('/api/news-category')
                        .then(function (response) {
                            // handle success
                            if(!response.error) {
                                self.newscategory = response.data.data
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
                addItem() {
                    $("#form-news-modal").modal('show')

                },

                reset() {
                    this.news = {
                        content : null,
                        img : null,
                        title : null,
                        id : null,
                        category_news_id: null,
			url_yt : null,
                    },
                    this.isEdit = false,
                    this.idEdit = null
                    $(".dropify-clear").trigger("click");
                    this.dropify = $(".dropify").dropify()
                    $("#inputJawaban").html("")
                },

                editItem(id) {

                    $("#form-news-modal").modal('show')

                    let self = this
                    this.dropify = this.dropify.data('dropify');
                    this.dropify.resetPreview();
                    this.dropify.clearElement();

                    axios.get('{{url("/")}}/api/news/'+id)
                        .then(function (response) {
                            // handle success
                            if(!response.error) {
                                console.log(self.news.category_news_id);
                                self.news = {
                                    id : response.data.data.id,
                                    title : response.data.data.title,
                                    content : response.data.data.content,
                                    img : response.data.data.img,
                                    category_news_id : response.data.data.category_news_id,
				    url_yt : response.data.data.url_yt,
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

        //         deleteItem(id) {
        //     if (confirm("Apakah Anda yakin ingin menghapus item ini?")) {
        //         let self = this;
        //         axios
        //             .delete("{{ url('/') }}/api/news/" + id)
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

                    $(".btn-save").attr('disabled','disabled')
                    $(".btn-save").removeClass('btn-addon')
                    $(".btn-save").html('<i class="fa fa-spinner fa-spin"></i> Menyimpan ...')
                    if(!this.isEdit) {
                        let self = this
                        console.log(self.news.category_news_id);
                        let formData = new FormData();
                        let imagefile = $("input[name=photo]")[0];
                        formData.append("title", self.news.title);
                        formData.append("content", $("#inputJawaban").html());
                        formData.append("photo", imagefile.files[0]);
                        formData.append("category_news_id", self.news.category_news_id);
			formData.append("url_yt", self.news.url_yt);
                        axios.post('{{url("/")}}/api/news', formData, {
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
                            $("#form-news-modal").modal('hide')
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
                        formData.append("title", self.news.title);
                        formData.append("content", $("#inputJawaban").html());
                        formData.append("photo", imagefile.files[0]);
                        formData.append("category_news_id", self.news.category_news_id);
			formData.append("url_yt", self.news.url_yt);
                        formData.append("_method", "PUT");
                        axios.post('{{url("/")}}/api/news/'+self.idEdit, formData, {
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
                            $("#form-news-modal").modal('hide')
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

//          $(document).on('click', '.delete-item', function() {
//     let id = $(this).data('id');
//     app.deleteItem(id);
// });







</script>
@endpush


