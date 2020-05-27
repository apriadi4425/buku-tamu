<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Signature Pad demo</title>
	<meta name="description" content="Signature Pad - HTML5 canvas based smooth signature drawing using variable width spline interpolation.">

	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">

	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">

	<link rel="stylesheet" href="{{base_url('assets/plugins/ttd/css/signature-pad.css')}}">

</head>
<body onselectstart="return false">

<div id="signature-pad" class="signature-pad">
	<div class="signature-pad--body">
		<canvas></canvas>
	</div>
	<div class="signature-pad--footer">
		<div class="description">Sign above</div>

		<div class="signature-pad--actions">
			<div>
				<button type="button" class="button clear" data-action="clear">Bersihkan</button>
			</div>
			<div>
				<button type="button" class="button save" data-action="save-jpg2" style="width: 200px;"><strong>Simpan</strong></button>
			</div>
		</div>
	</div>
</div>
<script src="{{base_url('assets/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{base_url('assets/plugins/ttd/js/signature_pad.umd.js')}}"></script>
<script src="{{base_url('assets/plugins/ttd/js/app.js')}}"></script>

<script>
    var saveJPGButton2 = wrapper.querySelector("[data-action=save-jpg2]");
    saveJPGButton2.addEventListener("click", function (event) {
        var dataURL = signaturePad.toDataURL("image/jpeg");
        var img_data = dataURL.replace(/^data:image\/(png|jpeg);base64,/, "");

        if (signaturePad.isEmpty()) {
            alert("Harap Tanda Tangani.");
        } else {

            //ajax call to save image inside folder
            $.ajax({
                url: '{{base_url('ttd/proses')}}',
                data: { img_data:img_data },
                type: 'post',
                dataType: 'json',
                success: function (response) {
                    if(response.status == '1'){
                        location.reload();
					}
                    if(response.status == '2'){
                        signaturePad.clear();
                        alert('tidak ada proses');
					}

                }
            });
        }
    });
</script>

</body>
</html>
