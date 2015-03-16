$(document).ready(function () {
	$('#country_id').change(function () {
		var country_id = $(this).val();
		
		if (country_id == '0') {
			$('#region_id').html('<option>-выберите область-</option>');
			$('#region_id').attr('disabled', true);
			$('#city_id').html('<option>-выберите орган-</option>');
			$('#city_id').attr('disabled', true);
			return(false);
		}
		$('#region_id').attr('disabled', true);
		$('#region_id').html('<option>загрузка...</option>');
		var url = 'server.php';
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
						options += '<option value="' + $(this).attr('ID_part') + '">' + $(this).attr('Body2') + '</option>';
					});

					$('#region_id').html('<option value="0">-выберите область-</option>'+options);
					$('#region_id').attr('disabled', false);
					$('#city_id').html('<option>-выберите орган-</option>');
					$('#city_id').attr('disabled', true);  			
				}
			},
			"json"
		);
	});

$('#region_id').change(function () {
		var region_id = $('#region_id :selected').val();
		if (region_id == '0') {
			$('#city_id').html('<option>-выберите орган-</option>');
			$('#city_id').attr('disabled', true);
			return(false);
		}
		$('#city_id').attr('disabled', true);
		$('#city_id').html('<option>загрузка...</option>');	
		var url = 'get_regions.php';		
		$.get(
			url,
			"region_id=" + region_id,
            
			function (result) {
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
					$('#city_id').attr('disabled', false);
				}
			},
			"json"
		);
	});	
	
	$('#city_id').change(function () {
		var city_id = $('#city_id :selected').val();
		
		var url = 'check.php';		
		$.get(
			url,
			"city_id=" + city_id,
            
			function (result) {
				if (result.type == 'error') {
					alert('error');
					return(false);
				}
				else {
					var options = ''; 
					$(result.regions).each(function() {
						options += '<input id="check1" type="checkbox" value="' + $(this).attr('ID_symp') + '">' + $(this).attr('Symptom') + '<Br>';
					});
					$('#check').html(options);
				}
			},
			"json"
		);
	});	

	$('#click').click(function () {
		var check1 = $('#check1').val();
			$.ajax({
				url: './symp.php',
				type: 'POST',
				dataType: 'text',
				data: ('check1='+check1),
				success:function(idsymp){
				    var options='';
					options = idsymp+'<input id="click2" type="submit" name="sav" value="X"/>';
					$('#symptoms').html(options);
				}
			});
		});
		
		
	$('#click3').click(function () {
		var req = $('#req').val();
		var city_id = $('#city_id :selected').val();
			$.ajax({
				url: './symp2.php',
				type: 'POST',
				dataType: 'text',
				data: ('req='+req+'&city_id='+city_id),
				success:function(data){
					$('#request').text(data);
				}
			});
		});
		
	
});

