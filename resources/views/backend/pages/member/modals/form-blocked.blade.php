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
<div class="modal fade" id="form-member-block-modal"  data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
        <form action="" id="formBusinessType" v-on:submit.prevent="submitFormBlocked()">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Buka / Tutup Blokir Pengajuan Member</h4>
                <button type="button" @click="reset" class="close text-right" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body">

                <div class="form-group">
                    <label for="">Status Blokir ?</label>
                    <select class="form-control" id="inputSelectCountry" required name="is_blocked" v-model="form.is_blocked"
                        aria-label="Default select example">
                        <option selected disabled>Pilih...</option>
                        <option {{old('is_blocked') == '1' ? 'selected' : ''}} value="1">Blokir</option>
                        <option  {{old('is_blocked') == '0' ? 'selected' : ''}}  value="0">Buka Blokir</option>
                    </select>
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