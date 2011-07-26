{literal}
<script type="text/javascript">
	 if( !(typeof(jQuery) == 'undefined' || jQuery === null) ) {
		jQuery(document).ready(function() {
			var element = jQuery('#contents');
			jQuery('html, body').animate({scrollTop: element.height()}, 800);
			setTimeout( function() {
							location.reload()
						}, 20000
			);
		 });  
	}	 
</script>
{/literal}

<a href="#end_output">Last output</a> - 
<a href="#end_error">Last errors</a> - 
<a href="#" onclick="location.reload()">Reload</a>

<div id="contents">
	<a name="top"></a>
	<div class="output">Output: <br>
		<hr />
		{$output|nl2br}
		<a name="end_output"></a>
		<br/>
		<br/>
	</div>
	<hr />
	<hr />
	<div class="errors">Errors: <br>
		<hr />
		{$errors|nl2br}
		<a name="end_error"></a>
	</div>
	<a href="#top">Top</a>
</div>
