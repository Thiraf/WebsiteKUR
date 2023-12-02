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
    td {
        padding : 8px;
    }
</style>
@endpush
<!-- The Modal -->
<div class="modal fade" id="detail-credit-request-modal"   data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <form action="" id="formFAQ" v-on:submit.prevent="submitForm()" enctype="multipart/form-data">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Detail Pengajuan</h4>
                <button type="button" class="close text-right" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <table>
                            <tr>
                                <td width="120">Nomor Registrasi</td>
                                <td width="15">:</td>
                                <th>@{{data.registration_number}}</th>
                            </tr>
                            <tr>
                                <td width="120">Name</td>
                                <td width="15">:</td>
                                <th>@{{data.name}}</th>
                            </tr>
                            <tr>
                                <td width="120">Gender</td>
                                <td width="15">:</td>
                                <th>@{{data.gender == 1 ? 'Laki - Laki' : 'Perempuan'}}</th>
                            </tr>
                            <tr>
                                <td width="120">Telp</td>
                                <td width="15">:</td>
                                <th>@{{data.phone}}</th>
                            </tr>
                            <tr>
                                <td width="120">Email</td>
                                <td width="15">:</td>
                                <th>@{{data.email == null ? '-' : data.email}}</th>
                            </tr>
                            <tr>
                                <td width="120">Kabupaten</td>
                                <td width="15">:</td>
                                <th>@{{data.regency_name}}</th>
                            </tr>
                            <tr>
                                <td width="120">Kecamatan</td>
                                <td width="15">:</td>
                                <th>@{{data.district_name}}</th>
                            </tr>
                            <tr>
                                <td width="120">Jenis Usaha</td>
                                <td width="15">:</td>
                                <th>@{{data.business_name}}</th>
                            </tr>
                            <tr>
                                <td width="120">Ijin Usaha</td>
                                <td width="15">:</td>
                                <th>@{{data.business_permission}}</th>
                            </tr>
                            <tr>
                                <td width="120">NPWP</td>
                                <td width="15">:</td>
                                <th>@{{data.npwp == null ? '-' : data.npwp}}</th>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <table>

                            <tr>
                                <td width="120">Desa</td>
                                <td width="15">:</td>
                                <th>@{{data.village}}</th>
                            </tr>
                            <tr>
                                <td width="120">Alamat</td>
                                <td width="15">:</td>
                                <th>@{{data.address}}</th>
                            </tr>

                            <tr>
                                <td width="120">Nominal</td>
                                <td width="15">:</td>
                                <th>Rp @{{data.amount}}</th>
                            </tr>

                            <tr>
                                <td width="120">Bank Penyalur</td>
                                <td width="15">:</td>
                                <th>@{{data.bank_name}}</th>
                            </tr>

                            <tr>
                                <td width="120">Termin</td>
                                <td width="15">:</td>
                                <th>@{{data.termin_name}}</th>
                            </tr>

                            <tr>
                                <td width="120">Status</td>
                                <td width="15">:</td>
                                <th>@{{data.status}}</th>
                            </tr>

                            <tr v-if="data.status == 'DISETUJUI'">
                                <td width="120">Status</td>
                                <td width="15">:</td>
                                <th>@{{data.status}}</th>
                            </tr>

                            <tr>
                                <td width="120">Foto</td>
                                <td width="15">:</td>
                                <th></th>
                            </tr>

                            <tr>
                                <td colspan="3">
                                    <img :src="data.photo" alt="" height="150px">
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>


            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-addon" data-dismiss="modal"><i class="fa fa-arrow-left"></i> Batal</button>
                @if(auth()->user()->role != 0)
                <a v-if='data.status == "DIAJUKAN"' :href="'/admin/credit-request/'+data.id+'/redirect'" class="btn btn-info btn-addon"><i class="fa fa-pencil"></i> Alihkan</a>
                <a v-if='data.status == "DIAJUKAN"' :href="'/admin/credit-request/'+data.id+'/accept'" class="btn btn-success btn-addon"><i class="fa fa-check"></i> Terima</a>
                <a v-if='data.status == "DIAJUKAN"' :href="'/admin/credit-request/'+data.id+'/reject'" class="btn btn-danger btn-addon"><i class="fa fa-times"></i> Tolak</a>
                @endif

            </div>
        </form>

        </div>
    </div>
</div>
