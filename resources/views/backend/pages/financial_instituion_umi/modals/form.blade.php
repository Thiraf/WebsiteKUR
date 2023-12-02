@push('styles')
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
<div class="modal fade" id="form-financial-institution-umi-modal" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
        <form action="" id="formBank" v-on:submit.prevent="submitForm()" enctype="multipart/form-data">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">@{{ !isEdit ? 'Tambah Bank' : 'Edit Bank' }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="reset">
                    <span aria-hidden="true">&times;</span>
                </button>
                {{-- <button type="button" @click="reset" class="close text-right" data-dismiss="modal">&times;</button> --}}
            </div>
            
            <!-- Modal body -->
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="">Nama</label>
                            <input type="text" class="form-control" v-model="bank.name" required>
                        </div>   
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="">Kode</label>
                            <input type="text" class="form-control" v-model="bank.code">
                        </div>  
                    </div>
                    <div class="col-12 col-md-12">
                        <div class="form-group">
                            <label for="">Link</label>
                            <input type="text" class="form-control" v-model="bank.link">
                        </div>  
                    </div>
                    <div class="col-12 col-md-12">
                        <div class="form-group">
                            <label for="">Status</label>
                            <select name="" id="" v-model="bank.status" class="form-control">
                                <option value="1" class="form-control">Aktif</option>
                                <option value="0" class="form-control">Non Aktif</option>
                            </select>
                        </div>  
                    </div>
                    <div class="col-12 col-md-12" v-if="bank.status == 0">
                        <div class="form-group">
                            <label for="">Alasan Non Aktif</label>
                            <input type="text" class="form-control" v-model="bank.reason_status">
                        </div>  
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Logo Bank</label>
                            <input type="file" class="dropify" :required="!isEdit" name="bank_logo" data-max-file-size="1M" data-allowed-file-extensions="png jpg ico bmp" >
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