<?php 
$this->widget('application.modules.eyedraw.OEEyeDrawWidget', array(
		'idSuffix' => $side.'_'.$element->elementType->id.'_'.$element->id,
		'side' => ($side == 'right') ? 'R' : 'L',
		'mode' => 'view',
		'width' => 100,
		'height' => 100,
		'model' => $element,
		'attribute' => $side.'_axis_eyedraw',
			
));
?>
<div class="eyedrawFields view">
	<div>
		<div class="data">
			<?php echo $element->getCombined($side)?>
		</div>
	</div>
</div>
