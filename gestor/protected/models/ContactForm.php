<?php

/**
 * ContactForm class.
 * ContactForm is the data structure for keeping
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */
class ContactForm extends CFormModel
{
	public $name;
	public $email;
	public $subject;
	public $body;
	public $files;
	public $verifyCode;

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			// name, email, subject and body are required
			array('name, email, subject, body', 'required'),
			// email has to be a valid email address
			array('email', 'email'),
			// verifyCode needs to be entered correctly
			array('verifyCode', 'evaluarCaptcha'),
		);
	}

	/**
	 * Declares customized attribute labels.
	 * If not declared here, an attribute would have a label that is
	 * the same as its name with the first letter in upper case.
	 */

	public function attributeLabels()
	{
		return array(
			'verifyCode'=>'Código de verificación',
			'name'=>'Nombre y apellido',
			'email'=>'Email',
			'subject'=>'Asunto',
			'body'=>'Mensaje',
			'files'=>'Adjuntar archivos',
		);
	}

	/**
	 * Evalua si la respuesta del captcha es correcta
	 * @param nombre del atributo desde el modelo
	 * @return mensaje de error
	 */
	public function evaluarCaptcha($attribute)
	{
		$url = 'https://www.google.com/recaptcha/api/siteverify';
		$params = array(
		   'secret' => Yii::app()->params['grecaptcha']['secretkey'],
		   'response' => $_POST['g-recaptcha-response'],
		);
				
		$captcha_response = json_decode(CurlFunctions::postParams($url,$params));

		if($captcha_response->success!=1) {
			$this->addError($attribute,'No ha pasado la verificación, es usted un robot?');
		}
	}

}