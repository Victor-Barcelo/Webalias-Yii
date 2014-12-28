<?php 
use yii\helpers\Html; 
?>


<ul>
	<?php foreach ($links as $link): ?>
	<li>
		<?= Html::encode("{$link->tag} ({$link->code})") ?>:
		<?= $link->url ?>
	</li>
<?php endforeach; ?>
</ul>