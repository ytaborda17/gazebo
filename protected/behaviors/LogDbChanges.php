<?php
class LogDbChanges extends CActiveRecordBehavior
{
	private $_oldattributes = array();

	public function afterSave($event)
	{
		date_default_timezone_set("America/Caracas");
		$ipAddress = Yii::app()->request->userHostAddress;
		// $user = Yii::app()->user->um->loadUserById(Yii::app()->user->id);
		$user = Yii::app()->db->createCommand("SELECT username as name from cruge_user where iduser='".Yii::app()->user->id."'")->queryRow();
		
		if (!$this->Owner->isNewRecord) {

			// new attributes
			$newattributes = $this->Owner->getAttributes();
			$oldattributes = $this->getOldAttributes();

			// compare old and new
			foreach ($newattributes as $name => $new_value) {
				if (!empty($oldattributes)) {
					$old = $oldattributes[$name];
				} else {
					$old = '';
				}

				if ($new_value != $old) {
					$changes = " \"".$old."\" a \"".$new_value."\". ";

					$log              =new Auditoria;
					$log->description = "Usuario ".$user["name"]." editó campo '".$name."' en registro ".get_class($this->Owner)."[".$this->Owner->getPrimaryKey()."] de ".$changes;
					$log->action      = 'EDITAR';
					$log->model       = get_class($this->Owner);
					$log->model_id    = $this->Owner->getPrimaryKey();
					$log->field       = $name;
					$log->time_stamp  = date("Y-m-d H:i:s",time());
					$log->user_id     = Yii::app()->user->id;
					$log->ipAddress   = $ipAddress;
					$log->save();
				}
			}
		} else {
			$log              =new Auditoria;
			$log->description = "Usuario ".$user["name"]." creó nuevo registro ".get_class($this->Owner)."[".$this->Owner->getPrimaryKey()."].";
			$log->action      = 'CREAR';
			$log->model       = get_class($this->Owner);
			$log->model_id    = $this->Owner->getPrimaryKey();
			$log->field       = '';
			$log->time_stamp  = date("Y-m-d H:i:s",time());
			$log->user_id     = Yii::app()->user->id;
			$log->ipAddress   = $ipAddress;
			$log->save();

		}
	}

	public function afterDelete($event)
	{
		date_default_timezone_set("America/Caracas");
		$ipAddress = Yii::app()->request->userHostAddress;
		$user      = Yii::app()->db->createCommand("SELECT username as name from cruge_user where iduser='".Yii::app()->user->id."'")->queryRow();

		$log              =new Auditoria;
		$log->description = "Usuario ".$user["name"]." borró registro ".get_class($this->Owner)."[" . $this->Owner->getPrimaryKey() ."].";
		$log->action      = 'BORRAR';
		$log->model       = get_class($this->Owner);
		$log->model_id    = $this->Owner->getPrimaryKey();
		$log->field       = '';
		$log->time_stamp  = date("Y-m-d H:i:s",time());
		$log->user_id     = Yii::app()->user->id;
		$log->ipAddress   = $ipAddress;
		$log->save();

	}

	public function afterFind($event)
	{
		  // Save old values
		$this->setOldAttributes($this->Owner->getAttributes());
	}

	public function getOldAttributes()
	{
		return $this->_oldattributes;
	}

	public function setOldAttributes($value)
	{
		$this->_oldattributes=$value;
	}
}