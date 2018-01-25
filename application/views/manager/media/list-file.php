<section class="content-header">
    <h1>Media<small></small>
    </h1>

    <ol class="breadcrumb">
        <li><a href="<?= ROOT_URL; ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Media</li>
    </ol>
</section>


<section class="content container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="row">
                <?php foreach($media_files as $media):?>
                <div class="col-md-3">
                    <!-- Widget: user widget style 1 -->
                    <div class="box box-widget widget-user">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header bg-white" style="background: url('<?= $media['filename'];?>') center center no-repeat; background-size: 100%">
                        </div>
                        <div class="box-footer">
                        </div>
                    </div>
                    <!-- /.widget-user -->
                </div>
                <?php endforeach;?>
            </div>
        </div>
    </div>
</section>