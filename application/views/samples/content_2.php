<html>
    <head>
        <style>
            html { width:1280px; height:720px;}
            body { margin:0; padding:0};
            .panel-header { height:160px;}
            .panel-a { float:left; width:960;};
            .panel-b { float:left; border-left:1px solid #000; width:320px; padding:30px;};
            .clearfix { clear:both;}
            .logo { float:left; width: 200px; height:120px; border:5px solid #000} ;
            .title {text-align:center;};
            .clock { float:left; width: 200px; height:120px; border:2px solid #000};
        </style>
        <body onload="startTime()">
            <table style='width:100%; height:120px;'>
                <tr>
                    <td style='width:200px; text-align:center'>
                        <img src='diamond.png' style='width:100px; height:100px' />
                    </td>
                    <td style='text-align:center; font-size:2.6em; font-weight:bold'>KEDAI EMAS ARIFFIN</td>
                    <td style='width:200px; text-align:center'>
                        <div id="txt" style='font-size:2em; font-weight:bold'></div>
                        <?= date('j F Y');?>
                    </td>
                </tr>
            </table>
            <div class='panel'>
                <div class='panel-a'>
                    <video width='960' autoplay loop>
                        <source src="handmade.mp4" type="video/mp4">
                    </video>
                </div>
                <div class='panel-b'>
                    <table style='width:320px; height:500px; text-align:center;'>
                        <tr>
                            <td style='font-size:2em; font-weight:bold'>Harga Emas Semasa</td>
                        </tr>
                        <tr>
                            <td>
                                <strong style='font-size:2em'>999</strong>
                                <div style='font-size:2.8em;'><b>RM 190</b></div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong style='font-size:2em'>916</strong>
                                <div style='font-size:2.8em'><b><span style='font-size:20px'>RM</span> 180</b></div>
                            </td>
                        </tr>
                    </table>
                </div>    
                <div class='clearfix'></div>
            </div>
            <script>
                function startTime() {
                    var today = new Date();
                    var h = today.getHours();
                    var m = today.getMinutes();
                    m = checkTime(m);
                    document.getElementById('txt').innerHTML = h + ":" + m;
                    var t = setTimeout(startTime, 60000);
                }
                function checkTime(i) {
                    if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
                    return i;
                }
            </script>
        </body>
    </head>
</html>

<?php
//export DISPLAY=:0.0 
//xdotool key --window "$(xdotool search --onlyvisible --class chromium | head -n 1)" F5
?>