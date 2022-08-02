<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
?>
<h1 class="page-header">Jobs <a class="btn btn-primary pull-right" href="/index.php?r=job/create">Create</a></h1>

<?php if(null !== yii::$app->getSession()->setFlash('success')) : ?>
	<div class="alert alert-sucess"> <?= yii::$app->getSession()->setFlash('success') ?></div>
<?php endif; ?>


<?php if(!empty($jobs)) : ?>
<ul class="list-group">
	<?php foreach($jobs as $job) : ?>
		<?php $phpdate = strtotime($job->create_date);?>
		<?php $formatted_date = date("F j, Y, g:i a", $phpdate); ?>
		<li class="list-group-item"><a href="/index.php?r=job/details&id=<?= $job->id; ?>"><?= $job->title; ?></a> -  <strong><?= $job->city; ?> <?= $job->state; ?></strong> - Listed on <?= $formatted_date; ?></li>
	<?php  endforeach; ?>
</ul>

<?php else: ?>

<p>No jobs list</p>


<?php endif; ?>
<?= LinkPager::widget(['pagination'=>$pagination]);?>