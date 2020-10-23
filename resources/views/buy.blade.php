<!DOCTYPE html>
<html>
<head>
	<title>Kontak Kami</title>

	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	 <meta name="viewport" content="width=device-width">
</head>
<body>
	<br>

	<div class="col-lg-6" style="margin: 0 auto;float: none;">
		<div class="card">
			<div class="card-body">
				

				<center><h4>Aplikasi Whatsapp Gateway (UNOFFICIAL)</h4></center>

					


				<center>
					
					Halo, Saya Tertarik dengan Aplikasi Whatsapp Gatewaynya.
				</center>
				<br>
				<br>
				<center>
					
				<div id="contact">
					
				</div>
				</center>
			</div>
		</div>
	</div>
<!-- 
		
	<div id="product_name">Kacamata</div>
	<div id="product_group">Fashion</div>
	<div id="product_id">10</div> -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script language="JavaScript">


		var phone = ['62895361034833','6281230339271','6281327010080','628982382323'];
		var i = parseInt(Math.random() * 3)

		var desc ="Halo, Saya Tertarik dengan Aplikasi Whatsapp Gatewaynya Minta Info Dong";
		var button = ('<a class="btn btn-success" id="addToCartButton" href="https://api.whatsapp.com/send?phone='+phone[i]+'&text='+desc+'" class="action_button randombutton" onclick="window.confirmOptIn()"> Minta Info Dong</a>');
		// document.write(button);
		$("#contact").html(button);

	
	</script>

</body>
</html>