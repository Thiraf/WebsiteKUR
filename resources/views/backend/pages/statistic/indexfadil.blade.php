@extends('backend.layout.main')

@section('title')
Statistik Daftar Pengajuan KUR
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
                Rentang Waktu
            </div>
            <div class="wrapper" style="display: inline-block; padding-top: 30px; vertical-align: bottom">
                <div class="flex-container">
                    <button type="button" class="btn btn-filter" onclick="filterBtn(1)" @click="filterStat(0)">Hari ini</button>
                    <button type="button" class="btn btn-filter" onclick="filterBtn(2)" @click="filterStat(6)">1 minggu</button>
                    <button type="button" class="btn btn-filter " onclick="filterBtn(3)" @click="filterStat(29)">1 bulan</button>
                    <button type="button" class="btn btn-filter " onclick="filterBtn(4)" @click="filterStat(179)">6 bulan</button>
                    <button type="button" class="btn btn-filter " onclick="filterBtn(5)" @click="filterStat(359)">1 tahun</button>
                    <button type="button" class="btn btn-filter " onclick="filterBtn(6)" @click="filterStat(-100)">All time</button>
                </div>
            </div>
            <div class="wrapper" style="display: inline-block; margin-left: 10px; vertical-align: top;">
                <form>
                    <label for="fname">Periode:</label><br>
                    <input ref="startDate" v-model="startDate" class="input-filter" type="date" id="fname" name="fname" style="padding: 7px">
                    <input type="text" id="fname" name="fname" placeholder="-" class="custom-input">
                    <input ref="endDate" v-model="endDate" class="input-filter" type="date" id="fname" name="fname" style="padding: 7px">
                </form>
            </div>
            <div class="action-button" style="display: inline-block; margin-left: 5px; vertical-align: bottom; padding: 15px; padding-left: 0 ">
                <a href="#" @click="filterStatDate()" class="btn btn-addon btn-info"><i class="fa fa-filter"></i> Filter</a>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                Jenis KUR yang diajukan
            </div>
            <div class="wrapper" style="padding: 20px; width: 100%">
                <div class="piechart-container">
                    <canvas id="doughnatChart"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                Bank yang diajukan
            </div>
            <div class="wrapper" style="padding: 20px; width: 100%">
                <div class="piechart-container">
                    <canvas id="doughnatChart2"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Data Pengajuan
            </div>
            <div style="padding: 20px">
                <canvas id="termoChart"></canvas>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Jumlah Pengajuan Peminjaman dalam 7 Hari Terakhir
            </div>
            <div style="display: flex; justify-content: space-between; padding: 20px 60px 0px">
                <div style="display: inline-flex">
                    Pembaruan Terakhir : <span class="lastUpdatedText"  style="color: #86909C"> 10 September 2023</span>
                </div>
                <div style="display: inline-flex; flex-direction: column">
                    <span style="display: inline-block">Presentase</span>
                    <span style="display: inline-block">
                    <span id="lastUpdatedCreditRequest" style="font-style: italic; font-size: 20px">422.61</span>
                    <span id="growthPercentage" style="color: green; font-size: 12px">12%</span>
                    </span>

                </div> 
            </div>
            <div style="padding: 20px">
                <canvas id="sevenDays"></canvas>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Data Pengajuan Peminjaman dalam 7 Hari Terakhir
            </div>
            <div class="row" style=" padding: 20px">
                <div class="col-md-3">
                    Pembaruan Terakhir : <span class="lastUpdatedText" style="color: #86909C"> 10 September 2023</span>
                    <table style="margin: 20px">
                        <tr>
                            <td style="width: 50%;">
                                <div  style="background-color: rgba(60, 126, 255, 1); padding: 20px">
                                </div>
                            </td>
                            <td style="padding: 7px">Diterima <br> <span style="font-weight: bold">432.87</span> </td>
                        </tr>
                        <tr>
                            <td style="width: 50%;">
                                <div  style="background-color: rgba(246, 190, 44, 1); padding: 20px">
                                </div>
                            </td>
                            <td style="padding: 7px">Diajukan <br> <span style="font-weight: bold">432.87</span> </td>
                        </tr>
                        <tr>
                            <td style="width: 50%;">
                                <div  style="background-color: rgba(2, 228, 52, 1); padding: 20px">
                                </div>
                            </td>
                            <td style="padding: 7px">Diproses <br> <span style="font-weight: bold">432.87</span> </td>
                        </tr>
                        <tr>
                            <td style="width: 50%;">
                                <div  style="background-color: rgba(118, 68, 223, 1); padding: 20px">
                                </div>
                            </td>
                            <td style="padding: 7px">Dipending <br> <span style="font-weight: bold">432.87</span> </td>
                        </tr>
                        <tr>
                            <td style="width: 50%;">
                                <div  style="background-color: rgba(245, 63, 63, 1); padding: 20px">
                                </div>
                            </td>
                            <td style="padding: 7px">Ditolak <br> <span style="font-weight: bold">432.87</span> </td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-9">
                    <canvas id="allCreditRequestChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')

<script>
    new Vue({
    el: '#content',
    data() {
        return {
        //
        statistikData: null,
        statistikFilter: null,
        error: null,


        
        // bwt filter pake date
        startDate: null,
        endDate: null,

        };
    },
    mounted() {
        this.fetchStatistikData(); // Memanggil fungsi saat komponen Vue dimuat
    },

    methods: {

        // ini fungsi pertama kali di load pagenya akan otomatis dipanggil
        // endpointnya me-return 6 object data statistik
        // this.statistikData
        fetchStatistikData() {
        axios.get('{{url("/")}}/api/statistik')
            .then(response => {
                this.statistikData = response.data; // Mengisi data statistik dengan respons dari API
            })
            .catch(error => {
                this.error = 'Terjadi kesalahan dalam mengambil data statistik.';
                console.error(error);
            });
        },


        // filter stat button
        // endpointnya me-return 3 object data statistik
        // this.statistikFilter
        filterStat(value) {

            console.log('Tombol diklik dengan nilai:', value);

            axios.get('{{url("/")}}/api/statistik/filter/'+ value)
                .then(response => {
                    this.statistikFilter = response.data
                })
                .catch(error => {
                    console.error(error);
                });
            },


        // filter stat date yes
        // endpointnya me-return 3 object data statistik
        // this.statistikFilter
        filterStatDate(){

            let startDate = this.$refs.startDate.value;
            let endDate = this.$refs.endDate.value;

            console.log('startdatenya adalah:', startDate);
            console.log('enddatenya adalah:', endDate);

            let requestData = {
            params: {
                start_date: startDate,
                end_date: endDate
            }
            };

            axios.get('{{url("/")}}/api/statistik/filter-date', requestData)
                .then(response => {
                    this.statistikFilter = response.data
                })
                .catch(error => {
                    console.error(error);
                });

        },

        
        
        

    }
    });

</script>

@endpush
