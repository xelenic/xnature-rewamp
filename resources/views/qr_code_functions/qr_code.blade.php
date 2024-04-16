<div id="qrcode"></div>
<!-- partial -->
<script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='//cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js'></script>
<script>

    document.addEventListener("DOMContentLoaded", function() {
        // Execute the function after 4 seconds
        setTimeout(function() {
            // Add or replace content after 4 seconds
            var qrcode = new QRCode("qrcode");
            function makeCode () {
                var elText = "{{$qr}}"

                qrcode.makeCode(elText);
            }

            makeCode();
        }, 1000); // 4 seconds in milliseconds
    });



</script>
