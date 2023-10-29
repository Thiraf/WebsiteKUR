@push('styles')
<style>
    .close {
        position: absolute;
        top: 0;
        right: 0;
        padding: 15px;
    }
</style>
@endpush
<!-- The Modal -->
<div class="modal fade" id="form-kur-type-modal"  data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
        <form action="" id="formBusinessType" v-on:submit.prevent="submitForm()">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">@{{ !isEdit ? 'Tambah Jenis KUR' : 'Edit Jenis KUR' }}</h4>
                <button type="button" @click="reset" class="close text-right" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" class="form-control" v-model="kur_type.name" required>
                </div>
                <div class="form-group">
                    <label for="">Minimal Value</label>
                    <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1">Rp</span>
                        <input type="text" class="form-control" placeholder="Min Value" v-model="kur_type.min_value" aria-describedby="basic-addon1">
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Maksimal Value</label>
                    <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1">Rp</span>
                        <input type="text" class="form-control" placeholder="Max Value" v-model="kur_type.max_value" aria-describedby="basic-addon1">
                    </div>
                </div>
            </div>
            
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-addon" data-dismiss="modal" @click="reset()"><i class="fa fa-arrow-left"></i> Batal</button>
                <button type="submit" class="btn btn-primary btn-addon"><i class="fa fa-save"></i> Simpan</button>
            </div>
        </form>
            
        </div>
    </div>
</div>