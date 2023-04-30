function NextSong(){

	console.log("Hello");
    	$(document).ready(function() { 
       	$.ajax({
          	type: 'POST',
          	url: 'SongSwitcher9000.php',
          	data: { 'ID': '0' },
		success: function(data){ 
						
			location.reload();
		},
		error: function(xhr, status, error){
			console.log(error);
		}	
	});      
	});			
}
