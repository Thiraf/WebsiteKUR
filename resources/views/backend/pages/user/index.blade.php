@extends('backend.layout.main')

@push('styles')
  <link rel="stylesheet" href="{{ asset('theme/libs/jquery/jquery-ui/jquery-ui.min.css') }}" type="text/css" />
  <link rel="stylesheet" href="{{ asset('theme/libs/jquery/chosen/bootstrap-chosen.css') }}" type="text/css" />
 <meta name="csrf-token" content="{{ csrf_token() }}" />
@endpush

@section('title')
    Daftar Pengguna
@endsection

@section('actions')
    <a href="#" @click="addItem()" class="btn btn-addon btn-info"><i class="fa fa-plus"></i> Tambah Pengguna</a>
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
                    Daftar Pengguna
                </div>
                <div class="table-responsive">

                    <table class="table table-bordered"  id="datatable">
                        <thead>
                            <tr>
                                <th width="170">Action</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Telp</th>
                                <th>Role</th>
                                <th>Bank</th>
                                <th>Foto</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    @include('backend.pages.user.modals.form')

@endsection

@push('scripts')
<script src="{{ asset('theme/libs/jquery/chosen/chosen.jquery.min.js') }}"></script>
<script src="{{ asset('theme/libs/jquery/jquery-ui/jquery-ui.min.js') }}"></script>
<script src="https://unpkg.com/vue-input-tag"></script>
<script>
        var app = new Vue({
            el : "#content",
            data : function(){
                return {
                    user : {
                        name : null,
                        email : null,
                        password : null,
                        phone : null,
                        role_id : null,
                        bank_id : null,
                        financial_institution_umi_id: null,
                        photo : null,
                        regency_id : null,
                        district_id : null,
                        id : null,
                    },
                    form: {
                        postal_code: [],
                    },
                    isEdit : false,
                    idEdit : null,
                    datatable : null,
                    dropify : null,
                    roles: {!! $roles !!}
                }
            },
            directives : {
                'chosen-select-search' : {
                    inserted : function(el,binding,vnode) {

                        let user = vnode.context.user.bank_id

                        fetch("{{route('api.bank.search')}}?")
                            .then(function(response){
                                return response.json()
                            })
                            .then(function(data){
                                let result = data.data
                                $(el).empty()
                                $(el).append("<option></option>")
                                $.each(result,function(a,b) {
                                    if(user == b.id) {
                                        $(el).append(`<option selected value="${b.id}">${b.name}</option>`)
                                    } else {
                                        $(el).append(`<option value="${b.id}">${b.name}</option>`)
                                    }
                                })
                                $(el).trigger("chosen:updated")
                            })

                        $(el).chosen({
                            width : '100%',
                        }).on('change',function(){
                            vnode.context.user.bank_id = $(this).val()
                        });

                        // $('.chosen-search input').autocomplete({
                        //     source : function(request,response) {
                        //         fetch("{{route('api.umi.search')}}?" + $.param({search: request.term}))
                        //             .then(function(response){
                        //                 return response.json()
                        //             })
                        //             .then(function(data){
                        //                 let result = data.data
                        //                 $(el).empty()
                        //                 $.each(result,function(a,b) {
                        //                     $(el).append(`<option value="${b.id}">${b.code} | ${b.name}</option>`)

                        //                 })
                        //                 $(el).trigger("chosen:updated")
                        //             })

                        //     }
                        // });
                    }
                },
                'chosen-select-umi-search' : {
                    inserted : function(el,binding,vnode) {

                        let user = vnode.context.user.financial_institution_umi_id

                        fetch("{{route('api.umi.search')}}?")
                            .then(function(response){
                                return response.json()
                            })
                            .then(function(data){
                                let result = data.data
                                $(el).empty()
                                $(el).append("<option></option>")
                                $.each(result,function(a,b) {
                                    if(user == b.id) {
                                        $(el).append(`<option selected value="${b.id}">${b.name}</option>`)
                                    } else {
                                        $(el).append(`<option value="${b.id}">${b.name}</option>`)
                                    }
                                })
                                $(el).trigger("chosen:updated")
                            })

                        $(el).chosen({
                            width : '100%',
                        }).on('change',function(){
                            vnode.context.user.financial_institution_umi_id = $(this).val()
                        });
                    }
                },
                'chosen-select-district-search' : {
                    inserted : function(el,binding,vnode) {
                        // $(el)
                        $(el).empty()
                        $(el).append("<option></option>")
                        $.each(vnode.context.regencies,function(a,b) {
                            $(el).append(`<option selected value="${b.id}">${b.name}</option>`)
                        })
                        $(el).chosen({
                            width : '100%',
                        }).on('change',function(){
                            vnode.context.user.regency_id = $(this).val()
                            console.log('tess')
                            fetch('/api/district/'+$(this).val())
                                .then(function(data){
                                    return data.json();
                                })
                                .then(function(data) {
                                    $("select[name=district_id]").empty()
                                    data.forEach(element => {
                                        if(vnode.context.user.district_id == element.id) {

                                            $("select[name=district_id]").append("<option selected value='"+element.id+"'>"+element.name+"</option>")
                                        } else {
                                            $("select[name=district_id]").append("<option value='"+element.id+"'>"+element.name+"</option>")
                                        }
                                    });
                                    $("select[name=district_id]").trigger("chosen:updated")

                                })
                        })
                        $(el).trigger("chosen:updated");
                        if(vnode.context.user.regency_id !== null) {
                            console.log('te')
                            $("select[name=regency_id]").trigger('change')

                        }

                    }
                },
                'chosen-select-child-search' : {
                    inserted : function(el,binding,vnode) {
                        // console.log(vnode.context)
                        $(el).chosen({
                            width : '100%',
                        }).on('change',function(){
                            vnode.context.user.district_id = $(this).val()
                        });
                    }
                }
            },
            mounted() {
                this.dataTable = $("#datatable").DataTable({
                    ajax: "{{ route('api.user.index') }}",
                    processing: true,
                    serverSide : true,
                    order: [[ 1, "asc" ]],
                    columns: [
                        { data: "action", name: "action", orderable: false },
                        { data: "name", name: "name", orderable: false },
                        { data: "email", name: "email", orderable: false },
                        { data: "phone", name: "phone", orderable: false },
                        { data: "role_name", name: "role_name", orderable: false },
                        { data: "bank_name", name: "bank_name", orderable: false },
                        { data: "photo_rendered", name: "photo_rendered", orderable: false },

                    // { data: "id_kepala", name: "id_kepala" }
                    ]
                });

                var userId = {!! auth()->user()->role_id !!}
                self = this

                if(userId == 1){
                    self.user.role_id = 2
                }

                $(".select2-no-search[name=role_id]").chosen({
                    disable_search_threshold: 10,
                    width : '100%'

                }).on('change',function(){
                    self.user.role_id = $(this).val()
                });
                this.dropify = $(".dropify").dropify()
            },
            watch: {
                'user.regency_id' : function(old,newVal){
                }
            },
            components: {
                'input-tag': vueInputTag.default
            },
            methods : {
                changeRole(){
                    this.user.role_id = null
                },

                addItem() {
                    $("#form-user-modal").modal('show')

                },

                reset() {
                    this.user = {
                        name : null,
                        email : null,
                        password : null,
                        phone : null,
                        role_id : null,
                        bank_id : null,
                        financial_institution_umi_id: null,
                        photo : null,
                        regency_id : null,
                        district_id : null,
                        id : null,
                    },
                    this.form = {
                        postal_code: [],
                    },
                    this.isEdit = false,
                    this.idEdit = null
                    $(".dropify-clear").trigger("click");
                    this.dropify = $(".dropify").dropify()

                },

                editItem(id) {

                    $("#form-user-modal").modal('show')

                    let self = this
                    this.dropify = this.dropify.data('dropify');
                    this.dropify.resetPreview();
                    this.dropify.clearElement();
                    axios.get('{{url("/")}}/api/user/'+id)
                        .then(function (response) {
                            // handle success
                            if(!response.error) {
                                var postal_code_data = response.data.data.userpostalcode ? response.data.data.userpostalcode : null
                                self.user = {
                                    id : response.data.data.id,
                                    name : response.data.data.name,
                                    email : response.data.data.email,
                                    phone : (response.data.data.phone),
                                    role_id : response.data.data.role_id,
                                    bank_id : response.data.data.bank_id,
                                    financial_institution_umi_id : response.data.data.	financial_institution_umi_id,
                                    // bank : response.data.data.bank,
                                    photo : response.data.data.photo,
                                    regency_id : response.data.data.regency_id,
                                    district_id : response.data.data.district_id ,
                                }
                                self.form.postal_code = postal_code_data.map(item => {
                                    return item.postal_code
                                }),
                                // self.form
                                self.isEdit = true,
                                self.idEdit = response.data.data.id

                                self.dropify.settings.defaultFile = response.data.data.photo;
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
                            $(".select2-no-search[name=role_id]").trigger('chosen:updated')
                        });

                },

                submitForm() {

                    $(".btn-save").attr('disabled','disabled')
                    $(".btn-save").removeClass('btn-addon')
                    $(".btn-save").html('<i class="fa fa-spinner fa-spin"></i> Menyimpan ...')
                    if(!this.isEdit) {
                        let self = this
                        let formData = new FormData();
                        let imagefile = $("input[name=user_photo]")[0];
                        formData.append("name", self.user.name);
                        formData.append("email", self.user.email);
                        formData.append("password", self.user.password);
                        formData.append("phone", self.user.phone);
                        formData.append("role_id", self.user.role_id);
                        formData.append("bank_id", self.user.bank_id);
                        formData.append("financial_institution_umi_id", self.user.financial_institution_umi_id);
                        formData.append("photo", imagefile.files[0]);
                        formData.append("regency_id", self.user.regency_id);
                        formData.append("district_id", self.user.district_id);
                        formData.append("postal_code", self.form.postal_code);
                        axios.post('{{url("/")}}/api/user', formData, {
                            headers: {
                                'Content-Type': 'multipart/form-data',
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        })
                        .then(function (response) {
                            return response.data
                        })
                        .then(function(data){
                            console.log(data)
                            $("#form-user-modal").modal('hide')
                            $("#notification").fadeIn()
                            $(".dropify-clear").trigger("click");
                            self.dataTable.ajax.reload();

                            $(".dropify-clear").trigger("click");
                            $(".btn-save").addClass('btn-addon')
                            $(".btn-save").removeAttr('disabled')
                            $(".btn-save").html('<i class="fa fa-save"></i> Simpan')
                            // always executed
                            self.reset()
                        })
                        .catch(function (error) {
                            alert(error.response.data.message);
                            $(".btn-save").removeAttr('disabled')
                            $(".btn-save").html('<i class="fa fa-save"></i> Simpan')
                        })

                    } else {

                        let self = this
                        let formData = new FormData();
                        let imagefile = $("input[name=user_photo]")[0];
                        formData.append("name", self.user.name);
                        formData.append("email", self.user.email);
                        formData.append("password", self.user.password);
                        formData.append("phone", self.user.phone);
                        formData.append("role_id", self.user.role_id);
                        formData.append("bank_id", self.user.bank_id);
                        formData.append("financial_institution_umi_id", self.user.financial_institution_umi_id);
                        formData.append("photo", imagefile.files[0]);
                        formData.append("regency_id", self.user.regency_id);
                        formData.append("district_id", self.user.district_id);
                        formData.append("postal_code", self.form.postal_code);
                        formData.append("_method", "PUT");
                        axios.post('{{url("/")}}/api/user/'+self.idEdit, formData, {
                            headers: {
                                'Content-Type': 'multipart/form-data',
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
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
                            $("#form-user-modal").modal('hide')
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
