<div class="col-md-6">
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
                        title: {
                            text: 'Stacked Line'
                        },
                        tooltip: {
                            trigger: 'axis'
                        },
                        legend: {
                            data: ['Email', 'Union Ads', 'Video Ads', 'Direct', 'Search Engine']
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
                            data: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun']
                        },
                        yAxis: {
                            type: 'value'
                        },
                        series: [
                            {
                                name: 'Email',
                                type: 'line',
                                stack: 'Total',
                                data: [120, 132, 101, 134, 90, 230, 210]
                            },
                            {
                                name: 'Union Ads',
                                type: 'line',
                                stack: 'Total',
                                data: [220, 182, 191, 234, 290, 330, 310]
                            },
                            {
                                name: 'Video Ads',
                                type: 'line',
                                stack: 'Total',
                                data: [150, 232, 201, 154, 190, 330, 410]
                            },
                            {
                                name: 'Direct',
                                type: 'line',
                                stack: 'Total',
                                data: [320, 332, 301, 334, 390, 330, 320]
                            },
                            {
                                name: 'Search Engine',
                                type: 'line',
                                stack: 'Total',
                                data: [820, 932, 901, 934, 1290, 1330, 1320]
                            }
                        ]
                    });
                </script>
            </div>
            <!-- /.row -->
        </div>
        <!-- ./card-body -->
        <div class="card-footer">
            <div class="row">
                <div class="col-sm-3 col-6">
                    <div class="description-block border-right">
                        <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 17%</span>
                        <h5 class="description-header">$35,210.43</h5>
                        <span class="description-text">TOTAL REVENUE</span>
                    </div>
                    <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-3 col-6">
                    <div class="description-block border-right">
                        <span class="description-percentage text-warning"><i class="fas fa-caret-left"></i>
                            0%</span>
                        <h5 class="description-header">$10,390.90</h5>
                        <span class="description-text">TOTAL COST</span>
                    </div>
                    <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-3 col-6">
                    <div class="description-block border-right">
                        <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 20%</span>
                        <h5 class="description-header">$24,813.53</h5>
                        <span class="description-text">TOTAL PROFIT</span>
                    </div>
                    <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-3 col-6">
                    <div class="description-block">
                        <span class="description-percentage text-danger"><i class="fas fa-caret-down"></i>
                            18%</span>
                        <h5 class="description-header">1200</h5>
                        <span class="description-text">GOAL COMPLETIONS</span>
                    </div>
                    <!-- /.description-block -->
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.card-footer -->
    </div>
    <!-- /.card -->
</div>
<!-- /.col -->