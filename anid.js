$(document).ready(function() {
	$('#analys').change(function () {
		var analys = $('#analys :selected').val();
		var url = 'an.php';		
		alert(analys);
		$.get(
			url,
			"analys=" + analys,
            
			function (result) {alert('trololo');
				if (result.type == 'error') {
					alert('error');
					return(false);
				}
				else {
					var options = ''; 
					var options1='';
					$(result.regions).each(function() {
	                  options += '<tr><td align=center>' + $(this).attr('Parameter') + '</td></tr>';
					  options1 +='<td align=center><input type=text name=znach required style="width:60px;"/></td></tr>'
					});
					$('#an').html(options);
					$('#an1').html(options1);
				}
			},
			"json"
		);
	});	
	
	
	
});