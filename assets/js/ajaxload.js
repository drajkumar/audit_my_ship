$(document).ready(function(){
	$('#content').load('addash.php');
	
	
	//handle menue clicks
	$('ul#menu li a').click(function(){
		
		var page = $(this).attr('href');
		$('#content').load(page+'.php');
		return false;
	
	});	
	
});