<div class="card bg-background-component text-white">
    <div class="card-header">
        <h5 class="card-title">Monthly Recap Report</h5>


    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="row">
            <div id="chart-container" style="width: 100%; height: 400px;"></div>


            <script>
                var chart = echarts.init(document.getElementById('chart-container'));
                chart.setOption({
                    color: ['#00FF00', '#FF0000'],
                    tooltip: {
                        trigger: 'axis'
                    },
                    legend: {
                        data: ['Barang Masuk', 'Barang Keluar'],
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
                        data: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
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
                    series: [
                        {
                            name: 'Barang Masuk',
                            type: 'line',
                            stack: 'Total',
                            smooth: true,
                            lineStyle: {
                                width: 3,
                                shadowColor: 'rgba(0,0,0,0.3)',
                                shadowBlur: 10,
                                shadowOffsetY: 8,
                                // color: '#00ff00'
                            },

                            // itemStyle: {normal: {areaStyle: {type: 'default'}}},
                            data: [120, 132, 101, 134, 90, 230, 210]
                        },
                        {
                            name: 'Barang Keluar',
                            type: 'line',
                            stack: 'Total',
                            smooth: true,
                            lineStyle: {
                                width: 3,
                                shadowColor: 'rgba(0,0,0,0.3)',
                                shadowBlur: 10,
                                shadowOffsetY: 8,
                                // color: '#ff0000'
                            },

                            // itemStyle: {normal: {areaStyle: {type: 'default'}}},
                            data: [220, 182, 191, 234, 290, 330, 310]
                        },

                    ]
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