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
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Senarai Kategori</h3>
                </div>
                <div class="box-body">
                    <table class="table table-bordered table-condensed">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Kategori</th>
                                <th>Jumlah Media</th>
                                <th>Tindakan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Produk</td>
                                <td>3</td>
                                <td class="text-center"><div class="btn btn-default"><i class="fa fa-edit"></i></div></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            
        </div>
    </div>
</section>

<script>
$(function(){
    $('#media').addClass('active menu-open');
    $('#media-kategori').addClass('active');        
});
</script>