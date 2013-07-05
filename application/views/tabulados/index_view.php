     



<div class="row-fluid">
  <div class="span2">
          <div class="well sidebar-nav cen-sidebar">
            <ul class="nav nav-list">
              <li class="nav-header">Opciones</li>
              <li class="active"><a href="#">Tabulado 1</a></li>
              <li><a href="#">Tabulado 2</a></li>
              <li><a href="#">Tabulado 3</a></li>
              <li><a href="#">Tabulado 4</a></li>
            </ul>
          </div><!--/.well -->
</div><!--/span-->

  <div class="span10">
    <div id="chart_div"></div>
    <script type="text/javascript" src="<?php echo base_url('js/highcharts/highcharts.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('js/highcharts/exporting.js'); ?>"></script>

    <script type="text/javascript">
      $(function () {
        var chart;
        $(document).ready(function() {
            chart = new Highcharts.Chart({
                credits: {
                    enabled: false
                },
                chart: {
                    renderTo: 'chart_div',
                    type: 'column'
                },
                title: {
                    text: 'Tabulado 1'
                },
                subtitle: {
                    text: 'CENPESCO'
                },
                xAxis: {
                    categories: [
              '1','2','3','4','5','6','7','8','9','10','11'               
                    ]
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Number'
                    }
                },
                legend: {
                    layout: 'vertical',
                    backgroundColor: '#FFFFFF',
                    align: 'left',
                    verticalAlign: 'top',
                    x: 100,
                    y: 70,
                    floating: true,
                    shadow: true
                },
                tooltip: {
                    formatter: function() {
                        return ''+
                            this.x +': '+ this.y;
                    }
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    }
                },
                
                series: [

              {name: 'Views',data:[4506,3888,2814,2161,2964,3596,2380,3387,3702,1566,435]},              {name: 'Downloads',data:[ 1087,903,515,418,590,1026,499,737,654,401,133]}                ]
            });

        });

    });

    </script>


</div>
</div>