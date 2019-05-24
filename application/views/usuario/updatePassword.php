<script>
		function compararClaves(){
			var clave=document.getElementById("claveNueva").value;
			var claveRepe=document.getElementById("claveNuevaRepe").value;
			if(clave==claveRepe){
				document.getElementById("errorClave").innerHTML="Las claves coinciden";
			}
			else{
				document.getElementById("errorClave").innerHTML="Las claves no coinciden";
			}
		}
</script>
<div class="modal-dialog">
	<div class="modal-content">
		<form action="<?=base_url()?>usuario/updatePasswordPost" method="POST">
			<div class="modal-header">						
				<h4 class="modal-title">Cambiar contraseña:</h4>
			</div>
			<div class="modal-body">					
				<div class="form-group">
				<label><span>*</span>Contraseña antigua:</label>
					<input type="password" class="form-control" name="claveAnt" required>

                    <label><span>*</span>Contraseña nueva:</label>
					<input type="password" class="form-control" name="claveNueva" id="claveNueva" onkeyup="compararClaves()" required>

                    <label><span>*</span>Vuelve a escribir la contraseña nueva:</label>
					<input type="password" class="form-control" name="claveNuevaRepe" id="claveNuevaRepe" onkeyup="compararClaves()" required>
					<div id="errorClave"></div>
					<input type="hidden" name="id" value="<?=$usuario->id ?>"/>
					</div>
			</div>
				<span style="margin-left: 15px;">*</span> Campos obligatiorios
			
<input type="submit" class="btn btn-info" value="Cambiar mi contraseña" onclick="">
	</form>
			</div>
			
</div>

	<!--Bootstrap-->