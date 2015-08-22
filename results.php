<?php

	include('includes/header.php');
	include('includes/navigation.php');
	include('functions/imdb_search.php');
	include('functions/rotten_api.php');

?>

<?php
	$search_term = $_POST['search']; 		//The main index page must be a search bar, which links to this page.
	$search_term_proper = ucwords($search_term); 
	include('functions/netflix_api.php');
?>
<article>

    <h3>Search Results for: <?php echo $search_term_proper; ?></h3>
    
<table>
      <tr>
          <th class="poster">Movie Poster</th>
          <th class="tomato">Tomatometer&reg;</th>
          <th class="tomato">Audience</th>
          <th class="title">Title</th>
          <th class="year">Year</th> 
          <th> IMDB ID</th>   
      </tr>
    
      <?php   for ($count = 0; $count < 10; $count++){ 
			$title = $result['catalog_titles']['catalog_title'][$count]['title']['regular'];
			$year = $result['catalog_titles']['catalog_title'][$count]['release_year'];
			$imdb_id = get_imdb_id($title,$year); 
			$rotten_critic_score = get_rotten_critic_score($imdb_id);  
			$rotten_audience_score = get_rotten_audience_score($imdb_id);
		?>
        
       <tr>
       		<td class="poster"><img src="<?php echo ($result['catalog_titles']['catalog_title'][$count]['box_art']['large']); ?>"></td>
			<?php if ($rotten_critic_score > 74) : ?>
            			<td class="tomato"><p><?php echo $rotten_critic_score; ?>%</p><br /><p><img src="images/certified.png"></p></td>
                <?php	elseif ($rotten_critic_score > 59) :?>
                        <td class="tomato"><p><?php echo $rotten_critic_score; ?>%</p><br /><p><img src="images/fresh.png"></p></td>    
                <?php	elseif ($rotten_critic_score > 0) :?>
                        <td class="tomato"><p><?php echo $rotten_critic_score; ?>%</p><br /><p><img src="images/rotten.png"></p></td>    
               	<?php	else :?>
                        <td class="tomato"><p>No<br />Score</p></td> 				
				<?php endif ?>

			<?php if ($rotten_audience_score > 59) : ?>
            			<td class="tomato"><p><?php echo $rotten_audience_score; ?>%</p><br /><p><img src="images/good_popcorn.png"></p></td>
				<?php	elseif ($rotten_critic_score > 0) :?>
                        <td class="tomato"><p><?php echo $rotten_audience_score; ?>%</p><br /><p><img src="images/bad_popcorn.png"></p></td>    
               	<?php	else :?>
                        <td class="tomato"><p>No<br />Score</p><br /></td> 				
				<?php endif ?>            
       	  	<td class="title"><?php echo ($result['catalog_titles']['catalog_title'][$count]['title']['regular']); ?></td> 
          	<td class="year"><?php echo ($result['catalog_titles']['catalog_title'][$count]['release_year']); ?></td>
		  	<td><?php if ($imdb_id == 'No IMDB ID'): ?>
						  No IMDB ID
					  <?php else :?>
						  <a href="http://www.imdb.com/title/tt<?php echo $imdb_id; ?>/"><?php echo $imdb_id; ?></a></td>
                      <?php endif; ?>
      </tr>
      <?php } ?>
    </table>

</article>

<?php

	include('includes/footer.php');

?>