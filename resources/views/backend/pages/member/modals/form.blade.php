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
<div class="modal fade" id="form-member-modal"  data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
        <form action="" id="formBusinessType" v-on:submit.prevent="submitForm()">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Detail Member</h4>
                <button type="button" @click="reset" class="close text-right" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" class="form-control" v-model="member.full_name" required>
                </div>

                <div class="form-group">
                    <label for="">NIK</label>
                    <input type="text" class="form-control" v-model="member.nik" required>
                </div>

                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" class="form-control" v-model="member.email" required>
                </div>

                <div class="form-group">
                    <label for="">No Handphone 1</label>
                    <input type="text" class="form-control" v-model="member.phone" required>
                </div>

                <div class="form-group">
                    <label for="">No Handphone 2</label>
                    <input type="text" class="form-control" v-model="member.second_phone" required>
                </div>

                <div class="form-group">
                    <label for="">Alamat</label>
                    <input type="text" class="form-control" v-model="member.address" required>
                </div>

                <div class="form-group">
                    <label for="">Jenis Kelamin</label>
                    <select class="form-control" id="inputSelectCountry" required name="gender" v-model="member.gender"
                        aria-label="Default select example">
                        <option selected disabled>Pilih...</option>
                        <option {{old('gender') == '1' ? 'selected' : ''}} value="1">Laki-Laki</option>
                        <option  {{old('gender') == '0' ? 'selected' : ''}}  value="0">Perempuan</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Tanggal Lahir</label>
                    <input type="date" class="form-control" v-model="member.dob" required>
                </div>
            </div>
            
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-addon" data-dismiss="modal" @click="reset()"><i class="fa fa-arrow-left"></i> Batal</button>
                {{-- <button type="submit" class="btn btn-primary btn-addon"><i class="fa fa-save"></i> Simpan</button> --}}
            </div>
        </form>
            
        </div>
    </div>
</div>