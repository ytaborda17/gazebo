<html>
<head>
	<meta content="text/html; charset=UTF-8" http-equiv="content-type">
</head>
<body>
	<table cellspacing="0" cellpadding="10" style="color:#666;font:13px sans-serif;line-height:1.4em;width:100%;">
		<tbody>
			<tr>
				<td style="color:#AA7E33;font-size:22px;border-bottom: 2px solid #AA7E33;">
					<?php echo CHtml::encode(Yii::app()->name); ?>
				</td>
			</tr>
			<tr>
				<td style="color:#777;font-size:16px;padding-top:5px;">
					<?php if(isset($data['description'])) echo $data['description'];  ?>
				</td>
			</tr>
			<tr>
				<td>
					<?php echo $content ?>
				</td>
			</tr>
			<tr>
				<td style="padding:10px 6px; text-align:left; border-top:1px dotted #d4d4d4; line-height:15px; font-size:10px;">
					<a href="<?php echo Yii::app()->baseUrl ?>" target="_blank" title="Sitio"></a><br>
					<a href="<?php echo Yii::app()->baseUrl.'/gestor' ?>" target="_blank" title="<?php CHtml::encode(Yii::app()->name)?>"></a>
				</td>
			</tr>
		</tbody>
	</table>
</body>
</html>