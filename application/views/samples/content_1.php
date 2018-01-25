<html>
    <head>
        <title>Onewoorks Cloud Digital Signage</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    
    <style>
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
          height: 620px;

          width: auto;
          border: 0;
          }
    </style>
    </head>
    <body style='width:98.8%'>
        <div class='container-fluid'>
            <div class="row">
            <div class="col-xs-9" style='margin-right:0; margin-left:0;'>
                <center>
                <ul class="rslides">
                      <li><img src="images/pic1.jpg" alt="" ></li>
                      <li><img src="images/pic2.jpg" alt="" ></li>
                      <li><img src="images/pic3.jpg" alt="" ></li>
                    </ul>
                </center>
            </div>
            <div class="col-xs-3 text-center" style='padding-left:0'>
                <div style='width:100%; background-color:black; margin-top:10px;'>
                    <center>
                    <img src='images/logo.jpg' class='img-responsive' />
                    </center>
                </div>
                <br />
                <h2>Harga Emas Hari Ini</h2>
                <h4><?= date('j F Y');?></h4>
                <br>
                
                
                        <table class='table table-bordered'>
                            <thead>
                                <tr>
                                    <th colspan='2'>Harga Jual</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>999</th>
                                    <td>RM 200/g</td>
                                </tr>
                                <tr>
                                    <th>916</th>
                                    <td>RM 190/g</td>
                                </tr>
                            </tbody>
                        </table>
                        
                        <table class='table table-bordered'>
                            <thead>
                                <tr>
                                    <th colspan='2'>Harga Beli</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>999</th>
                                    <td>RM 160/g</td>
                                </tr>
                                <tr>
                                    <th>916</th>
                                    <td>RM 150/g</td>
                                </tr>
                            </tbody>
                        </table>
                
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class='marquee'><h2><i>Pelbagai faedah menarik menanti anda, daftarlah keahlian anda di kedai kami.</i></h2></div>
                </div>
            </div>
        </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script src="responsiveslide.js"></script>
        <script src='//cdn.jsdelivr.net/jquery.marquee/1.3.1/jquery.marquee.min.js'></script>
        <script>
  $(function() {
    $(".rslides").responsiveSlides({
        speed: 5,
        timeout: 5000
    });
    $('.marquee').marquee({
    duration: 20000,
    gap: 550,
    delayBeforeStart: 0,
    direction: 'left',
    duplicated: true
});
  });
</script>
    </body>
</html>