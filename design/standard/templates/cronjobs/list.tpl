{literal}
<script type="text/javascript">
	/**
	Call url to lauch the cronjob, and display the loader
	*/
	function launch(part) {
		//display the loader
	 	jQuery('#loader_'+part).fadeIn("slow"); 
		
		//delete the last result
		jQuery("#result_"+part).html('');
		
		//launch cron in ajax
		jQuery.ajax({
		  url: "{/literal}{'/cronjobs/launch'|ezurl('no')}{literal}",
		  type: "POST",
		  data: "part="+part,
		  timeout: 3600 * 1000,
		  context: document.body,
		  404: function() {
		      alert('Page not found');
		  },
		  error: function() { 
			  alert('Cronjob "'+part+'": error'); 
		  },
		  success: function() {
			  jQuery('#loader_'+part).fadeOut("slow");
			  jQuery("#result_"+part).append('Success');
		  }
		});
	}
</script>
{/literal}

<div class="cronjobs-list">
	<div class="left-column">
		<div class="context-block">
			<div class="box-header"><div class="box-tc"><div class="box-ml"><div class="box-mr"><div class="box-tl"><div class="box-tr">
			    <h1 class="context-title">{'Cronjobs list'|i18n( 'extension/nlcronjobs' )}</h1>
			    <div class="header-mainline"></div>
			</div></div></div></div></div></div>
		</div>
		
		
		<div class="context-block">
			<div class="box-header"><div class="box-tc"><div class="box-ml"><div class="box-mr"><div class="box-tl"><div class="box-tr">
				<h2 class="context-title">{'Active cronjobs'|i18n( 'extension/nlcronjobs' )}</h2>
				<div class="header-subline"></div>
			</div></div></div></div></div></div>
			
			<div class="box-ml"><div class="box-mr"><div class="box-content">
				{if $globalScripts|count|gt(0)}
					<h3><a href="#" onclick="launch('global');return false;">Global scripts</a></h3> <img src={"ajax-loader.gif"|ezimage} id="loader_global" width="32" height="32" />
					<div class="cronjob-result" id="result_global"></div>
					<div class="clear"></div>
					<ul>
					{foreach $globalScripts as $script}
						<li>{$script}</li>
					{/foreach}
					</ul>
				{/if}
				
				{foreach $scripts as $groupName => $groupScripts}
					<h3><a href="#" onclick="launch('{$groupName}');return false;">{$groupName}</a></h3>  <img src={"ajax-loader.gif"|ezimage} id="loader_{$groupName}" width="32" height="32" /> 
					<div class="cronjob-result" id="result_{$groupName}"></div>
					<div class="clear"></div>
					<ul>
					{foreach $groupScripts as $script}
						<li>{$script}</li>
					{/foreach}
					</ul>
				{/foreach}
			</div></div></div>
			
		</div>
	</div>
	<div class="right-column">
		<div id="results"></div>
		<iframe src={"/layout/set/blank/cronjobs/logs"|ezurl}></iframe>
		
	</div>
</div>
