<html>

<head>
    <title></title>
    <style>
        * {
            margin-right: 15px;
            margin-left: 7px;
            padding: 0;
        }

        body {
            font-family: arial narrow;
            font-size: 14px;
        }

        .tdrh {
            border: 1px solid #000000;
            font-weight: bold;
            text-align: center;
        }

        .tdrh0 {
            border: 1px solid #5A5A5A;
            text-align: center;
            font-size: 10px;
            padding-left: 2px;
            padding-right: 2px;
        }

        .tdrc1 {
            border: 1px solid #5A5A5A;
            padding-left: 5px;
            padding-right: 5px;
        }

        .tdrc2 {
            border: 1px solid #ddd;
            width: 100%;
            padding-left: 5px;
            padding-right: 5px;
        }

        img {
            padding: 0 0 0 15%;
            width: 6%;
            position: fixed;
        }
    </style>
</head>

<body>
    <center>
        <font size="4"><b>LAPORAN SPP</b>
    </center>
    </font>
    <div class="top">
							<div colspan="3">
								<table>
									<tr>
										<td>
                                        <b>Periode : <?=$this->input->post("tahun")?> </b>
										</td>
									</tr>
								</table>
							</div>
						</div>
<br>
     <table width="100%" cellspacing="0" cellpadding="0" align="center">
     <thead>
         <tr>
             <td class="tdrh">No</td>
             <td class="tdrh">Nama</td>
             <td class="tdrh">Total Iuran</td>
             <td class="tdrh">Keterangan</td>
             <td class="tdrh">Status</td>
            </tr>
            </thead>
            <tbody>
            <?php $no = 1;foreach ($laporan2 as $iuran): ?>
                <tr>
                <td class="tdrc1"><?=$no++?></td>
                                                <td class="tdrc1"><?=$iuran->nama_siswa?></td>
                                                <td class="tdrc1"><?="Rp " . number_format($iuran->total_iuran, 0, ',', '.')?></td>
                                                <td class="tdrc1"><?=$iuran->keterangan_iuran?></td>
                                                <td class="tdrc1"><?php if($iuran->status=200){echo"LUNAS";}else{echo"BELUM LUNAS";}?></td>
                </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</body>

</html>