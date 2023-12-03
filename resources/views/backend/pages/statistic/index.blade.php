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
                    <button type="button" class="btn btn-filter"  @click="filterStat(0)">Hari ini</button>
                    <button type="button" class="btn btn-filter"  @click="filterStat(6)">1 minggu</button>
                    <button type="button" class="btn btn-filter "  @click="filterStat(29)">1 bulan</button>
                    <button type="button" class="btn btn-filter "  @click="filterStat(179)">6 bulan</button>
                    <button type="button" class="btn btn-filter "  @click="filterStat(359)">1 tahun</button>
                    <button type="button" class="btn btn-filter "  @click="filterStat(-100)">All time</button>
                </div>
            </div>
            <div class="wrapper" style="display: inline-block; margin-left: 10px; vertical-align: top;">
                <form>
                    <label for="startDate">Periode  :</label><br>
                    <input class="input-filter" type="date" id="startDate" name="startDate" v-model="startDateValue" style="padding: 7px">
                    <input type="text" id="fname" name="fname" placeholder="-" class="custom-input">
                    <input class="input-filter" type="date" id="endDate" name="endDate" v-model="endDateValue" style="padding: 7px">
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
                    Pembaruan Terakhir : <span class="lastUpdatedText"  style="color: #86909C">@{{lastUpdatedText}}</</span>
                </div>
                <div style="display: inline-flex; flex-direction: column">
                    <span style="display: inline-block">Presentase</span>
                    <span style="display: inline-block">
                    <span style="font-style: italic; font-size: 20px">@{{lastUpdatedCreditRequest}}</span>
                    <span style="color: green; font-size: 12px">@{{growthPercentage}}</span>
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
                    Pembaruan Terakhir : <span style="color: #86909C" >@{{lastUpdatedText}}</span>
                    <table style="margin: 20px">
                        <tr>
                            <td style="width: 50%;">
                                <div  style="background-color: rgba(60, 126, 255, 1); padding: 20px">
                                </div>
                            </td>
                            <td style="padding: 7px">Diterima <br> <span style="font-weight: bold">@{{sumAccepted}}</span> </td>
                        </tr>
                        <tr>
                            <td style="width: 50%;">
                                <div  style="background-color: rgba(246, 190, 44, 1); padding: 20px">
                                </div>
                            </td>
                            <td style="padding: 7px">Diajukan <br> <span style="font-weight: bold">@{{sumRequest}}</span> </td>
                        </tr>
                        <tr>
                            <td style="width: 50%;">
                                <div  style="background-color: rgba(2, 228, 52, 1); padding: 20px">
                                </div>
                            </td>
                            <td style="padding: 7px">Diproses <br> <span style="font-weight: bold">@{{sumOnProgress}}</span> </td>
                        </tr>
                        <tr>
                            <td style="width: 50%;">
                                <div  style="background-color: rgba(118, 68, 223, 1); padding: 20px">
                                </div>
                            </td>
                            <td style="padding: 7px">Dipending <br> <span style="font-weight: bold">@{{sumOnPending}}</span> </td>
                        </tr>
                        <tr>
                            <td style="width: 50%;">
                                <div  style="background-color: rgba(245, 63, 63, 1); padding: 20px">
                                </div>
                            </td>
                            <td style="padding: 7px">Ditolak <br> <span style="font-weight: bold">@{{sumDenied}}</span> </td>
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

    dataPengajuan: [], // Ini akan menyimpan respons API
    dataPengajuanValues: [], // Ini akan menyimpan nilai-nilai yang diekstrak

    dataPengajuanSeminggu: [],
    

    dates: [],
    months: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'], //untuk format tanggal
    formattedDates: [],

    creditRequests: [],
    creditApproved: [],
    creditOnProgress: [],
    creditDenied: [],
    creditOnPending : [],
    
    dataTipeKUR:[],
    dataTipeKURValue:[],
    dataKURLabels:[],

    dataTiapBank: [],
    dataTiapBankValues: [],
    banksName: [],

    statistikData: null,
    statistikFilter: [],
    error: null,
        
    // bwt filter pake date
    startDate: null,
    endDate: null,


    //inisiasi chart
    kurChart: null,
    bankChart: null,
    dataPengajuanChart:null,

    //temp Data
    dataKURTemp: [],
    dataBankTemp: [],
    dataPengajuanTemp:[],


    banksLabels: [
    "Bank BCA",
    "Bank Jateng",
    "Bank KB Bukopin",
    "Bank Mandiri",
    "Bank Sinarmas",
    "Bank Syariah Indonesia",
    "BNI",
    "BPD DIY",
    "BRI",
    "BTN",
    "PT BPD Papua"
    ],

    kurTypes: [
    "Kur Mikro",
    "Kur Super Mikro",
    "Kur Kecil"
    ],

    dataKUR : [],

    lastUpdatedText : '',
    lastUpdatedCreditRequest : '',
    growthPercentage : '',
    sumAccepted: '',
    sumRequest:'',
    sumOnPending:'',
    sumOnProgress:'',
    sumDenied:'',

    startDateValue: '', // Data property to hold the start date value
    endDateValue: '', // Data property to hold the end date value
    
    }
    
  },
  mounted() {
    // Melakukan panggilan API untuk mengambil array data_pengajuan
    axios.get('{{url("/")}}/api/statistik/')
      .then(response => {
        // Mengasumsikan respons.data berisi seluruh respons API
        this.dataPengajuan = response.data.data_pengajuan[0];
        this.dataPengajuanSeminggu = response.data.data_pengajuan_dalam_7_hari_terakhir;
        this.dataTipeKUR = response.data.kurTypes;
        this.dataBank = response.data.banks;
        this.growthPercentage = response.data.growth_pengajuan_kredit[0] + '%'


        console.log('Data Pengajuan:', this.dataPengajuan);
        

        // Ekstrak nilai dan simpan dalam Array
        this.dataPengajuanValues = Object.values(this.dataPengajuan).map(value => parseInt(value));
        console.log('Values Array:', this.dataPengajuanValues);

        this.dataTipeKUR.forEach(item =>{
            this.dataTipeKURValue.push(item.credit_request_count)
            this.dataKURLabels.push(item.name)
        })

        console.log('Data tipe KUR:', this.dataTipeKURValue);

        this.dataBank.forEach(item => {
            this.dataTiapBankValues.push(item.credit_request_count)
            this.banksName.push(item.name)
        })

        console.log("bankName:" , this.dataKURLabels)
                       

        this.dataPengajuanSeminggu.forEach(item => {
            this.dates.push(item.date);
            this.creditRequests.push(item.diajukan);
            this.creditApproved.push(item.disetujui);
            this.creditOnProgress.push(item.diproses);
            this.creditDenied.push(item.ditolak);
            this.creditOnPending.push(item.dipending);
        });

        this.dates.reverse()
        this.creditRequests.reverse()
        this.creditApproved.reverse()
        this.creditOnProgress.reverse()
        this.creditDenied.reverse()
        this.creditOnPending.reverse()


        console.log('Values Dates:', this.dates);
        console.log('Values CreditRequest:', this.creditRequests);

        // Fungsi yang perlu dijalankan 
        this.formatDates();
        this.createChart();
        this.updateInfographic();
        
      })
      .catch(error => {
        console.error('Error fetching data:', error);
      });
  },
  methods: {

    updateInfographic(){

        this.lastUpdatedText = this.formatDetailDate(this.dates[6]);
        this.lastUpdatedCreditRequest = this.creditRequests[6];
        
        this.sumAccepted = this.sumArray(this.creditApproved);
        this.sumRequest= this.sumArray(this.creditRequests);
        this.sumOnPending = this.sumArray(this.creditOnPending);
        this.sumOnProgress = this.sumArray(this.creditOnProgress);
        this.sumDenied = this.sumArray(this.creditDenied)
    },

    sumArray(array){
        const sum = array.reduce((total, current) => total + current, 0);
        return sum;
    },

    createChart() {
        const termo_chart = document.getElementById('termoChart')
        const sevenDaysChart = document.getElementById('sevenDays').getContext('2d');
        const allCreditRequestChart = document.getElementById('allCreditRequestChart');
        const doughnat = document.getElementById('doughnatChart');
        const doughnat2 = document.getElementById('doughnatChart2');

        const dataBank = {
            labels: [
            "Bank BCA",
            "Bank Jateng",
            "Bank KB Bukopin",
            "Bank Mandiri",
            "Bank Sinarmas",
            "Bank Syariah Indonesia",
            "BNI",
            "BPD DIY",
            "BRI",
            "BTN",
            "PT BPD Papua"
            ],
            datasets: [{
                label: 'My First Dataset',
                data: this.dataTiapBankValues,
                backgroundColor: [
                'rgba(22, 93, 255, 1)',
                'rgba(201, 20, 20, 1)',
                'rgba(247, 186, 30, 1)',
                'rgba(91, 216, 71, 1)',
                'rgba(20, 201, 201, 1)',
                'rgba(247, 186, 30, 1)',
                'rgba(143, 177, 255, 1)',
                'rgba(20, 201, 201, 1)',
                'rgba(178, 27, 145, 1)',
                'rgba(255, 106, 22, 1)',
                'rgba(240, 80, 80, 1)',
                ],
                hoverOffset: 4
                }]
        };

        this.bankChart = new Chart(doughnat2, {
            type: 'pie',
            data: dataBank,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position : 'right',
                        align: 'center',
                    }
                },

            },
        });

        this.kurChart = new Chart(doughnat, {
            type: 'doughnut',
            data: {
            labels: [
                "Kur Mikro",
                "Kur Super Mikro",
                "Kur Kecil"
            ],
            datasets: [{
                label: 'Banyak Pengajuan',
                data: this.dataTipeKURValue,
                backgroundColor: [
                'rgba(20, 201, 201, 1)',
                'rgba(247, 186, 30, 1)',
                'rgba(22, 93, 255, 1)',
                ],
                hoverOffset: 4
                }]
        },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position : 'right',
                        align: 'center',
                    }
                },
                aspectRatio : 7,
            },
        });

        const termo_data = {
            labels: ['Data Pengajuan'],
            datasets: [{
                label: 'Diterima ',
                data: [this.dataPengajuanValues[1]],
                backgroundColor: [
                'rgba(22, 93, 255, 1)',
                ],
                borderColor: [
                'rgba(22, 93, 255, 1)'
                ]
            },{
                label: 'Diproses',
                data: [this.dataPengajuanValues[2]],
                backgroundColor: [
                'rgba(2, 228, 52, 1)',
                ],
                borderColor: [
                'rgba(2, 228, 52, 1)',
                ]
            },{
                label: 'Dipending',
                data: [this.dataPengajuanValues[4]],
                backgroundColor: [
                'rgba(118, 68, 223, 1)',

                ],
                borderColor: [
                'rgba(118, 68, 223, 1)',
                ]
            },{
                label: 'Diajukan',
                data: [this.dataPengajuanValues[0]],
                backgroundColor: [
                'rgba(247, 186, 30, 1)',

                ],
                borderColor: [
                'rgba(247, 186, 30, 1)',
                ]
            },{
                label: 'Ditolak',
                data: [this.dataPengajuanValues[3]],
                backgroundColor: [
                'rgba(245, 63, 63, 1)',

                ],
                borderColor: [
                'rgba(245, 63, 63, 1)',
                ]
            }]
        };

        this.dataPengajuanChart = new Chart(termo_chart, {
            type: 'bar',
            data: termo_data,
            options: {
                indexAxis: 'y',
                aspectRatio : 7,
                borderSkipped: false,
                borderWidth: 1,
                barPercentage: 0.1,
                categoryPercentage: 1,
                scales: {
                    x: {
                        stacked : true,
                        grid:{
                            display : false,
                            drawBorder : false,
                            drawTicks : false
                        },
                        ticks: {
                            display: false
                        }
                    },

                    y: {
                        beginAtZero: true,
                        stacked : true,
                        grid:{
                            display : false,
                            drawBorder : false,
                            drawTicks : false
                        },
                        ticks: {
                            display: false
                        }
                    }
                }
            }
        });

        //Styling for Seven Day Line Chart
        const gradientBg = sevenDaysChart.createLinearGradient(0,0,0,300);
        gradientBg.addColorStop(0,'rgba(22, 93, 255,0.2)')
        gradientBg.addColorStop(1,'rgba(22, 93, 255,0.005)')



        const lineChart = new Chart(sevenDaysChart, {
            type: 'line',
            data: {
                labels: this.formattedDates,
                datasets: [{
                label: 'Credit Request :',
                data: this.creditRequests,
                fill: true,
                borderColor: 'rgba(22, 93, 255,0.0)',
                backgroundColor: gradientBg,
                tension: 0.1
                }]
            },
            options: {
                scales: {
                y: {
                    beginAtZero: true
                }
                },
                aspectRatio : 3,
            }
        });

        const barChart = new Chart(allCreditRequestChart, {
            type: 'bar',
            data: {
            labels: this.formattedDates,
            datasets: [{
                label: 'Diterima',
                data: this.creditApproved,
                backgroundColor: [
                'rgba(60, 126, 255, 1)'
                ],
                borderColor: [
                'rgba(60, 126, 255, 1)'
                ],
                borderWidth: 1
                },{
                label: 'Diajukan',
                data: this.creditRequests,
                backgroundColor: [
                'rgba(246, 190, 44, 1)'
                ],
                borderColor: [
                'rgba(246, 190, 44, 1)'
                ],
                borderWidth: 1
                },{
                label: 'Diproses',
                data: this.creditOnProgress,
                backgroundColor: [
                'rgba(2, 228, 52, 1)'
                ],
                borderColor: [
                'rgba(2, 228, 52, 1)'
                ],
                borderWidth: 1
                },{
                label: 'Dipending',
                data: this.creditOnPending,
                backgroundColor: [
                'rgba(118, 68, 223, 1)'
                ],
                borderColor: [
                'rgba(118, 68, 223, 1)'
                ],
                borderWidth: 1
                },{
                label: 'Ditolak',
                data: this.creditDenied,
                backgroundColor: [
                'rgba(245, 63, 63, 1)'
                ],
                borderColor: [
                'rgba(245, 63, 63, 1)'
                ],
                borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                    beginAtZero: true,
                    title: {
                        display : true,
                        text : 'Jumlah Pengajuan Peminjaman'
                    }
                    },
                    x:{
                        title:{
                            display : true,
                            text : 'Tanggal'
                        }
                        }
                    },

        }
        });

    }, // End Of CreateChart Function

    //To format a date string without year
    formatDate(dateString) {
      const date = new Date(dateString);
      const day = date.getDate();
      const monthIndex = date.getMonth();
      const monthName = this.months[monthIndex];

      return `${day} ${monthName}`;
    },

    formatDetailDate(dateString) {
      const date = new Date(dateString);
      const day = date.getDate();
      const year = date.getFullYear();
      const monthIndex = date.getMonth();
      const monthName = this.months[monthIndex];

      return `${day} ${monthName} ${year}`;
    },

    formatDates() {
      // Format dates and store them in formattedDates array
      this.formattedDates = this.dates.map(date => this.formatDate(date));
      console.log(this.formattedDates);
    },  

    addData(chart,label, newData) {
            // chart.data.labels.push(label);
            chart.data.datasets.forEach((dataset) => {
                dataset.data.push(newData);
            });
            chart.update();
    },

    removeData(chart) {
        // chart.data.labels.pop();
        chart.data.datasets.forEach((dataset) => {
            dataset.data.pop();
        });
        chart.update();
    },

    formaterDataPengajuan(listData){
        const temp = {
            labels: ['Data Pengajuan'],
            datasets: [{
                label: 'Diterima ',
                data: [listData[1]],
                backgroundColor: [
                'rgba(22, 93, 255, 1)',
                ],
                borderColor: [
                'rgba(22, 93, 255, 1)'
                ]
            },{
                label: 'Diproses',
                data: [listData[2]],
                backgroundColor: [
                'rgba(2, 228, 52, 1)',
                ],
                borderColor: [
                'rgba(2, 228, 52, 1)',
                ]
            },{
                label: 'Dipending',
                data: [listData[4]],
                backgroundColor: [
                'rgba(118, 68, 223, 1)',

                ],
                borderColor: [
                'rgba(118, 68, 223, 1)',
                ]
            },{
                label: 'Diajukan',
                data: [listData[0]],
                backgroundColor: [
                'rgba(247, 186, 30, 1)',

                ],
                borderColor: [
                'rgba(247, 186, 30, 1)',
                ]
            },{
                label: 'Ditolak',
                data: [listData[3]],
                backgroundColor: [
                'rgba(245, 63, 63, 1)',

                ],
                borderColor: [
                'rgba(245, 63, 63, 1)',
                ]
            }]
        };

        return temp;
    },

    filterStat(value) {

            console.log('Tombol diklik dengan nilai:', value);

            axios.get('{{url("/")}}/api/statistik/filter/'+ value)
                .then(response => {
                    const dataKurFilter = response.data.kurTypes; //menyimpan respon filter object kurTypes
                    const dataBankFilter = response.data.banks; //menyimpan reson filter ovject banks
                    const dataPengajuanFilter = response.data.data_pengajuan[0]; //menyimpan reson filter object data pengajuan

                    //Menghapus data sebelumnya
                    this.clearArray();

                    //Ekstrak data yang diperlukan
                    dataKurFilter.forEach(item =>{
                    this.dataKURTemp.push(item.credit_request_count)
                    })
                    dataBankFilter.forEach(item => {
                    this.dataBankTemp.push(item.credit_request_count)
                    })

                    this.dataPengajuanTemp = Object.values(dataPengajuanFilter).map(value => parseInt(value));
                    console.log('Values Array:', this.dataPengajuanTemp);

                    //Set data pada chart kur & update
                    this.kurChart.data.datasets[0].data = this.dataKURTemp;
                    this.kurChart.update();

                    //set data pada chart bank & update
                    this.banksLabels.forEach(labels => {
                        this.removeData(this.bankChart)
                    });
                    this.bankChart.data.datasets[0].label = 'Banyak Pengajuan';
                    this.banksLabels.forEach((labels,index) => {
                        const newData = this.dataBankTemp[index];
                        this.addData(this.bankChart,labels,newData); 
                    });

                    //set data yang diperlukan pada data pengajuan chart
                    this.dataPengajuanChart.data = this.formaterDataPengajuan(this.dataPengajuanTemp);
                    console.log('isi data chart:', this.dataPengajuanChart.data);
                    this.dataPengajuanChart.update();

                })
                .catch(error => {
                    console.error(error);
                });
    },

    clearArray() {
      this.dataKURTemp.splice(0, this.dataKURTemp.length); // Mengosongkan array
      this.dataBankTemp.splice(0, this.dataBankTemp.length);
      this.dataPengajuanTemp.splice(0, this.dataBankTemp.length);
    },



    // filter stat date yes
    // endpointnya me-return 3 object data statistik
    // this.statistikFilter
    filterStatDate(){


        console.log('startdatenya adalah:', this.startDateValue);
        console.log('enddatenya adalah:', this.endDateValue);

        let requestData = {
        params: {
            start_date: this.startDateValue,
            end_date: this.endDateValue
        }
        };

        axios.get('{{url("/")}}/api/statistik/filter-date', requestData)
            .then(response => {
                const dataKurFilter = response.data.kurTypes; //menyimpan respon filter object kurTypes
                const dataBankFilter = response.data.banks; //menyimpan reson filter ovject banks
                const dataPengajuanFilter = response.data.data_pengajuan[0]; //menyimpan reson filter object data pengajuan

                //Menghapus data sebelumnya
                this.clearArray();

                //Ekstrak data yang diperlukan
                dataKurFilter.forEach(item =>{
                this.dataKURTemp.push(item.credit_request_count)
                })
                dataBankFilter.forEach(item => {
                this.dataBankTemp.push(item.credit_request_count)
                })

                this.dataPengajuanTemp = Object.values(dataPengajuanFilter).map(value => parseInt(value));
                console.log('Values Array:', this.dataPengajuanTemp);

                //Set data pada chart kur & update
                this.kurChart.data.datasets[0].data = this.dataKURTemp;
                this.kurChart.update();

                //set data pada chart bank & update
                this.banksLabels.forEach(labels => {
                    this.removeData(this.bankChart)
                });
                this.bankChart.data.datasets[0].label = 'Banyak Pengajuan';
                this.banksLabels.forEach((labels,index) => {
                    const newData = this.dataBankTemp[index];
                    this.addData(this.bankChart,labels,newData); 
                });

                //set data yang diperlukan pada data pengajuan chart
                this.dataPengajuanChart.data = this.formaterDataPengajuan(this.dataPengajuanTemp);
                console.log('isi data chart:', this.dataPengajuanChart.data);
                this.dataPengajuanChart.update();
            })
            .catch(error => {
                console.error(error);
            });

        },


  }
});

</script>




@endpush
