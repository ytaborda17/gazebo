<?php
class CustomButtonColumnCheck extends CButtonColumn
{
	protected function renderButton($id, $button, $row, $data)
	{
		if(isset($button['options']['data-status'])) {
			$button['options']['class'] = $this->evaluateExpression("($data->estatus == 1 ? 'iconCore16 iconCheck' : 'iconCore16 iconCheckOff')", array('data' => $data, 'row' => $row));
			$button['options']['title'] = $this->evaluateExpression("($data->estatus == 1 ? 'Desactivar' : 'Activar')", array('data' => $data, 'row' => $row));
		}
		parent::renderButton($id, $button, $row, $data);
	}
}
