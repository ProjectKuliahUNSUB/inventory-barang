<div class="card bg-background-component text-white">
    <div class="card-header">
        <h5 class="card-title">Barang</h5>


    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="row">
            <div id="chart-container" style="width: 100%; height: 400px;"></div>


            <script defer>
                var chart = echarts.init(document.getElementById('chart-container'));
                // Parse the JSON string into a JavaScript object
                var jsonData = JSON.parse(JSON.stringify(<?= $data ?>))
                console.log(jsonData);

                // Extract unique jenis values to use as legend data
                var legendData = [...new Set(jsonData.map(item => item.jenis))];

                // Extract tanggal values to use as xAxis data
                var xAxisData = [...new Set(jsonData.map(item => item.tanggal))];

                // Prepare series data for each jenis
                var seriesData = legendData.map(jenis => {
                    return {
                        name: jenis,
                        type: 'line',
                        stack: 'Total',
                        smooth: true,
                        lineStyle: {
                            width: 3,
                            shadowColor: 'rgba(0,0,0,0.3)',
                            shadowBlur: 10,
                            shadowOffsetY: 8,
                        },
                        data: jsonData.filter(item => item.jenis === jenis).map(item => item.jumlah)
                    };
                });

                // Use extracted data to set ECharts options
                chart.setOption({
                    color: ['#00FF00', '#FF0000'],
                    tooltip: {
                        trigger: 'axis'
                    },
                    legend: {
                        data: legendData,
                        textStyle: {
                            color: 'white'
                        },
                    },
                    grid: {
                        left: '3%',
                        right: '4%',
                        bottom: '3%',
                        containLabel: true
                    },
                    toolbox: {
                        feature: {
                            saveAsImage: {}
                        }
                    },
                    xAxis: {
                        type: 'category',
                        boundaryGap: false,
                        data: xAxisData,
                        axisLabel: {
                            textStyle: {
                                color: 'white'
                            }
                        },
                    },
                    yAxis: {
                        type: 'value',
                        axisLabel: {
                            textStyle: {
                                color: 'white'
                            }
                        },
                    },
                    series: seriesData
                });

            </script>
        </div>
        <!-- /.row -->
    </div>
    <!-- ./card-body -->

    <!-- /.card-footer -->
</div>
<!-- /.card -->

<!-- /.col -->