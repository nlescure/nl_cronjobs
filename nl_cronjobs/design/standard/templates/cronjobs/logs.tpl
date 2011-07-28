{* scroll to bottom and reload page *}
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

<a name="top"></a>

{* menu *}
<a href="#end_output">Last output</a> - 
<a href="#end_error">Last errors</a> - 
<a href="#end_output" onclick="location.reload()">Reload</a>
<hr />
		
<div id="contents">
	<div class="output">Output: <br>
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
	
	<hr />
	<a href="#end_output">Last output</a> - 
	<a href="#top">Top</a> - 
	<a href="#end_output" onclick="location.reload()">Reload</a>
	
</div>
