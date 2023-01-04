<div class="form-group">

	<div class="btn-group" role="group">
		<input type="button" class="btn btn-success" onclick="startTask();" value="Start" />
		<input id="cache_warm_up_button_stop" type="button" disabled class="btn btn-danger" onclick="stopTask();" value="Stop" />
	</div>
</div>
<div class="form-group">

	<div class="progress">
		<div id="cache_warmup_progress_bar_success" class="progress-bar progress-bar-success active" role="progressbar"
			aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:0%">
			<span id="cache_warmup_progress_bar_success_value">0</span>
		</div>
		<!--
	<div id="cache_warmup_progress_bar_info" class="progress-bar progress-bar-info active" role="progressbar" aria-valuenow="0"
		aria-valuemin="0" aria-valuemax="100" style="width:0%">
		<span id="cache_warmup_progress_bar_info_value">0</span>
	</div>


	<div id="cache_warmup_progress_bar_warning" class="progress-bar progress-bar-warning active" role="progressbar"
		aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:0%">
		<span id="cache_warmup_progress_bar_warning_value">0</span>
	</div>
-->
		<div id="cache_warmup_progress_bar_danger" class="progress-bar progress-bar-danger active" role="progressbar"
			aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:0%">
			<span id="cache_warmup_progress_bar_danger_value">0</span>
		</div>
	</div>
</div>

<table style="overflow:auto" class="table">
	<thead>
		<tr>
			<th>URL</td>
			<th>Status</td>
			<th>Message</td>
		</tr>
	</thead>
	<tbody id="results">

	</tbody>
</table>
