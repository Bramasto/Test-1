<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Highcharts Example</title>

		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<style type="text/css">
#container {
	height: 400px; 
	min-width: 310px; 
	max-width: 800px;
	margin: 0 auto;
}
		</style>
		<script type="text/javascript">
$(function () {
    $('#container').highcharts({

        chart: {
            type: 'column',
            options3d: {
                enabled: true,
                alpha: 15,
                beta: 15,
                viewDistance: 25,
                depth: 40
            },
            marginTop: 80,
            marginRight: 40
        },

        title: {
            text: 'Survey Toilet Terminal 2 Juanda'
        },

        xAxis: {
            categories: ['Toilet1', 'Toilet2', 'Toilet3', 'Toilet4', 'Toilet5', 'Toilet6', 'Toilet7', 'Toilet8', 'Toilet9', 'Toilet10']
        },

        yAxis: {
            allowDecimals: false,
            min: 0,
            title: {
                text: 'Jumlah Polling'
            }
        },

        tooltip: {
            headerFormat: '<b>{point.key}</b><br>',
            pointFormat: '<span style="color:{series.color}">\u25CF</span> {series.name}: {point.y} / {point.stackTotal}'
        },

        plotOptions: {
            column: {
                stacking: 'normal',
                depth: 40
            }
        },

        
series:[<?php 
        	include('config.php');
           $sql   = "SELECT distinct hasil  FROM polls";
            $query = mysql_query( $sql )  or die(mysql_error());
            while( $ret = mysql_fetch_array( $query ) ){
            	$hasil=$ret['hasil'];                     
                 $sql_jumlah   = "SELECT id FROM polls WHERE hasil='$hasil'";        
                 $query_jumlah = mysql_query( $sql_jumlah ) or die(mysql_error());
                 while( $data = mysql_fetch_array( $query_jumlah ) ){
                    $id = $data['id'];
            		              
				 }
                  ?>
                  {
                      name: '<?php echo $hasil; ?>',
                      data: [<?php echo $id; ?>]
                  },
                  <?php } ?>
            ]
    });
});


		</script>
	</head>
	<body>

<script src="../js/highcharts.js"></script>
<script src="../js/highcharts-3d.js"></script>
<script src="../js/modules/exporting.js"></script>

<div id="container" style="height: 400px"></div>
	</body>
</html>
