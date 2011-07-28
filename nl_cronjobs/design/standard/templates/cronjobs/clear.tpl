<div class="cronjobs-list">
	<div class="context-block">
		<div class="box-header"><div class="box-tc"><div class="box-ml"><div class="box-mr"><div class="box-tl"><div class="box-tr">
		    <h1 class="context-title">{'Clear logs'|i18n('extension/nlcronjobs')}</h1>
		    <div class="header-mainline"></div>
		</div></div></div></div></div></div>
	</div>
	
	<div class="context-block">
	
		{if $outputs|count|gt(0)}
		<div class="message-feedback">
			<ul>
			{foreach $outputs as $output}
				<li>{$output}</li>
			{/foreach}
			</ul>
		</div>
		{/if}

		<div class="box-ml"><div class="box-mr"><div class="box-content">
			<form action={'/cronjobs/clear'|ezurl} method="post">
				<div>
					<input type="checkbox" value="1" name="log_output" id="log_output" /> 
					<label for="log_output">{'Clear output file'|i18n('extension/nlcronjobs')}</label>
				</div>
				<div> 
					<input type="checkbox" value="1" name="log_error" id="log_error" />
					<label for="log_error">{'Clear error file'|i18n('extension/nlcronjobs')}</label>
				<div>
				<input type="submit" value="{'Clear'|i18n('extension/nlcronjobs')}" class="button" />
			</form>
			<div class="clear"></div>
		</div></div></div>

	</div>
</div>