function NextSong(){

    	$(document).ready(function() { 
       	$.ajax({
          	type: 'POST',
          	url: 'SongSwitcher9000.php',
          	data: { 'NextFlag': 'Y' },
		success: function(data){ 
				
			location.reload();
			console.log(data);
		},
		error: function(xhr, status, error){
			console.log(error);
		}
		
	});      
	});			
}
