<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Data Pengajuan
                </div>
                <div>
                    <canvas id="myChart" width="500" height="250"></canvas>
                </div>
            </div>
        </div>
    </div>

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
    var oneDayBankData = [250, 50, 100,200,8,7,0,5,4,3,0];

    var oneWeekKurData = [4];
    var oneWeekBankData = [5];

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

    const bankLabels = [
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
    'PR BPD Papua']



    function addData(chart,label, newData) {
        chart.data.labels.push(label);
        chart.data.datasets.forEach((dataset) => {
            dataset.data.push(newData);
        });
        chart.update();
    },

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
            kurChart.data.datasets[0].label = 'Data Satu Hari';

            kurLabels.forEach((labels,index) => {
                const newData = oneDayKurData[index];
                addData(kurChart,labels,newData);
            });

            ;

            bankLabels.forEach(labels => {
                removeDatasets(bankChart)
            });

            bankChart.data.datasets[0].label = 'Data Satu Hari';

            bankLabels.forEach((labels,index) => {
                const newData = oneDayBankData[index];
                addData(bankChart,labels,newData); 
            });

            break;
            case 2:
            kurLabels.forEach(labels => {
                removeDatasets(kurChart)

            });
            kurLabels.forEach((labels,index) => {
                const newData = oneWeekKurData[index];
                addData(kurChart,labels,newData);
            });

            bankLabels.forEach(labels => {
                removeDatasets(bankChart)
            });

            bankLabels.forEach((labels,index) => {
                const newData = oneWeekBankData[index];
                addData(bankChart,labels,newData);
            });

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
    };

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


const dataBank = {
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
    };
  


const bankChart = new Chart(doughnat2, {
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
        data: [64, 59, 80, 81, 56, 55, 40],
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


const termo_data = {
      labels: ['Data Pengajuan'],
      datasets: [{
        label: 'Diterima : 445',
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
;
</script>
</script>
</body>
</html>