<section class="content-header">
    <h1>Cawangan<small>Ubah Maklumat Paparan</small>
    </h1>

    <ol class="breadcrumb">
        <li><a href="<?= ROOT_URL; ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Cawangan</li>
    </ol>
</section>

<section class="content container-fluid">
    <form id="update_maklumat_paparan" class="form-horizontal">
        <div class="row">
            <div class="col-sm-4">
                <form id="update_maklumat_paparan" class="form-horizontal">
                    <div class="box">
                        <div class="box-header with-border">
                            <div class="box-title">Ubah Maklumat Paparan</div>
                        </div>
                        <div class="box-body">

                            <div class="form-group">
                                <input type='hidden' name='no_akses_id' value='<?= $akses_id; ?>' />
                                <label class="control-label col-sm-2">999</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <span class="input-group-addon">RM</span>
                                        <input type="text" name="jual_999" 
                                               value="<?= $rekod_content['rekod'][0]['harga_emas']['harga_jual']['999']; ?>" 
                                               class="form-control text-center" required/>
                                    </div>
                                </div>

                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-2">916</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <span class="input-group-addon">RM</span>
                                        <input type="text" name="jual_916" class="form-control text-center" required 
                                               value="<?= $rekod_content['rekod'][0]['harga_emas']['harga_jual']['916']; ?>" />
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="box-footer">
                            <div class="pull-right">
                                <input type='hidden' name='media' />
                                <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i> Kemaskini</button>
                            </div>
                        </div>

                    </div>
                    
                    <div class="box">
                        <div class="box-header with-border">
                            <div class="box-title">Ubah Paparan Gambar</div>
                        </div>
                        <div class="box-body text-right">
                            <a href='<?= ROOT_URL;?>manager/cawangan-ubah-gambar/<?= $no_cawangan; ?>' class="btn btn-primary">
                                <i class="fa fa-floppy-o"></i> Pilih Gambar</a>
                        </div>
                    </div>

            </div>

            <div class="col-sm-8">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Maklumat Paparan Terdahulu</h3>
                    </div>
                    <table class="table table-bordered table-condensed" style="font-size: 0.9em">
                        <thead>
                            <tr>
                                <th rowspan="2">Tarikh</th>
                                <th colspan="2" class="text-center">Jual</th>
                            </tr
                            <tr>
                                <th class="text-center">999</th>
                                <th class="text-center">916</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($rekod_content): ?>
                                <?php foreach ($rekod_content['rekod'] as $rekod): ?>
                                    <tr>
                                        <td><?= $rekod['tarikh_masa']; ?></td>
                                        <td class="text-center"><?= $rekod['harga_emas']['harga_jual']['999']; ?></td>
                                        <td class="text-center"><?= $rekod['harga_emas']['harga_jual']['916']; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="5"><i>Tiada Maklumat Paparan Terdahulu</i></td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </form>
</section>

<script>
    $(function () {
        var currentImages = <?= json_encode($rekod_content['media']); ?>;

        $('#update_maklumat_paparan').submit(function (e) {
            e.preventDefault();
            var media = currentImages;
            $('[name=media]').val(JSON.stringify(media));
            var input = $(this).serializeArray();

            $.ajax({
                url: 'manager',
                data: {method: 'UpdateHarga', data: input},
                success: function (data) {
                    location.reload();
                }
            });
        })

    })
</script>