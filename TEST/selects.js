$(document).ready(function () {
	$('#country_id').change(function () {
		var country_id = $(this).val();
		if (country_id == '0') {
			$('#region_id').html('<option>- выберите город -</option>');
			$('#region_id').attr('disabled', true);
			return(false);
		}
		$('#region_id').attr('disabled', true);
		$('#region_id').html('<option>загрузка...</option>');
		
		var url = 'get_regions.php';
		
		$.get(
			url,
			"country_id=" + country_id,
			function (result) {
				if (result.type == 'error') {
					alert('error');
					return(false);
				}
				else {
					var options = '';
					$(result.regions).each(function() {
						options += '<option value="' + $(this).attr('id') + '">' + $(this).attr('title') + '</option>';
					});
					$('#region_id').html(options);
					$('#region_id').attr('disabled', false);
				}
			},
			"json"
		);
	});
});
