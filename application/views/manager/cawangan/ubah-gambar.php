<section class="content-header">
    <h1>Cawangan<small>Ubah Maklumat Paparan</small>
    </h1>

    <ol class="breadcrumb">
        <li><a href="<?= ROOT_URL; ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="<?= ROOT_URL;?>manager/cawangan-ubah-maklumat/<?= $no_cawangan;?>" >Cawangan</a></li>
    </ol>
</section>

<section class="content container-fluid">
    <form id="update_maklumat_paparan" class="form-horizontal">
        <div class="row">
            <input type='hidden' name='no_akses_id' value='<?= $akses_id; ?>' />
            <input type="hidden" name="jual_999" 
                   value="<?= $rekod_content['rekod'][0]['harga_emas']['harga_jual']['999']; ?>" 
                   class="form-control text-center" required/>

            <input type="hidden" name="jual_916" class="form-control text-center" required 
                   value="<?= $rekod_content['rekod'][0]['harga_emas']['harga_jual']['916']; ?>" />

            <div class="col-sm-12">
                <div class="box hidden">
                    <div class="box-header with-border">
                        <h3 class="box-title">Preview</h3>
                    </div>
                    <div class="box-body">

                    </div>
                    <div class="box-footer">
                        <i>Kemaskini Terakhir :</i>
                    </div>
                </div>

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Imej Pilihan</h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <?php if ($rekod_content['media']): ?>
                                <?php foreach ($rekod_content['media']['images'] as $media): ?>
                                    <div class="col-sm-3"><img src="<?= ROOT_URL; ?>buckets/<?= $media; ?>" class="img-thumbnail img-responsive" style="height: 150px;" /></div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>

                    </div>
                    <div class="box-header with-border">
                        <h3 class="box-title">Imej Database</h3>
                    </div>
                    <div class="box-body">
                        <div class='row'>
                            <?php foreach ($imej_database as $image): ?>
                                <div class='col-sm-3' style='height: 130px;'>
                                    <div class='row'>
                                        <div class='col-sm-3'><input type="checkbox" name='image_db' value="<?= $image['filename']; ?>" /></div>
                                        <div class='col-sm-9'><img class='img-responsive img-thumbnail'  src="<?= ROOT_URL; ?>buckets/<?= $image['filename']; ?>" /></div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <textarea name="media" class="hidden"><?= json_encode($rekod_content['media']); ?></textarea>
                    <div class="box-header">
                        <div class="pull-right">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i> Kemaskini</button>
                        </div>
                    </div>
                </div>


            </div>


        </div>
    </form>
</section>

<script>
    $(function () {
        var currentImages = <?= json_encode($rekod_content['media']); ?>;
        var images = currentImages.images;
        $(images).each(function (i, v) {
            $('[name=image_db][value="' + v + '"]').prop('checked', true);
        });

        $('#update_maklumat_paparan').submit(function (e) {
            e.preventDefault();
            var checkbox = $('[name=image_db]');
            var checked = [];
            $(checkbox).each(function (i, v) {
                if ($(v).is(':checked')) {
                    checked.push($(v).val())
                }
            });
            var media = {"images": checked}
            $('[name=media]').val(JSON.stringify(media));
            var input = $(this).serializeArray();
            console.log(input)
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