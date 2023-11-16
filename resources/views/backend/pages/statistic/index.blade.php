@extends('backend.layout.main')

@section('title')
Statistik Daftar Pengajuan KUR
@endsection

@push('styles')
<style>
    .wrapper {
      display: inline-block;
      vertical-align: top;
      height: 100%; /* Atur tinggi ke 100% */
    }
    .custom-input {
    width: 16px;
    height: 30px; /* Set to 'auto' to match the width to placeholder text */
    text-align: center;
    border: 1px solid rgba(0, 0, 0, 0.20);
    background: #FFF;
    }

    .btn-filter{
    display: flex;
    width: 85px;
    height: 40px;
    padding: 8px 20px;
    justify-content: center;
    align-items: center;
    flex-shrink: 0;
    border-radius: 100px;
    background: #3A424F;
    color: white;
    margin-right: 10px;
    }

    .input-filter{
    width: 119px;
    height: 33px;
    flex-shrink: 0;
    border: 1px solid rgba(0, 0, 0, 0.20);
    background: #FFF;
    }
    .flex-container {
    display: flex; /* Create a flex container */
    flex-direction: row; /* Default: horizontal layout */
    }

    .mr-10 {
    margin-right: 5px; /* Atur margin-right ke 10px */
    }
    .piechart-container{
        width: 100%;
        height:400px !important;

    }
    


  </style>
    
@endpush

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
                    <button type="button" class="btn btn-filter" onclick="filterBtn(1)">1 hari</button>
                    <button type="button" class="btn btn-filter" onclick="filterBtn(2)">1 minggu</button>
                    <button type="button" class="btn btn-filter " onclick="filterBtn(3)">1 bulan</button>
                    <button type="button" class="btn btn-filter " onclick="filterBtn(4)">6 bulan</button>
                    <button type="button" class="btn btn-filter " onclick="filterBtn(5)">1 tahun</button>
                    <button type="button" class="btn btn-filter " onclick="filterBtn(6)">All time</button>
                </div>
            </div>
            <div class="wrapper" style="display: inline-block; margin-left: 10px; vertical-align: top;">
                <form>
                    <label for="fname">Periode:</label><br>
                    <input class="input-filter" type="date" id="fname" name="fname" style="padding: 7px">
                    <input type="text" id="fname" name="fname" placeholder="-" class="custom-input">
                    <input class="input-filter " type="date" id="lname" name="lname" style="padding: 7px">
                </form>
            </div>
            <div class="action-button" style="display: inline-block; margin-left: 5px; vertical-align: bottom; padding: 15px; padding-left: 0 ">
                <a href="#" @click="" class="btn btn-addon btn-info"><i class="fa fa-filter"></i> Filter</a>
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
            <div style="padding: 20px">
                <canvas id="sumLineChart"></canvas>
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
                    Pembaruan Terakhir : <span style="color: #86909C"> 10 September 2023</span>
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
                                <div  style="background-color: rgba(245, 63, 63, 1); padding: 20px">
                                </div>
                            </td>
                            <td style="padding: 7px">Ditolak <br> <span style="font-weight: bold">432.87</span> </td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-9">
                    <canvas id="sumLineChart2"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  const ctx = document.getElementById('sumLineChart').getContext('2d');
  const doughnat = document.getElementById('doughnatChart');
  const doughnat2 = document.getElementById('doughnatChart2');
  const ctx2 = document.getElementById('sumLineChart2');
  const termo_chart = document.getElementById('termoChart')

  const MONTHS = [
  'January',
  'February',
  'March',
  'April',
  'May',
  'June',
  'July',
  'August',
  'September',
  'October',
  'November',
  'December'
    ];

    const dummyDate = [
        '3 September',
        '4 September',
        '5 September',
        '6 September',
        '7 September',
        '8 September',
        '9 September'
    ];

    var oneDayKurData = [13, 20, 8];
    var oneDayBankData = [];

    var oneWeekKurData = [];
    var oneWeekBankData = [];

    var oneMonthKurData = [];
    var oneMonthBankData = [];

    var sixMonthKurData = [];
    var sixMonthBankData = [];

    var oneYearKurData = [];
    var oneYearBankData = [];

    var allTimeKurData = [];
    var allTImeBankData = [];

    const kurLabels =[
    'Kur Kecil',
    'Kur Mikro',
    'Kur Super Mikro']



    function addData(chart,label, newData) {
        chart.data.labels.push(label);
        chart.data.datasets.forEach((dataset) => {
            dataset.data.push(newData);
        });
        chart.update();
    }

    function removeDatasets(chart) {
    chart.data.labels.pop();
    chart.data.datasets.forEach((dataset) => {
        dataset.data.pop();
    });
    chart.update();
    }
    


    // Button Index = {1 : 1 hari, 2 : 1 minggu, 3 : 1 bulan, 4 : 6 bulan, 5: 1 tahun, 6: All Time}
    function filterBtn(btnIndex) {

        switch (btnIndex) {
            case 1:
            
            kurLabels.forEach(labels => {
                removeDatasets(kurChart)
                
            });
            kurLabels.forEach((labels,index) => {
                const newData = oneDayKurData[index];
                addData(kurChart,labels,newData);
            });
            
            
            

            
            // doughnat2.data.datasets[0].data = oneDayBankData;
            // doughnat2.update();
            break;
            case 2:
            doughnat.data.datasets[0].data = oneWeekKurData;
            doughnat.update();
            
            doughnat2.data.datasets[0].data = oneWeekKurData;
            doughnat2.update();
            break;
            case 3:
            doughnat.data.datasets[0].data = oneMonthKurData;
            doughnat.update();
            
            doughnat2.data.datasets[0].data = oneMonthBankData;
            doughnat2.update();
            break;
            case 4:
            doughnat.data.datasets[0].data = sixMonthKurData;
            doughnat.update();
            
            doughnat2.data.datasets[0].data = sixMonthBankData;
            doughnat2.update();
            break;
            case 5:
            doughnat.data.datasets[0].data = oneYearKurData;
            doughnat.update();
            
            doughnat2.data.datasets[0].data = oneYearBankData;
            doughnat2.update();
            break;
            case 6:
            doughnat.data.datasets[0].data = allTimeKurData;
            doughnat.update();
            
            doughnat2.data.datasets[0].data = allTImeBankData;
            doughnat2.update();
            break;
        }

        
    }

    const termo_data = {
      labels: ['Data Pengajuan'],
      datasets: [{
        label: 'Diterima',
        data: [445],
        backgroundColor: [
          'rgba(22, 93, 255, 1)',
        ],
        borderColor: [
          'rgba(22, 93, 255, 1)'
        ]
      },{
        label: 'Diproses',
        data: [445],
        backgroundColor: [
          'rgba(2, 228, 52, 1)',
        ],
        borderColor: [
          'rgba(2, 228, 52, 1)',
        ]
      },{
        label: 'Diajukan',
        data: [445],
        backgroundColor: [
          'rgba(247, 186, 30, 1)',

        ],
        borderColor: [
          'rgba(247, 186, 30, 1)',
        ]
      },{
        label: 'Diproses',
        data: [445],
        backgroundColor: [
          'rgba(245, 63, 63, 1)',

        ],
        borderColor: [
          'rgba(245, 63, 63, 1)',
        ]
      }]
    };

    new Chart(termo_chart, {
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

    const gradientBg = ctx.createLinearGradient(0,0,0,300);
    gradientBg.addColorStop(0,'rgba(22, 93, 255,0.2)')
    gradientBg.addColorStop(1,'rgba(22, 93, 255,0.005)')



  new Chart(ctx, {
    type: 'line',
    data: {
      labels: dummyDate,
      datasets: [{
        label: 'My First Dataset',
        data: [1,4,5,4,3,2,3],
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

  const dataKur = {
    labels: [
    'Kur Kecil',
    'Kur Mikro',
    'Kur Super Mikro'],
    datasets: [{
        label: 'My First Dataset',
        data: [300, 50, 100],
        backgroundColor: [
        'rgba(22, 93, 255, 1)',
        'rgba(20, 201, 201, 1)',
        'rgba(247, 186, 30, 1)'
        ],
        hoverOffset: 4
        }]
    }


  const kurChart = new Chart(doughnat, {
    type: 'doughnut',
    data: dataKur,  
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

new Chart(doughnat2, {
    type: 'pie',
    data: {
      labels: [
    'BCA',
    'Mandiri',
    'BNI',
    'BRI',
    'Jateng',
    'Syariah Indonesia',
    'KB Bukopin',
    'BPD DIY',
    'Sinarmas',
    'BRN',
    'PR BPD Papua'],
      datasets: [{
        label: 'My First Dataset',
        data: [300, 50, 100,200,8,7,6,5,4,3,2],
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
        
    },
});

new Chart(ctx2, {
    type: 'bar',
    data: {
      labels: [1,2,3,4,5,6,7],
      datasets: [{
        label: 'Diterima',
        data: [65, 59, 80, 81, 56, 55, 40],
        backgroundColor: [
        'rgba(60, 126, 255, 1)'
        ],
        borderColor: [
        'rgba(60, 126, 255, 1)'
        ],
        borderWidth: 1
        },{
        label: 'Diajukan',
        data: [65, 59, 80, 81, 56, 55, 40],
        backgroundColor: [
        'rgba(246, 190, 44, 1)'
        ],
        borderColor: [
        'rgba(246, 190, 44, 1)'
        ],
        borderWidth: 1
        },{
        label: 'Diproses',
        data: [65, 59, 80, 81, 56, 55, 40],
        backgroundColor: [
        'rgba(2, 228, 52, 1)'
        ],
        borderColor: [
        'rgba(2, 228, 52, 1)'
        ],
        borderWidth: 1
        },{
        label: 'Ditolak',
        data: [65, 59, 80, 81, 56, 55, 40],
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
;
</script>
 

@endpush
