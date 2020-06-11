<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style type="text/css">
${demo.css}
</style>
<script type="text/javascript">
$(function () {
$('#posisi-grafik').highcharts({
    chart: {
        type: 'column'
    },
    title: {
        text: 'Hasil Diagnosis Penyakit'
    },
    subtitle: {
        text: 'Sepanjang Tahun'
    },
    xAxis: {
        categories: ['Waktu']
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Kasus'
        }
    },
	tooltip: {
		headerFormat: '<span style="font-size:12px">{point.key}</span><table width="200">',
		pointFormat: '<tr><td style="color:{series.color};padding:0;width:150px">{series.name}: </td>' +
			'<td style="padding:0"><b>{point.y:1f}</b></td></tr>',
		footerFormat: '</table>',
		shared: true,
		useHTML: true
	},
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [
<?php
$result=$koneksi->query("SELECT * FROM penyakit order by nama_pen asc ");
while($row=mysqli_fetch_array($result,MYSQLI_BOTH)) {
	$idpen=$row['idpen'];
	$result2=$koneksi->query("SELECT * FROM konsultasi where idpen_kon='$idpen' ");
	$jum_kasus=mysqli_num_rows($result2);
?>	
	{
        name: '<?= $row['nama_pen'];?>',
        data: [<?= $jum_kasus;?>]
    },
<?php } ?>	
	]
	
});
});
</script>
<script src="grafik/highcharts.js"></script>
<script src="grafik/exporting.js"></script>
<div id="posisi-grafik" style="min-width: 510px; height: 400px; margin: 0 auto; margin-bottom:50px;"></div>
