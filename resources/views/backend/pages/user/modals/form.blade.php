@push('styles')
<link rel="stylesheet" href="{{ asset('theme/libs/jquery/select2/dist/select2.min.css') }}" type="text/css" />

<style>
    .close {
        position: absolute;
        top: 0;
        right: 0;
        padding: 15px;
    }
    .mini-img {
        height : 50px
    }
</style>

@endpush
<!-- The Modal -->
<div class="modal fade" id="form-user-modal"   data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
        <form action="" id="formBank" v-on:submit.prevent="submitForm()" enctype="multipart/form-data">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">@{{ !isEdit ? 'Tambah Pengguna' : 'Edit Pengguna' }}</h4>
                <button type="button" @click="reset" class="close text-right" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="row">
		{{csrf_field()}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Nama</label>
                            <input type="text" class="form-control" v-model="user.name" required>
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" class="form-control" v-model="user.email" required>
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" class="form-control" v-model="user.password" :required="!isEdit">
                            <small v-if="isEdit"> <i style="font-size : 12px">  Biarkan kosong bila tidak ingin merubah password</i></small>
                        </div>
                        <div class="form-group">
                            <label for="">Phone</label>
                            <input type="tel" class="form-control" v-model="user.phone" >
                        </div>
                        <div class="form-group">
                            <label for="">Role</label>
                            <select v-model="user.role_id" class="form-control">
                                <option v-for="item in roles" :value="item.id">@{{item.name}}</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group" v-if="user.role_id == '1' || user.role_id == '2'">
                            <label for="">Bank / Lembaga Keuangan</label>
                            <select name="bank_id"  v-model="user.bank_id"  v-chosen-select-search :required="user.role_id == '1' || user.role_id == '2'" data-placeholder="Pilih Bank Asal"  id="" class="select2-no-search">
                                <option></option>
                            </select>
                        </div>
                        <div class="form-group" v-if="user.role_id == '3' || user.role_id == '4'">
                            <label for="">Bank Penyalur UMI</label>
                            <select name="bank_id"  v-model="user.financial_institution_umi_id"  v-chosen-select-umi-search :required="user.role_id == '3' || user.role_id == '4'" data-placeholder="Pilih Bank Asal"  id="" class="select2-no-search">
                                <option></option>
                            </select>
                        </div>
                        <div class="form-group" v-if="user.role_id == '2' || user.role_id == '4'">
                            <label for="">Kode POS</label>
                            <input-tag v-model="form.postal_code" required></input-tag>
                            <small id="passwordHelpBlock" class="form-text text-muted">
                                Klik enter untuk menambah kode pos.
                            </small>
                            {{-- <select name="regency_id"  v-model="user.regency_id"  v-chosen-select-district-search :required="user.role == '1' || user.role == '2'" data-placeholder="Pilih Kabupaten"  id="" class="select2-no-search">
                                @foreach($regencies as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select> --}}
                        </div>

                        <div class="form-group">
                            <label for="">Foto</label>
                            <input type="file" class="dropify" name="user_photo"  data-max-file-size="1M"  data-allowed-file-extensions="png jpg jpeg" >
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-addon" data-dismiss="modal" @click="reset()"><i class="fa fa-arrow-left"></i> Batal</button>
                <button type="submit" class="btn btn-primary btn-addon btn-save"><i class="fa fa-save"></i> Simpan</button>
            </div>
        </form>

        </div>
    </div>
</div>
