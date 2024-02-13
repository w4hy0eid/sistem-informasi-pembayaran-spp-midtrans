<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>SISTEM INFORMASI PEMBAYARANList Pembayaran Saya</title>
    <link href="<?=base_url()?>assets/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <?php $this->load->view("dashboard/partials/css")?>
</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">
        <?php $this->load->view("dashboard/partials/header")?>

        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->

        <?php $this->load->view("dashboard/partials/sidebar")?>

        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
       <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">

                <!-- row -->


                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Data Pembayaran</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="display" style="min-width: 845px; color:black;">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Total Iuran</th>
                                                <th>Tanggal</th>
                                                <th>Keterangan</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1;foreach ($list as $iuran): ?>
                                            <tr>
                                                <td><?=$no++?></td>
                                                <td><?=$iuran->nama_siswa?></td>
                                                <td><?="Rp " . number_format($iuran->total_iuran, 0, ',', '.')?></td>
                                                <td><?=$iuran->waktu?></td>
                                                <td><?=$iuran->keterangan_iuran?></td>
                                                
                                                <td><?php if ($iuran->status_code == 200) {?><button type="button" class="btn btn-success">LUNAS</button><?php } else {?><button type="button" class="btn btn-danger">BELUM LUNAS</button><?php }?></td>
                                                   <td><?php if ($iuran->status_code == 200) {?><a href="<?= base_url()?>payment/print/<?=$iuran->order_id?>"class="btn btn-primary"><i class="fa fa-print"></i></a><?php } else {?><form id="payment-form" method="post" action="<?=base_url()?>payment/finish"><input type="hidden" name="id_iuran" value="<?=$iuran->id_iuran?>"><input type="hidden" name="result_type" id="result-type" value=""> <input type="hidden" name="result_data" id="result-data" value=""><button type="button" id="<?=$iuran->id_iuran?>" class="bayar btn btn-info">BAYAR</button></form><?php }?></td>
                                                   
                                                </tr>
                                            <?php endforeach?>
                                           
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->
        <?php $this->load->view("dashboard/partials/footer")?>
        <!--**********************************
            Footer end
        ***********************************-->

        <!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="<?=base_url()?>assets/js/jquery-3.5.1.min.js"></script>
    <?php $this->load->view("dashboard/partials/js")?>
    <!-- Datatable -->
    <script src="<?=base_url()?>assets/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="<?=base_url()?>assets/js/plugins-init/datatables.init.js"></script>
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="<?=CLIENTKEY?>"></script>
    <script type="text/javascript">
    //Delete Data Wakaf
    $(document).ready(function() {
      $(".bayar").click(function() {
        var id = $(this).attr('id');
        $.ajax({
                    url: '<?=base_url()?>payment/token',
                    cache: false,
                    method: 'post',
                    data: {
                        id_iuran: id,
                    },
                    success: function(data) {
                        var resultType = document.getElementById('result-type');
                        var resultData = document.getElementById('result-data');
                        function changeResult(type, data) {
                            $("#result-type").val(type);
                            $("#result-data").val(JSON.stringify(data));
                             $(this).attr("disabled", "disabled");
                        }
                        snap.pay(data, {

                            onSuccess: function(result) {
                                changeResult('success', result);
                                console.log(result.status_message);
                                console.log(result);
                                $("#payment-form").submit();
                            },
                            onPending: function(result) {
                                changeResult('pending', result);
                                console.log(result.status_message);
                                $("#payment-form").submit();
                            },
                            onError: function(result) {
                                changeResult('error', result);
                                console.log(result.status_message);
                                $("#payment-form").submit();
                            }
                        });
                    }
                });
    });
    });
    </script>
</body>

</html>
