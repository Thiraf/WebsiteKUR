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
<div class="modal fade" id="form-business-permit-modal"  data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
        <form action="" id="formBusinessType" v-on:submit.prevent="submitForm()">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">@{{ !isEdit ? 'Tambah Izin Usaha' : 'Edit Izin Usaha' }}</h4>
                <button type="button" @click="reset" class="close text-right" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" class="form-control" v-model="businessPermit.name" required>
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