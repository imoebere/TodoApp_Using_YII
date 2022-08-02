<a href="/index.php?r=category">Back to categories</a>
<h2 class="page-header"><?=$category->name; ?></small>
</h2>

<?php if(!empty($category->job)) : ?>
	<p>Available Jobs under this category:</p>
<ul class="list-group">
	

	<?php foreach($category->job as $jobslist) : ?>
		<li class="list-group-item">
		<?php echo $jobslist->title; ?>
	</li>
	<?php  endforeach; ?>

</ul>
<?php else: ?>

<p>No jobs under this category</p>


<?php endif; ?>