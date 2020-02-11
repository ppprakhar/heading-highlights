<?php 
	$args = explode(',', $args); 
	$colors = explode(',', $colors);	
	//var_dump($arr);
?>
<h1>
	<span id="website-types" style="width: 204px; height: 75px;">
		<?php if($pos == 'right') echo $content; ?>
		<?php for($i = 0, $j=0 ; $i< count($args); $i++, $j++) { 
			if( empty($colors[$j] ) ){
				$colors[$j] = 'inherit';
			}
			?>
			<span class="" style="color:<?php echo $colors[$j]; ?>;"><?php echo ucfirst( $args[$i] ); ?></span>
		<?php } ?>
		<?php if($pos == 'left') echo $content; ?>
	</span>
</h1>

<script type="text/javascript">
;( function( $, window, undefined ) {
	$(document).ready(function(){
		var len = $('#website-types span').length,
			i = 0;
		
		$('#website-types span:eq('+i+')').addClass('active');
		setInterval( function () {
			if( len === i) {i = 0;}			
			$('#website-types span:eq('+i+')').siblings().removeClass('active').end().addClass('active');
			i++;
		}, <?php echo $time; ?> );
		
	});

} )( jQuery, window );
</script>