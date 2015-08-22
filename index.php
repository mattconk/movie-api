<?php

	include('includes/header.php');
	include('includes/navigation.php');
	include('functions/rotten_api.php');

?>

<article>	

	<p>Type in the name of a movie to perform a Search on Netflix, IMDB, and Rotten Tomatoes.</p>
    
    <form action="results.php" method="post">
    
    <input class="box" name="search" type="text" placeholder="Search for Movies"> 
    <input class="submit" name="submit" type="submit" value="Submit">  
    
    </form>

</article>
	
<?php

	include('includes/footer.php');

?>