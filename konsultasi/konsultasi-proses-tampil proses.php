<?php
# pengambilan nilai cf setiap penyakit
$result3=$koneksi->query("SELECT * FROM penyakit order by idpen ");
while($row3=mysqli_fetch_array($result3,MYSQLI_BOTH)) {
	$idpen=$row3['idpen']; $urut=0;
	# cek semua gejala per penyakit
	$result=$koneksi->query("SELECT * FROM pg where idpen_pg='$idpen' order by idgej_pg asc ");
	$jum_gej[$idpen]=mysqli_num_rows($result); 
	while($row=mysqli_fetch_array($result,MYSQLI_BOTH)) {
		$idgej=$row['idgej_pg']; $cf_gej[$idpen][$urut]=$row['cf_gej']; 
		# cari gejala user
		$result2=$koneksi->query("SELECT * FROM konsultasi_gejala where idgej_kg='$idgej' and idkon_kg='$idkon'  ");
		$row2=mysqli_fetch_array($result2,MYSQLI_BOTH);
		$ada=mysqli_num_rows($result2); $cf_user[$idpen][$urut]=0;
		if ($ada>0) {$cf_user[$idpen][$urut]=$row2['cf_kg'];}
		$cf_kali[$idpen][$urut]=$cf_gej[$idpen][$urut]*$cf_user[$idpen][$urut];		
		echo $idpen." >> ".$idgej." >> ".$cf_gej[$idpen][$urut]." >> ".$cf_user[$idpen][$urut]." >>> ".$cf_kali[$idpen][$urut];
		echo "<br>";
		$urut++;
	}
	echo "<br>";
	
	# proses kombinasi nilai cf
	$urut_kombi=1;
	echo $cf_kombi[$urut_kombi]=$cf_kali[$idpen][0]+($cf_kali[$idpen][1]*(1-$cf_kali[$idpen][0]));
	echo "<br>";
	if ($jum_gej[$idpen]>2) {
		for($i=2;$i<=$jum_gej[$idpen]-1;$i++) {
			$urut_kombi++;
			echo $cf_kombi[$urut_kombi]=$cf_kombi[$urut_kombi-1]+($cf_kali[$idpen][$i]*(1-$cf_kombi[$urut_kombi-1]));
			echo "<br>";
		}
		$cf_pen[$idpen]=$cf_kombi[$urut_kombi];
	}
	echo "<br>";
}

# urutkan hasil nilai akhir
arsort($cf_pen);
//while(list($idpen_hasil,$cf_hasil)=each($cf_pen)) {
	//echo $idpen_hasil." ".$cf_hasil."<br>"; 
	//break;
//}
?>