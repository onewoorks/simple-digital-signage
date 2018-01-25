<section class="content-header">
    <h1>Dashboard
    </h1>
    <ol class="breadcrumb">
        <li><a href="/zak"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
    </ol>
</section>


<section  class="content container-fluid">
    <div class="row">
        <?php if(isset($cawangan)):?>
        <?php foreach($cawangan as $c):?>
        <div class="col-sm-4">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title"><?= $c['nama_kedai'];?> <small><i><?= $c['lokasi'];?></i></small></h3>
                    <div class="box-tools pull-right">
                        <a class="btn btn-box-tool" href="<?= ROOT_URL;?>manager/cawangan-ubah-maklumat/<?= $c['akses_id'];?>"><i class="fa fa-edit"></i></a>
                    </div>
                </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">Mutu</th>
                                <th class="text-center">Jual</th>
                            </tr>
                            
                        </thead>
                        <tbody>
                            <tr>
                                <th class="text-center">999</th>
                                <td class="text-center">RM <?= $c['harga_emas']['harga_jual']['999'];?>/g</td>
                            </tr>
                            <tr>
                                <th class="text-center">916</th>
                                <td class="text-center">RM <?= $c['harga_emas']['harga_jual']['916'];?>/g</td>
                            </tr>
                            
                        </tbody>
                    </table>
                <div class="box-body">
                   
                </div>


                <div class="box-footer">
                    <i>Kemaskini terakhir : <?= $c['tarikh_masa'];?></i>
                </div>
            </div>
        </div>
        <?php endforeach;?>

       <?php endif;?>

    </div>
</section>