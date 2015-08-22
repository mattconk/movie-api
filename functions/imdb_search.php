

<?php
function get_imdb_id($title,$year){
	$title = str_replace(" ","%",$title);
	$imdb_request = file_get_contents("http://www.imdbapi.com/?t=$title&y=$year");
	$imdb_data = json_decode($imdb_request, true);
	if ($imdb_data["Response"]=='False')
			$imdb_id = 'No IMDB ID';
		else
			$imdb_id = substr($imdb_data["imdbID"], 2);
	return $imdb_id;
}
	
?>





