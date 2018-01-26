<section class="content container-fluid">
    <div class="row">
        <div class="col-sm-9">
            <form id='media_upload' action="UploadFile" enctype="multipart/form-data">
                <div class='box'>
                    <div class='box-header with-border'>
                        <h3 class='box-title'><i class='fa fa-picture-o'></i> Muat Naik Imej</h3>
                    </div>
                    <div class='box-body' style='min-height: 300px;'>
                        <input type="file" id="upload_file" name="upload_file[]" onchange="preview_image();" multiple/>
                        <input type='hidden' name='method' value="media_upload" /> <i>* anda boleh memilih lebih dari satu gambar untuk dimuat naik.</i>
                        <br>
                        <div class='row'>
                        <div id="image_preview"></div>
                        </div>
                    </div>
                    <div class='box-footer'>
                        <button type="submit" name='submit_image' class="btn btn-primary " ><i class='fa fa-cloud-upload'></i> Muat Naik Imej</button>
                    </div>
                </div>
            </form>
        </div>
        <div class='col-sm-3'>
            <div class='box'>
                <div class='box-header with-border'>
                    <h3 class='box-title'><i class='fa fa-info'></i> Panduan</h3>
                </div>
                <div class='box-body'>
                    <div class='callout callout-warning'>
                        <h4>Size Imej</h4>
                        <p>Untuk mendapatkan hasil yang terbaik, sila dapatkan gambar atau imej yang berukuran 1020 x 690px</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
 <?php print_r($menu_active);?>
<script>
    $(function () {
        $('#media').addClass('active menu-open');
        $('#media-upload').addClass('active');
        
        $('#media_upload').submit(function (e) {
            e.preventDefault();
            var ajaxData = new FormData(this);
            $.ajax({
                url: 'UploadFiles',
                type: 'post',
                data: ajaxData,
                success: function (data) {
                    $('#image_preview').html('');
                    alert('images berjaya dimuat naik');

                },
                cache: false,
                contentType: false,
                processData: false
            });
        });
    });

    function preview_image() {
        $('#image_preview').html('');
        var total_file = document.getElementById("upload_file").files.length;
        for (var i = 0; i < total_file; i++){
            $('#image_preview').append("<div class='col-sm-3' style='height:180px; overflow:hidden'><img class='img-responsive' style='padding-bottom:10px;' src='" + URL.createObjectURL(event.target.files[i]) + "'></div>");
        }
    }
</script>