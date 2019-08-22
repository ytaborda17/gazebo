<?php

class AppController extends Controller {

	public $layout='//layouts/column1';
	public $socialNetwork = array();

	public function beforeRender()
	{
		if (Yii::app()->user->isGuest) $this->redirect(array('cruge/ui/login'));
		$cs = Yii::app()->clientScript;

		return true;
	}

	/**
	 * Declares class-based actions.
	 */
	public function actions() {
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/app/pages'
			// They can be accessed via: index.php?r=app/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */


	public function actionIndex() {
		if (Yii::app()->user->isGuest) $this->redirect(array('cruge/ui/login'));

		# Contador de visitas del SITIO y el GESTOR
		$counterSite = Yii::app()->site_db->createCommand()
	   	->select('count(*) as contador')
	   	->from(Visitor::model()->tablename())
	   	->where('countryCode=:contry', array(':contry'=>'VE'))
	   	->queryRow();
	   $counterApp = Yii::app()->db->createCommand()
	   	->select('count(*) as contador')
	   	->from(CrugeSession::model()->tablename())
	   	->queryRow();



		# REDES SOCIALES
		$contactoTipo = ContactoTipo::model()->tablename();
		$redSocial = RedSocial::model()->tablename();
		$criteria = new CDbCriteria;
		$criteria->join .= " \n INNER JOIN ".$redSocial." `r` ON t.red_id = r.id";
		$criteria->join .= " \n INNER JOIN ".$contactoTipo." `c` ON t.tipo_id = c.id";
		$criteria->condition = " \n t.estatus=1 and c.id=5";
		$criteria->select = " concat(r.url, '', t.valor) as url, t.valor, r.class, r.nombre, t.valor as username"; // concat(r.url, '', t.valor) as url, // t.valor as url, 

		$sql = Contacto::model()->findAll($criteria);

		foreach ($sql as $i => $data) {
			$this->socialNetwork[strtolower($data['nombre'])] = array(
				'url' => $data['url'],
				'class' => $data['class'],
				'nombre' => $data['nombre'],
				'username' => $data['username'],
				);
		}
		
		# Contadores de INSTAGRAM
		if ($this->socialNetwork['instagram']['url']!="") {
			$this->socialNetwork['instagram']['count']['color'] = "#8a6f52";
			$this->socialNetwork['instagram']['label'] = "Seguidores";
			$this->socialNetwork['instagram']['count']['color'] = "#8a6f52";
			$this->socialNetwork['instagram']['main'] = $fb[0]->like_count;
		}
		
		# Contadores de FACEBOOK 
		if ($this->socialNetwork['facebook']['url']!="") {
			$url = $this->socialNetwork['facebook']['url'];// $url = 'https://www.facebook.com/'.Yii::app()->params['fb'];
			$fql  = "SELECT share_count, like_count, comment_count  FROM link_stat WHERE url = '$url'"; // Query in FQL
			$fqlURL = "https://api.facebook.com/method/fql.query?format=json&query=" . urlencode($fql);
			$response = @file_get_contents($fqlURL); // Facebook Response is in JSON
			$fb = json_decode($response);
			
			$this->socialNetwork['facebook']['label'] = "Me gusta";
			$this->socialNetwork['facebook']['main'] = $fb[0]->like_count;
			$this->socialNetwork['facebook']['count']['likes'] = $fb[0]->like_count;
			$this->socialNetwork['facebook']['count']['shares'] = $fb[0]->share_count;
			$this->socialNetwork['facebook']['count']['comments'] = $fb[0]->comment_count;
		} 
		

		# Contador de followers de TWITTER 
		if ($this->socialNetwork['twitter']['username']!="") {
			require_once(Yii::app()->params['fwPath'] . 'protected/extensions/TwitterAPIExchange.php');
			// Set access tokens here - see: https://dev.twitter.com/apps/
			$settings = array(
				'oauth_access_token' => Yii::app()->params['twitter']['oauth_access_token'],
				'oauth_access_token_secret' => Yii::app()->params['twitter']['oauth_access_token_secret'],
				'consumer_key' => Yii::app()->params['twitter']['consumer_key'],
				'consumer_secret' => Yii::app()->params['twitter']['consumer_secret'],
			);

			$twitter_api = new TwitterAPIExchange($settings);
			
			$tw = json_decode($twitter_api->setGetfield('?screen_name='.$this->socialNetwork['twitter']['username'])
				->buildOauth('https://api.twitter.com/1.1/statuses/user_timeline.json', 'GET')
				->performRequest(), true);
			
			
			$this->socialNetwork['twitter']['label'] = "Seguidores";
			$this->socialNetwork['twitter']['main'] = $tw[0]['user']['followers_count'];
			$this->socialNetwork['twitter']['count']['followers'] = $tw[0]['user']['followers_count'];
			$this->socialNetwork['twitter']['count']['favourites'] = $tw[0]['user']['favourites_count'];
			$this->socialNetwork['twitter']['count']['following'] = $tw[0]['user']['friends_count'];
			$this->socialNetwork['twitter']['count']['retweets'] = $tw[0]['user']['retweet_count'];
			// $this->socialNetwork['twitter']['count']['notifications'] = $tw[0]['user']['notifications'];
			// $this->socialNetwork['twitter']['count']['listed_count'] = $tw[0]['user']['listed_count'];
		} 

		$this->render('index', array(
			'counter'=>array(
				'Sitio'=>$counterSite['contador'], 
				'Gestor'=>$counterApp['contador'], 
				),
			'social' => $this->socialNetwork,
		));
	}

	public function actionTerms() {
		$this->renderPartial('terms',array(
			'terms'=>Yii::app()->user->um->getDefaultSystem()->get('terms'),
	   ));
	}

	public function actionEstadisticas() {
		if (Yii::app()->user->isGuest) $this->redirect(array('cruge/ui/login'));

		# Contador de visitas del SITIO y el GESTOR
		$counterSite = Yii::app()->site_db->createCommand()
	   	->select('count(*) as contador')
	   	->from(Visitor::model()->tablename())
	   	->where('countryCode=:contry', array(':contry'=>'VE'))
	   	->queryRow();
	   $counterApp = Yii::app()->db->createCommand()
	   	->select('count(*) as contador')
	   	->from(CrugeSession::model()->tablename())
	   	->queryRow();



		# REDES SOCIALES
		$contactoTipo = ContactoTipo::model()->tablename();
		$redSocial = RedSocial::model()->tablename();
		$criteria = new CDbCriteria;
		$criteria->join .= " \n INNER JOIN ".$redSocial." `r` ON t.red_id = r.id";
		$criteria->join .= " \n INNER JOIN ".$contactoTipo." `c` ON t.tipo_id = c.id";
		$criteria->condition = " \n t.estatus=1 and c.id=5";
		$criteria->select = " concat(r.url, '', t.valor) as url, t.valor, r.class, r.nombre, t.valor as username"; // concat(r.url, '', t.valor) as url, // t.valor as url, 

		$sql = Contacto::model()->findAll($criteria);

		foreach ($sql as $i => $data) {
			$this->socialNetwork[strtolower($data['nombre'])] = array(
				'url' => $data['url'],
				'class' => $data['class'],
				'nombre' => $data['nombre'],
				'username' => $data['username'],
				);
		}
		
		# Contadores de INSTAGRAM
		if ($this->socialNetwork['instagram']['url']!="") {
			// $result = file_get_contents("https://api.instagram.com/v1/users/376146016?access_token=f0d225aa955c4bd9ae563f87f831efab");
			// $obj = json_decode($result);
			// echo $obj->data[0]->id;
			
			// echo "<pre>";
			// 	print_r($obj);
			// echo "</pre>"; exit;
			$client_id = "bb532fe2ca0b462e849751a12c3e518c";
			$access_token = "1461090954.bb532fe.75b1306c4c934374b8c5c9007f144bd3";
			$redirect_uri = Yii::app()->baseUrl."app/estadisticas";
			// $response = file_get_contents("https://api.instagram.com/oauth/authorize/?client_id=".$client_id."&redirect_uri=".$redirect_uri."&response_type=code")
			// $response = file_get_contents("https://api.instagram.com/oauth/authorize/?client_id=bb532fe2ca0b462e849751a12c3e518c&redirect_uri=http://www.gazebo.com.ve/gestor/app/estadisticas&response_type=code")
			// $response = file_get_contents("https://api.instagram.com/v1/users/376146016/follows?access_token=1461090954.bb532fe.75b1306c4c934374b8c5c9007f144bd3");
			// echo "<pre>";
			// 	print_r(json_decode($response));
			// echo "</pre>"; exit;
			

			$this->socialNetwork['instagram']['label'] = "Seguidores";
			$this->socialNetwork['instagram']['color'] = "#8a6f52";
			$this->socialNetwork['instagram']['main'] = $fb[0]->like_count;
		}
		
		# Contadores de FACEBOOK 
		if ($this->socialNetwork['facebook']['url']!="") {
			$url = $this->socialNetwork['facebook']['url'];// $url = 'https://www.facebook.com/'.Yii::app()->params['fb'];
			$fql  = "SELECT share_count, like_count, comment_count  FROM link_stat WHERE url = '$url'"; // Query in FQL
			$fqlURL = "https://api.facebook.com/method/fql.query?format=json&query=" . urlencode($fql);
			$response = @file_get_contents($fqlURL); // Facebook Response is in JSON
			$fb = json_decode($response);
			
			$this->socialNetwork['facebook']['label'] = "Me gusta";
			$this->socialNetwork['facebook']['color'] = "#3b5998";
			$this->socialNetwork['facebook']['main'] = $fb[0]->like_count;
			$this->socialNetwork['facebook']['count'] = array(
				array('name'=>'Likes','y'=>$fb[0]->like_count),
				array('name'=>'Shares','y'=>$fb[0]->share_count),
				array('name'=>'Comments','y'=>$fb[0]->comment_count),
				);
		} 
		

		# Contador de followers de TWITTER 
		 
		if ($this->socialNetwork['twitter']['username']!="") {
			require_once(Yii::app()->params['fwPath'] . 'protected/extensions/TwitterAPIExchange.php');
			// Set access tokens here - see: https://dev.twitter.com/apps/
			$settings = array(
				'oauth_access_token' => Yii::app()->params['twitter']['oauth_access_token'],
				'oauth_access_token_secret' => Yii::app()->params['twitter']['oauth_access_token_secret'],
				'consumer_key' => Yii::app()->params['twitter']['consumer_key'],
				'consumer_secret' => Yii::app()->params['twitter']['consumer_secret'],
			);

			$twitter_api = new TwitterAPIExchange($settings);
			
			$tw = json_decode($twitter_api->setGetfield('?screen_name='.$this->socialNetwork['twitter']['username'])
				->buildOauth('https://api.twitter.com/1.1/statuses/user_timeline.json', 'GET')
				->performRequest(), true);
			
			
			$this->socialNetwork['twitter']['label'] = "Seguidores";
			$this->socialNetwork['twitter']['color'] = "#55acee";
			$this->socialNetwork['twitter']['main'] = $tw[0]['user']['followers_count'];
			$this->socialNetwork['twitter']['count'] = array(
				array('name'=>'Followers', 'y'=>$tw[0]['user']['followers_count']),
				array('name'=>'Favourites', 'y'=>$tw[0]['user']['favourites_count']),
				array('name'=>'Friends', 'y'=>$tw[0]['user']['friends_count']),
				array('name'=>'Retweets', 'y'=>$tw[0]['user']['retweet_count']),
				);
			// $this->socialNetwork['twitter']['count']['followers'] = $tw[0]['user']['followers_count'];
			// $this->socialNetwork['twitter']['count']['favourites'] = $tw[0]['user']['favourites_count'];
			// $this->socialNetwork['twitter']['count']['following'] = $tw[0]['user']['friends_count'];
			// $this->socialNetwork['twitter']['count']['retweets'] = $tw[0]['user']['retweet_count'];
			// $this->socialNetwork['twitter']['count']['notifications'] = $tw[0]['user']['notifications'];
			// $this->socialNetwork['twitter']['count']['listed_count'] = $tw[0]['user']['listed_count'];
		} 

		// echo "<pre>";
		// 	var_dump($fb);
		// 	print_r($tw);
		// 	print_r($this->socialNetwork);
		// echo "</pre>"; exit;


		$this->render('estadisticas', array(
			'counter'=>array(
				'Sitio'=>$counterSite['contador'], 
				'Gestor'=>$counterApp['contador'], 
				),
			'social' => $this->socialNetwork,
		));

	}

	/* NO BORRAR!!!
	 * La funcion Config se usa para crear la acción que permita el acceso por RBAC en la tabla menu
	 */
	public function actionConfig()
	{
		if (Yii::app()->user->isGuest) $this->redirect(array('cruge/ui/login'));

		$this->render('index');
	}

	
	/*public function actionAbout() {
		// renders the view file 'protected/views/app/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->layout='//layouts/column1';
		$this->render('about');
	}*/

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError() {

		if($error=Yii::app()->errorHandler->error) {

			// if (Yii::app()->user->isGuest) $this->layout = "//layout/login";

			$super_error = $error ;
			switch ($error['code']) {
				case '401':
            	$message = 'No tiene acceso a esta operacion.';
					break;
				case '404':
            	$message = 'La página solicitada no ha sido encontrada.';
					break;
				case '500':
            	$message = 'Se ha producido un error en el servidor contacte con el '.CHtml::link('administrador del sistema',array("/soporte")).'.';
					break;
				
				default:
            	$message = $error['message'];
					break;
			}


			Yii::app()->user->setFlash('error', $message);
			
			if(Yii::app()->request->isAjaxRequest) { 
				echo $error['message']; 
			} else { 
				$this->render('error', array('error'=>$error)); 
			}
		}

	}

	/**
	 * Muestra la pagina interna de contacto para hacer soporte.
	 */
	public function actionSoporte() {
		
		if (Yii::app()->user->isGuest) $this->redirect(array('cruge/ui/login'));

		Yii::app()->getClientScript()->registerCssFile(Yii::app()->theme->baseUrl.'/css/form.css'); 
		
		$model=new ContactForm;
		$model->name = ( Yii::app()->user->um->getFieldValue(Yii::app()->user->id,'nombre')=="" ? Yii::app()->user->name : Yii::app()->user->um->getFieldValue(Yii::app()->user->id,'nombre') );
		$model->email = Yii::app()->user->email;

		if(isset($_POST['ContactForm'])) {
			
			$_POST['ContactForm']['subject'] = Yii::app()->name." - Soporte";
			$model->attributes=$_POST['ContactForm'];
			
			if($model->validate()) {

				$path    = Yii::getPathOfAlias('assetsGestor')."/assets/mail/"; // the path with the file name where the file will be stored
				$uploadedFile = CUploadedFile::getInstancesByName('files');
				$files="";

				$empresa = Empresa::model()->findByPk(1);

				if(!empty($uploadedFile)) foreach ($uploadedFile as $i => $theFile) {
					$fileName=$theFile->name;
					$theFile->saveAs($path.$fileName);
					$files .= "|".$path.$fileName;
				}

				$model->files = explode("|",substr($files, 1));
				
				//use 'contact' view from views/mail
				$mail = new YiiMailer();
				$mail->setView('standard');
				$mail->setLayout('contacto');
				$mail->setData(array(
					'message' => $model->body, 
					'name' => $model->name, 
					'description' => Yii::app()->name.' - Soporte',
					'empresa' => array(
						'nombre'=>$empresa->nombre,
						'telefonos'=>$empresa->telefono,
						'email'=>$empresa->email,
						'direccion'=>$empresa->direccion,
						'url'=>$_SERVER['HTTP_HOST'],
						),
				));
				
				//set properties
				$mail->setFrom($model->email, $model->name);
				$mail->setSubject($model->subject);
				$mail->setTo(Yii::app()->params['adminEmail']);
				$mail->setAttachment($model->files);

				//send
				if ($mail->send()) {
					Yii::app()->user->setFlash('success','Gracias por contactarnos. Te responderemos tan pronto como sea posible.');
				} else {
					Yii::app()->user->setFlash('error','Error al tratar de enviar el mensaje: '.$mail->getError());
				}

				// if(file_exists($model->files)) unlink($model->files);
				$dir = array_diff( scandir($path), array('..', '.') );
				foreach ($dir as $i => $file) {
					if(file_exists($path.$file)) foreach(glob($path.$file) as $del) unlink($del);
				}

			} else Yii::app()->user->setFlash("error", "El email no pudo ser enviado :(");
			if ($model->hasErrors()) {
				$errores = '';
				foreach ($model->getErrors() as $e) {
				    $errores.=implode("<br>", $e)."<br>";
				}
				Yii::app()->user->setFlash("error", $errores);
			}	
		}
		$this->render('soporte',array('model'=>$model));
	}

}