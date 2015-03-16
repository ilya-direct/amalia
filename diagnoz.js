$(document).ready(function() {
	$('#edit').click(function() {
		var diag = $('#diag').val();
		var date = $('#date').val();
		var url = 'diagnoz.php';	
		alert(diag);
			$.get(
				url,
				'diag' + diag + '&date=' + date,
				function (result) {alert('trololololo');
					if (result.type == 'error') {
						alert('error');
						return(false);
					}
					else {
						var options = ''; 
						$(result.regions).each(function() {
							options += '<option value="' + $(this).attr('ID_part2') + '">' + $(this).attr('Body3') + '</option>';
						});
					$('#city_id').html('<option>-выберите орган-</option>'+options);
				}
			},
			"json"
		);
	});	
});