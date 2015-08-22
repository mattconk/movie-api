<?php

	include('includes/header.php');
	include('includes/navigation.php');
	include('functions/rotten_api.php');

?>

<article class="about">	

	<h3 >What is this Site About?</h3>
    
    <h4>API Mashup Project</h4>
    
		<p>The website uses APIs from Netflix&#8482;, Rotten Tomatoes&#8482;, and IMDB&#8482;; to search for movies and return results from the three movie services.  Users type in a search term and the website will return movies listed in the Netflix&#8482; Instant Queue, the IMDB&#8482;; movie ID number, and the Critic and Audience Scores from Rotten Tomatoes&#8482;.</p>
    
    <h4>But What is it Really Doing?</h4>
    
		<p>Here are the summarized steps of what happens when a user types in a search term and hit the submit button:</p>
    
        <ol>
            <li>Using OAuth and the Netflix&#8482; API a link is created which will return results of the search term from the Netflix&#8482; Instant Queue database.</li>
            <li>Using the results from the Netflix&#8482 API search we extract the Movie Title and Year and perform a search with the IMDB&#8482; API to get the IMDB&#8482; ID number.</li>
            <li>Using the IMDB&#8482; ID number we perform a search on Rotten Tomatoes&#8482 to get the Critic Score and the Audience Score.</li>
            <li>Once all of the information is retrived the first 10 Netflix&#8482; results are displayed with the relavent data from IMDB&#8482; and Rotten Toamtoes.&#8482;</li>
        </ol>
	<h4>Credits</h4>
    
    	<ul>
        	<li><a href="http://movies.Netflix.com/">Netflix&#8482</a> & <a href="http://developer.Netflix.com/">The Netflix&#8482 API</a></li>
            <li><a href="http://www.IMDB.com/">IMDB&#8482;</a> & <a href="http://www.IMDBapi.com/">The IMDB&#8482; API</a></li>
            <li><a href="http://www.rottentomatoes.com/">Rotten Tomatoes&#8482</a> & <a href="http://developer.rottentomatoes.com/">The Rotten Tomatoes&#8482 API</a></li>
            <li><a href="http://oauth.net/">OAuth</a></li>                    
        </ul>
</article>
	
<?php

	include('includes/footer.php');

?>