<ul class="<?=$type?>">
	<?php foreach ($menu as $punkt) { ?>
	<li><a href="<?=$punkt['path']?>" <?=URL($punkt['path']) ? 'class="active"' : ''?>><?=cutString($punkt['title'])?></a></li>
	<?php } ?>
</ul>