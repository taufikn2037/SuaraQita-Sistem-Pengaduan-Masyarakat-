<!DOCTYPE html>
<html lang="en"><head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Laporan Pengaduan Masyarakat</title>
	<style>
		html {
			margin: 0;
			padding: 0;
		}
		table tr td,th {
			font-size: 13px;
		}
		table tr .text {
			text-align: right;
			font-size: 13px;
		}
		table tr .text2 {
			text-align: left;
		
		}

		.container {
			margin-top: 20px;
			margin-left: 55px;
		}
	</style>
</head><body>
	<div class="container">
		<table border="0" width="80%">
			<tr>
				<td align="center"><img src="https://i.postimg.cc/nhSvmYLJ/LOGO-KOTA-BANDAR-LAMPUNG-BARU.png" alt="Logo" width="90" height="90"></td>
				<td>
					<center>
						<font size="4">PEMERINTAHAN KOTA BANDAR LAMPUNG</font><br>
						<font size="5"><b>SEKRETARIAT KOTA</b></font><br>
						<font size="2">Jalan Dr. Susilo No.2 Telp.(0721):,252 300 - 252 641</font><br>
						<font size="2"><i>BANDAR LAMPUNG 35214</i></font>
					</center>
				</td>
			</tr>
		</table>
		<table width="90%">
			<tr>
				<td colspan="2"><hr></td>
			</tr>
		</table>
		<table border="0" width="90%">
				<tr>
					<td align="center">
						<b style="font-size: 20px;">Data Pengaduan Masyarakat</b> <br><br><i>Laporan data pengaduan dari <?= date('d F Y' , strtotime($tgl_awal)); ?> s/d <?= date('d F Y' , strtotime($tgl_akhir)); ?></i>
					</td>
				</tr>
		</table>
		<br>
		<table border="1" width="90%" cellpadding="5" cellspacing="0">
            <thead>
                <tr class="text-center">
                    <th>No.</th>
                    <th>Nama</th>
                    <th>NIK</th>
                    <th>Laporan</th>
                    <th>Tgl. Pengaduan</th>
                    <th>Status</th>
                    <th>Tanggapan</th>
                    <th>Tgl. Tanggapan</th>
					<th>Rating</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
				<?php foreach($data_masyarakat as $dp) : ?>
                    <tr style="text-align: center;">
                        <th scope="row"><?= $no++; ?></th>
						<td><?= $dp['name__user'] ?></td>
                        <td><?= $dp['nik__user'] ?></td>
                        <td><?= $dp['isi_laporan'] ?></td>
                        <td><?= $dp['tgl_pengaduan'] ?></td>
                        <td>
                            <?php
                            if ($dp['status'] == '0') {
                                echo '<span class="badge badge-secondary">Sedang Diverifikasi</span>';
                            } elseif ($dp['status'] == 'proses') {
                                echo '<span class="badge badge-primary">Sedang Diproses</span>';
                            } elseif ($dp['status'] == 'selesai') {
                                echo '<span class="badge badge-success">Selesai Dikerjakan</span>';
                            } elseif ($dp['status'] == 'tolak') {
                                echo '<span class="badge badge-danger">Pengaduan Ditolak</span>';
                            } else {
                                echo '-';
                            }
                            ?>
                        </td>
                        <td><?= $dp['tanggapan'] ?></td>
                        <td><?= $dp['tgl_tanggapan'] ?></td>
						<td class="text-center">
                            <?php if ($dp['status'] == 'selesai' && $dp['rating'] !== '0') { ?>
                                <?= $dp['rating']; ?>
                            <?php } ?>   
                            <?php if ($dp['status'] !== 'selesai') { ?>
                                -
                            <?php } ?>
                        </td>
                    </tr>
                <?php endforeach; ?>    
            </tbody>
		</table>
		<br><br><br>
		<table border="0" width="90%">
			<tr>
                <td width="65%"></td>
				<td class="text2" align="right">Bandar Lampung, <?php echo Date('d F Y'); ?><br>SEKRETARIAT KOTA BANDAR LAMPUNG<br><br><br><br><br><u>........................................</u><br>NIP.</td>
			</tr>
		</table>
	</div>
</body></html>