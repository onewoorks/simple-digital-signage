<html>
    <head>
        <title>Onewoorks Cloud Digital Signage</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css?family=Anton" rel="stylesheet">

        <style>
            body {
                font-family: 'Anton', sans-serif;
            }
            .container-fluid {
                padding-left:0;
                padding-right:0;
            }
            .box { padding:10px; }
            .rslides {
                position: relative;
                list-style: none;
                overflow: hidden;
                width: 100%;
                padding: 0;
                margin: 0;
            }

            .rslides li {
                -webkit-backface-visibility: hidden;
                position: absolute;
                display: none;
                width: 100%;
                left: 0;
                top: 0;
            }

            .rslides li:first-child {
                position: relative;
                display: block;
                float: left;
            }

            .rslides img {
                display: block;
                height: 690px;
                width: auto;
                border: 0;
                overflow: hidden;
            }
            .row-footer {
                border-top:1px solid #ccc;
                padding-top:10px;
                padding-bottom:10px;
            }
            .row-top-flex {
                height: 690px;
            }
        </style>
    </head>

    <?php
    $medias = json_decode($user_content['media'], true);
    ?>
    <body id='body' style='width: 1366px; width:768px; overflow: hidden;'>
        <div class='container-fluid' style="width: 1359px;" >
            <div class="row row-top-flex" >
                <div class="col-xs-9">
                    <center>
                        <ul class="rslides">
                            <?php foreach ($medias['images'] as $media): ?>
                                <li><img src="<?= ROOT_URL; ?>buckets/<?= $media; ?>" alt="" ></li>
                            <?php endforeach; ?>
                        </ul>
                    </center>
                </div>
                <div class="col-xs-3 text-center">
                    <?php
                    $menu = json_decode($user_content['menu_info'], true);
                    $harga_papar = json_decode($user_content['papar_harga'], true);
                    ?>
                    <img src='<?= ROOT_URL; ?>buckets/<?= $menu['logo']; ?>' class='img-responsive' style='padding-top:6px;' />
                    <br />
                    <h1>Harga Emas Hari Ini</h1>
                    <h4><?= date('j F Y'); ?></h4>
                    <div id='check'></div>

                    <h1>999</h1>
                    <h1>RM <?= $harga_papar['harga_jual']['999']; ?>/g</h1>

                    <br>
                    <h1>916</h1>
                    <h1>RM <?= $harga_papar['harga_jual']['916']; ?>/g</h1>

                    <div style="margin-top:20px"></div>
                    <i>Harga tidak termasuk GST</i>
                </div>
            </div>
            <div class="row row-footer">
                <div class="col-sm-12 text-center">
                    <?php
                    $socials = json_decode($user_content['social'], true);
                    ?>
                    <ul class='list-inline'>
                        <?php foreach ($socials as $social): ?>
                            <li ><i class='<?= $social['icon']; ?>'></i> <span style='font-size:24px; margin-left:10px; margin-right:20px;'><?= $social['label']; ?></span></li>
                            <?php endforeach; ?>
                    </ul>
                </div>

            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script src="<?= ROOT_URL; ?>assets/js/responsiveslide.js"></script>
        <script src='//cdn.jsdelivr.net/jquery.marquee/1.3.1/jquery.marquee.min.js'></script>
        <script>
            function start(counter) {
                    setTimeout(function () {
                        counter++;
                        checkPlayerCode();
                        start(counter);
                    }, 3000);
            }
            start(0);
            
            function checkPlayerCode(){
                $.ajax({
                    url:'userplayer',
                    data: {method:'CodePlayer',no_akses_id:'<?= $no_akses_id;?>',code_player:'<?= $current_player;?>'},
                    success: function(data){
                        if(data=='null'){
                          location.reload();
                        }
                    }
                })
            }
            $(function () {
                $(".rslides").responsiveSlides({
                    speed: 5,
                    timeout: 5000
                });
            });
        </script>
    </body>
</html>