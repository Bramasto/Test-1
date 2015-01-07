<?php
include 'config.php';
$select4 = mysql_query("select distinct hasil from polls order by hasil asc");
while($data4=mysql_fetch_assoc($select4)){
	echo '{name:"'.$data4['hasil'].'",';
	echo 'data:[';
	$select2 = mysql_query("select distinct lokasi from polls order by lokasi asc");
	while($data2=mysql_fetch_array($select2)){
		$select3 = mysql_query('select count(id) as id from polls where hasil="'.$data4['hasil'].'" and lokasi="'.$data2['lokasi'].'"');
		while($data3=mysql_fetch_assoc($select3)){
			echo $data3['id'].',';
		}
	}
	echo']},';
}
?>