<?php
//Functions for Critic Score

	function rotten_critic_error($imdb_id){ //Determines if the movie is listed at Rotten Tomatoes
		if ($imdb_id == 'No IMDB ID'){
				$critic_score = "No Score";  //If there is 'No IMDB ID' then it returns 'No Score'
				return $critic_score;}
			else {
				$rotten_request = file_get_contents("http://api.rottentomatoes.com/api/public/v1.0/movie_alias.json?type=imdb&id=$imdb_id&apikey=4t3ajm7r47fx7rc977r3vtmd&_prettyprint=true");
				$rotten_data = json_decode($rotten_request, true);
				if (isset($rotten_data["error"])){
					$error = 'No Score';
				}else {
					$error = 0;
				}
				return $error;
	}
	}
	
	function rotten_critic_scores($imdb_id){ //returns the Rotten Tomatoes Critic Score
		if ($imdb_id == 'No IMDB ID'){
				$critic_score = "No Score";  //If there is 'No IMDB ID' then it returns 'No Score'
				return $critic_score;}
			else {	
				$rotten_request = file_get_contents("http://api.rottentomatoes.com/api/public/v1.0/movie_alias.json?type=imdb&id=$imdb_id&apikey=4t3ajm7r47fx7rc977r3vtmd&_prettyprint=true");
				$rotten_data = json_decode($rotten_request, true);
				if (isset($rotten_data["ratings"]["critics_score"])){
						$critic_score = $rotten_data["ratings"]["critics_score"];
				} else {
						$critic_score = 0;
				}			
				return $critic_score;}
	}
	
	function get_rotten_critic_score($imdb_id){ // Returns the Critics Score
		$error = rotten_critic_error($imdb_id);
		$critic_score = rotten_critic_scores($imdb_id);
		if ($critic_score > 0 ){
				$results = $critic_score;
			} else {
				$results = $error;
			}
		return $results;	
	}

//Functions for Audience Scores

	function rotten_audience_error($imdb_id){ //Determines if the movie is listed at Rotten Tomatoes
		if ($imdb_id == 'No IMDB ID'){
				$audience_score = "No Score";  //If there is 'No IMDB ID' then it returns 'No Score'
				return $audience_score;}
			else {
				$rotten_request = file_get_contents("http://api.rottentomatoes.com/api/public/v1.0/movie_alias.json?type=imdb&id=$imdb_id&apikey=4t3ajm7r47fx7rc977r3vtmd&_prettyprint=true");
				$rotten_data = json_decode($rotten_request, true);
				if (isset($rotten_data["error"])){
					$error = 'No Score';
				}else {
					$error = 0;
				}
				return $error;
	}
	}
	
	function rotten_audience_scores($imdb_id){ //returns the Rotten Tomatoes Critic Score
		if ($imdb_id == 'No IMDB ID'){
				$audience_score = "No Score";  //If there is 'No IMDB ID' then it returns 'No Score'
				return $audience_score;}
			else {	
				$rotten_request = file_get_contents("http://api.rottentomatoes.com/api/public/v1.0/movie_alias.json?type=imdb&id=$imdb_id&apikey=4t3ajm7r47fx7rc977r3vtmd&_prettyprint=true");
				$rotten_data = json_decode($rotten_request, true);
				if (isset($rotten_data["ratings"]["audience_score"])){
						$audience_score = $rotten_data["ratings"]["audience_score"];
				} else {
						$audience_score = 0;
				}			
				return $audience_score;}
		}

	function get_rotten_audience_score($imdb_id){ // Returns the Critics Score
		$error = rotten_audience_error($imdb_id);
		$audience_score = rotten_audience_scores($imdb_id);
		if ($audience_score > 0 ){
				$results = $audience_score;
			} else {
				$results = $error;
			}
		return $results;	
	}
?>