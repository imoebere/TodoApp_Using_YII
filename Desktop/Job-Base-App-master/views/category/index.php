<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
?>
<h1 class="page-header">categories <a class="btn btn-primary pull-right" href="/index.php?r=category/create">Create</a></h1>

<?php if(null !== yii::$app->getSession()->setFlash('success')) : ?>
	<div class="alert alert-sucess"> <?= yii::$app->getSession()->setFlash('success') ?></div>
<?php endif; ?>


<ul class="list-group">
	
	<?php foreach($categories as $category) : ?>
		<li class="list-group-item"><a href="/index.php?r=category/jobspercategory&id=<?= $category->id ?>"><?php echo $category->name; ?></a></li>
	<?php  endforeach; ?>
</ul>
<?= LinkPager::widget(['pagination'=>$pagination]);?>