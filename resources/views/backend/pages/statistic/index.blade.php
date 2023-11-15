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
                    <button type="button" class="btn btn-filter">1 hari</button>
                    <button type="button" class="btn btn-filter">1 minggu</button>
                    <button type="button" class="btn btn-filter ">1 bulan</button>
                    <button type="button" class="btn btn-filter ">6 bulan</button>
                    <button type="button" class="btn btn-filter ">1 tahun</button>
                    <button type="button" class="btn btn-filter ">All time</button>
                </div>
            </div>
            <div class="wrapper" style="display: inline-block; margin-left: 10px; vertical-align: top;">
                <form>
                    <label for="fname">Periode:</label><br>
                    <input class="input-filter" type="text" id="fname" name="fname">
                    <input type="text" id="fname" name="fname" placeholder="-" class="custom-input">
                    <input class="input-filter " type="text" id="lname" name="lname">
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
            <div style="padding: 20px">
                <canvas id="sumLineChart2"></canvas>
            </div>
        </div>
    </div>
</div>

@include('backend.pages.testimoni.modals.form')

@endsection

@push('scripts')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  const ctx = document.getElementById('sumLineChart');
  const doughnat = document.getElementById('doughnatChart');
  const doughnat2 = document.getElementById('doughnatChart2');
  const ctx2 = document.getElementById('sumLineChart2');

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



  new Chart(ctx, {
    type: 'line',
    data: {
      labels: MONTHS,
      datasets: [{
        label: 'My First Dataset',
        data: [6, 9, 8, 1, 6, 5, 8,10,3,4,5,1,12,3],
        	fill: false,
        borderColor: 'rgb(75, 192, 192)',
        tension: 0.1
        }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });

  // legendMarginRight

  const legendMarginRight ={
    id: 'legendMarginRight',
    afterInit(chart,args,options){
        console.log(chart)


    }
  };



  new Chart(doughnat, {
    type: 'doughnut',
    data: {
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
    },  
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                position : 'right',
                align: 'center',    
            }
        }   
    },
    plugins: [legendMarginRight]
});   

new Chart(doughnat2, {
    type: 'doughnut',
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
        }   
    },
});

new Chart(ctx2, {
    type: 'bar',
    data: {
      labels: MONTHS,
      datasets: [{
        label: 'My First Dataset',
        data: [65, 59, 80, 81, 56, 55, 40],
        backgroundColor: [
        'rgba(255, 99, 132, 0.2)',
        'rgba(255, 159, 64, 0.2)',
        'rgba(255, 205, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(201, 203, 207, 0.2)'
        ],
        borderColor: [
        'rgb(255, 99, 132)',
        'rgb(255, 159, 64)',
        'rgb(255, 205, 86)',
        'rgb(75, 192, 192)',
        'rgb(54, 162, 235)',
        'rgb(153, 102, 255)',
        'rgb(201, 203, 207)'
        ],
        borderWidth: 1
        }]
    }
});
</script>
 

@endpush
