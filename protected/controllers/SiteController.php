<?php

class SiteController extends Controller
{
	public $pageTitle = "";
	public $metaKeywords = "";
	public $metaDescription = "";
	public $empresa = array();
	public $socialNetwork = array();

	/**
	 * Este metodo se ejecuta justo antes de cargar la accion solicitada, util para precargar variables.
	 * @return $this->empresa con los datos de la empresa
	 * @return Yii::app()->session['menuItems'] => Menu del sitio
	 * @return Yii::app()->session['flinks'] => Links del footer
	 */
	public function beforeAction($action) {
		# EMPRESA
		$this->empresa = Empresa::model()->findByPk(1);


		# MENU
		$activeItem = Yii::app()->request->getParam('page') != "" ? '/'.Yii::app()->request->getParam('page') : $this->route;

		$menuList = Menu::model()->findAll('parent=0');

		$items=array();
		foreach ($menuList as $i => $menu) {
			$model = Menu::model()->findByPk($menu->id);
			array_push($items, $model->getListed($activeItem));
		}
		
		// Yii::app()->session['menuItems'] = $items;
		$this->menu = $items;
		
		$flinks = "";
		foreach ($items as $i => $link) if($link['visible']) {
			$flinks .= ' | '.CHtml::link($link['label'],array($link['url'][0]));
		}
		Yii::app()->session['flinks'] = substr($flinks, 3).' | '.CHtml::link('Mapa del sitio',array('site/map'));
		
		
		# REDES SOCIALES
		$contactoTipo = ContactoTipo::model()->tablename();
		$redSocial = RedSocial::model()->tablename();
		$c1=new CDbCriteria;
		$c1->select="t.valor as url, concat(r.url, '', t.valor) as url, t.valor, r.class, r.nombre"; // concat(r.url, '', t.valor) as url, // t.valor as url, 
		$c1->join .= " \n INNER JOIN ".$redSocial." `r` ON t.red_id = r.id";
		$c1->condition = " \n t.estatus=1 ";

		$sql = Contacto::model()->findAll($c1);

		foreach ($sql as $i => $data) {
			$this->socialNetwork[strtolower($data['nombre'])] = array(
				'url' => $data['url'],
				'class' => $data['class'],
				'nombre' => $data['nombre'],
				'valor' => $data['valor'],
				);
		}

		return true;
	}

	/**
	 * Acciones ejecutadas justa antes de renderizar la pagina
	 */
	public function beforeRender()
	{

		$curUrl = $_SERVER['HTTP_HOST']."/".Yii::app()->getController()->getAction()->controller->action->id."/";
		$cs = Yii::app()->clientScript;
		
		if ($this->metaKeywords==null) $this->metaKeywords = $this->empresa->keywords;
		if ($this->metaDescription==null) $this->metaDescription = $this->empresa->description.' - '.$this->empresa->nombre;
		if ($this->pageTitle==null) $this->pageTitle = $this->empresa->description.' - '.$this->empresa->nombre;

		Yii::app()->getClientScript()->registerCssFile(Yii::app()->theme->baseUrl.'/css/main.css'); 
		Yii::app()->getClientScript()->registerCoreScript('jquery');

		$cs->registerMetaTag('es', 'language', null, array(), 'lng');
		$cs->registerMetaTag($this->pageTitle, "title", null, array(), 'ttl');
		$cs->registerMetaTag(strtolower($this->metaKeywords), 'keywords', null, array(), 'kw');
		$cs->registerMetaTag($this->metaDescription, 'description', null, array(), 'dsc');

		$cs->registerMetaTag("sumary", null, null, array('property'=>'og:card'), 'ogc');
		$cs->registerMetaTag($this->empresa->nombre, null, null, array('property'=>'og:title'), 'ogt');
		$cs->registerMetaTag("company", null, null, array('property'=>'og:type'), 'oga');
		$cs->registerMetaTag($curUrl, null, null, array('property'=>'og:url'), 'ogu');
		$cs->registerMetaTag($_SERVER['HTTP_HOST']."/assets/social/cover.jpg", null, null, array('property'=>'og:image'), 'ogi');
		$cs->registerMetaTag($this->metaDescription, null, null, array('property'=>'og:description'), 'ogd');
		// $cs->registerMetaTag("image/jpeg", null, null, array('property'=>'og:image:type'), 'ogi');
		$cs->registerMetaTag($this->empresa->nombre, null, null, array('property'=>'og:site_name'), 'ogs');
		$cs->registerMetaTag(preg_replace('/(.*\/)/', '', $this->socialNetwork['facebook']['valor']), null, null, array('property'=>'fb:admins'), 'ogs');
		
		$cs->registerMetaTag("sumary", "twitter:card", null, array(), 'twc');
		$cs->registerMetaTag("@".$this->socialNetwork['twitter']['valor'], "twitter:site", null, array(), 'tws');
		$cs->registerMetaTag($this->empresa->nombre, "twitter:title", null, array(), 'twt');
		$cs->registerMetaTag($this->metaDescription, "twitter:description", null, array(), 'twd');
		$cs->registerMetaTag($_SERVER['HTTP_HOST']."/assets/social/cover.jpg", "twitter:image", null, array(), 'twi');

		return true;
	}

	public function actions()
	{
		return array();
	}

	/**
	 * Inicio/Index/Home
	 */
	public function actionIndex()
	{
		// Yii::app()->getClientScript()->registerCssFile(Yii::app()->theme->baseUrl.'/css/index.css'); 
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'

		$this->pageTitle = $this->metaDescription;

		$this->render('index');
	}


	/**
	 * Empresa
	 */
	public function actionEmpresa()
	{
		$this->pageTitle = 'Empresa - '.$this->empresa->nombre;
		$this->metaKeywords = 'empresa';
		$this->metaDescription = 'El diseño base de nuestra filosofía.';

		$filosofias = Filosofia::model()->findAll(array("condition"=>"estatus = 1"));	

		$this->render('empresa',array('filosofias'=>$filosofias, ));
	}


	/**
	 * Servicios
	 */
	public function actionServicios()
	{

		$model = Servicio::model()->findAll(array("condition"=>"estatus = 1"));	
		$serKeywords = "";

		$servicios = array();
		$path = Yii::getPathOfAlias('assets').'/servicios/'; // ruta en la cual serán almacenados los archivos

		$dir = array_diff( scandir(Yii::getPathOfAlias('assets').'/servicios/'), array('..', '.') );
		foreach ($model as $mod) {
			$serKeywords .= ','.str_replace(",", " ", strtolower($mod->titulo));
			$items = "";
			foreach ($dir as $i => $file) if ( strpos($file,"servicio-".$mod->id."-")!==false ) { 
				$items .= CHtml::image(Yii::app()->baseUrl.'/assets/servicios/'.$file,'');
			}
			$servicios[$mod->id]['img'] = $items;
			$servicios[$mod->id]['titulo'] = $mod->titulo;
			$servicios[$mod->id]['descripcion'] = $mod->descripcion;
		}


		$this->pageTitle = 'Servicios - '.$this->empresa->nombre;
		$this->metaKeywords = 'servicios'.$serKeywords;
		$this->metaDescription = 'Diseñamos, planificamos, fabricamos e instalamos tu cocina.';

		$this->render('servicios',array('servicios'=>$servicios));
	}


	/**
	 * Galeria
	 */
	public function actionGaleria()
	{
		$this->pageTitle = 'Galería - '.$this->empresa->nombre;
		$this->metaKeywords = 'galeria';
		$this->metaDescription = 'En nuestra galería, podrás ver nuestros mejores proyectos y productos.';

		$galerias = Yii::app()->db->createCommand(
			"SELECT * 
				FROM (SELECT t.id, t.nombre, t.descripcion, t.prioridad, g.file_name, g.titulo
					FROM galeria `t`
					INNER JOIN galeria_img `g` ON t.id = g.galeria_id
					where t.estatus=1
					ORDER BY RAND()
					) AS shuffled_items
				GROUP BY id 
				ORDER BY prioridad DESC"
		)->queryAll();

		$this->render('galeria',array('galerias'=>$galerias, ));
	}

	public function actionGaleriaImg () {
		$gid = Yii::app()->request->getParam('g');

		if (is_numeric($gid) && $gid!=0) {
			$model = Galeria::model()->findByPk($gid);
			$items = "";

			$images = GaleriaImg::model()->findAll(array('condition'=>'galeria_id='.$gid));
			shuffle($images);
			if (!empty($images)) foreach ($images as $i => $img) { 
				$image = CHtml::image(Yii::app()->baseUrl.'/assets/galeria/'.$img->file_name,$img->titulo);

				$items .= CHtml::link($image,Yii::app()->baseUrl.'/assets/galeria/'.$img->file_name,array(
					'title'=>$img->titulo,
					'gallery'=>strtoupper($model->nombre),
					));
			}

			$html = '<div class="info">'.$items.'</div>';

			echo $html;

		} else echo "0";

	}


	/**
	 * Contacto
	 */
	public function actionContacto()
	{

		$this->pageTitle = 'Contacto - '.$this->empresa->nombre;
		$this->metaKeywords = 'contacto';
		$this->metaDescription = 'Para mayor información, contáctanos o búscanos en nuestras oficinas.';

		$contactoTipo = ContactoTipo::model()->tablename();

		# REDES SOCIALES
		$social = $this->socialNetwork; 

		# OTROS DATOS DE CONTACTO
		$c2=new CDbCriteria;
		$c2->select = "GROUP_CONCAT(t.valor SEPARATOR '||') as datos, ct.etiqueta as tipo";
		$c2->join .= " \n INNER JOIN ".$contactoTipo." `ct` ON t.tipo_id = ct.id";
		$c2->condition = " t.tipo_id <> 5 ";
		$c2->condition .= " AND t.estatus = 1 ";
		$c2->group = "ct.etiqueta";

		$sql = Contacto::model()->findAll($c2);
		$contacto = array();

		foreach ($sql as $i => $data) {
			array_push($contacto, array(
				'datos' => $data['datos'],
				'tipo' => $data['tipo'],
				));
		}
		
		$empresa = $this->empresa;

		foreach ($contacto as $i => $val) {
			
			switch ($val['tipo']) {
				case 'phone':
					$contacto['telefonos'] = rtrim(trim(str_replace('||', ', ', $val['datos'])),",");
					break;
				// case 'email':
				// 	$contacto['email'] = rtrim(trim(str_replace('||', '; ', $val['datos'])),";");
				// 	break;
				case 'address':
					$contacto['direccion'] = rtrim(trim(str_replace('||', '; ', $val['datos'])),";");
					break;
			}

		}
		$dir = ($empresa->direccion!='' ? $empresa->direccion.'; ' : '').($dir!='' ? '; '.$dir : '');
		$contacto['direccion'] = rtrim(trim($dir),"; ");

		$tel = ($empresa->telefono!='' ? $empresa->telefono : '').($contacto['telefonos']!='' ? ', '.$contacto['telefonos'] : '');
		$contacto['telefonos'] = rtrim(trim($tel),", ");

		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				//use 'contact' view from views/mail
				$mail = new YiiMailer();
				$mail->setView('standard');
				$mail->setLayout('contacto');
				$mail->setData(array(
					'message' => $model->body, 
					'name' => $model->name, 
					'description' => 'Enviado desde '.Yii::app()->name.'/Contacto',
				));
				
				//set properties
				$mail->setFrom($model->email, $model->name);
				$mail->setSubject('Contacto - '.$model->subject);
				$mail->setTo($this->empresa->email==null ? Yii::app()->params['adminEmail'] : $this->empresa->email);
				//send
				if ($mail->send()) {
					Yii::app()->user->setFlash('contact','Gracias por contactarnos. Le responderemos a la brevedad posible.');
				} else {
					Yii::app()->user->setFlash('error','Error al tratar de enviar el mensaje: '.$mail->getError());
				}

				$this->refresh();
			}
		}
		$this->render('contacto',array('model'=>$model,'empresa'=>$empresa,'social'=>$social,'contacto'=>$contacto, ));
	}


	/**
	 * Mapa del sitio
	 */
	public function actionMap()
	{
		$this->pageTitle = 'Mapa del sitio - '.$this->empresa->nombre;
		$this->metaKeywords = 'mapa del sitio';
		$this->metaDescription = 'Lista de contenido del sitio.';

		$this->render('map');
	}


	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}
}
