<?php
include('config.php');
?>
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
            categories: [
	<?php
	
	$select = mysql_query("select distinct lokasi from polls order by lokasi asc");
	while($data=mysql_fetch_assoc($select)){
	echo "'".$data['lokasi']."',";
	echo mysql_error();	
	}
	?>
			]
        },

        yAxis: {
            allowDecimals: false,
            min: 0,
			
			<?php 
			/*
			$selectmax = mysql_query("select count(id) as id from polls");
			while($datamax = mysql_fetch_assoc($selectmax)){
			echo $datamax['id'];	
			} */
			?>
			
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

        
series:[
<?php
$select4 = mysql_query("select distinct hasil from polls order by hasil desc");
while($data4=mysql_fetch_assoc($select4)){
	echo '{name:"'.$data4['hasil'].'",';
	echo 'data:[';
	$select2 = mysql_query("select distinct lokasi from polls order by lokasi desc");
	while($data2=mysql_fetch_array($select2)){
		$select3 = mysql_query('select count(id) as id from polls where hasil="'.$data4['hasil'].'" and lokasi="'.$data2['lokasi'].'"');
		while($data3=mysql_fetch_assoc($select3)){
			echo $data3['id'].',';
		}
	}
	echo']},';
}
?>
            ]
    });
});
		</script>
	</head>
	<body>

<script src="../js/highcharts.js"></script>
<script src="../js/highcharts-3d.js"></script>
<script src="../js/modules/exporting.js"></script>

<div id="container" style="height: 400px">
</div>
	</body>
</html>
