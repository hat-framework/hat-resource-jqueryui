<script type="text/javascript" src="<?php echo $this->base_url; ?>jquery-autocomplete/lib/jquery.bgiframe.min.js"></script>
<script type="text/javascript" src="<?php echo $this->base_url; ?>jquery-autocomplete/lib/jquery.ajaxQueue.js"></script>
<script type="text/javascript" src="<?php echo $this->base_url; ?>jquery-autocomplete/lib/thickbox-compressed.js"></script>
<script type="text/javascript" src="<?php echo $this->base_url; ?>jquery-autocomplete/jquery.autocomplete.js"></script>
<!--css -->
<link rel="stylesheet" type="text/css" href="<?php echo $this->base_url; ?>jquery-autocomplete/jquery.autocomplete.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo $this->base_url; ?>jquery-autocomplete/lib/thickbox.css"/>

 <script type="text/javascript">
 	$(document).ready(function(){
		$("#txtNome").autocomplete("<?php echo $this->base_url; ?>completar.php", {
			width:310,
			selectFirst: false
		});
	});
 </script>

<input type="text" name="txtNome" id="txtNome" size="60" class="input_forms"/>