<section class="content container-fluid">
    <div class="row">
        <div class="col-sm-12">

            <div id="wrapper" class="hidden">
                <input type="file" multiple>
                <input type='hidden' name='method' value="media_upload" />
                <div id="drop-area">
                    <h3 class="drop-text">Drag and Drop Images Here</h3>
                </div>
            </div>


            <div id="wrapper">
                <form id='media_upload' action="UploadFile" enctype="multipart/form-data">
                    <input type="file" id="upload_file" name="upload_file[]" onchange="preview_image();" multiple/>
                    <input type='hidden' name='method' value="media_upload" />
                    <br>
                    <div id="image_preview"></div>
                    <br>
                    <input type="submit" name='submit_image' class="btn btn-primary " value="upload image" />
                </form>
                
            </div>
        </div>
    </div>
</section>
<script>
    $(function () {
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
        var total_file = document.getElementById("upload_file").files.length;
        for (var i = 0; i < total_file; i++)
        {
            $('#image_preview').append("<img style='height:180px' src='" + URL.createObjectURL(event.target.files[i]) + "'><br>");
        }
    }
</script>