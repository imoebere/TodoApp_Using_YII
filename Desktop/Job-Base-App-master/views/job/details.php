<a href="/index.php?r=job">Back to jobs</a>
<h2 class="page-header"><?=$job->title; ?><small> in <?=$job->city; ?> <?=$job->state; ?></small>

<?php if(Yii::$app->user->identity->id == $job->user_id) : ?>
<span class="pull-right">
	<a class="btn btn-default" href="index.php?r=job/edit&id=<?= $job->id ?>">Edit</a>
	<a class="btn btn-danger" href="index.php?r=job/delete&id=<?= $job->id ?>">delete</a>
</span>
<?php endif; ?>

</h2>
<?php if(!empty($job->description)) :?>
<div class="well">
	<h4>Job description</h4>
	<?= $job->description; ?>
</div>
<?php endif; ?>

<ul class="list-group">
	<?php if(!empty($job->create_date)) : ?>
	<?php $phpdate = strtotime($job->create_date);?>
	<?php $formatted_date = date("F j, Y, g:i a", $phpdate); ?>

	<li class="list-group-item"><strong>Listing Date: </strong><?=$job->create_date; ?></li>
	<?php endif; ?>


	<?php if(!empty($job->category->name)) : ?>
	<li class="list-group-item"><strong>Category: </strong><?=$job->category->name; ?></li>
	<?php endif; ?>

	<?php if(!empty($job->type)) : ?>
	<li class="list-group-item"><strong>Job type: </strong><?=$job->type; ?></li>
	<?php endif; ?>

	<?php if(!empty($job->salary_range)) : ?>
	<li class="list-group-item"><strong>Salary Range: </strong><?=$job->salary_range; ?></li>
	<?php endif; ?>

	<?php if(!empty($job->contact_email)) : ?>
	<li class="list-group-item"><strong>Contact email: </strong><?=$job->contact_email; ?></li>
	<?php endif; ?>

	<?php if(!empty($job->contact_phone)) : ?>
	<li class="list-group-item"><strong>Contact Phone: </strong><?=$job->contact_phone; ?></li>
	<?php endif; ?>
</ul>
<a class="btn btn-primary" href="mailto:<?= $job->contact_email; ?>Subject=Job%20Application">Contact Employer</a>