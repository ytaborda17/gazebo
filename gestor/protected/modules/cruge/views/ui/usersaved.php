<h1>Usuarios</h1>

<?php 
echo CHtml::openTag('div', array('class' => 'bs-navbar-top'));
$this->widget('booster.widgets.TbNavbar',array(
    'brand' => 'Opciones',
    'fixed' => 'top',
    'fluid' => true,
    'htmlOptions' => array('style' => 'position:absolute; top:70px;'),
    'items' => array(
        array(
            'class' => 'booster.widgets.TbMenu',
            'type' => 'navbar',
            'items' => array(
                array('label' => 'Lista', 'url' => $this->createAbsoluteUrl('ui/usermanagementadmin'), 'icon'=>'th-list',),
                array('label' => 'Nuevo', 'url' => $this->createAbsoluteUrl('ui/usermanagementcreate'), 'icon'=>'plus', ),
                )
            )
        )
    ));
echo CHtml::closeTag('div');
?>
<?php 
// llamada cuando el actionEditProfile termina de guardar un usuario

$this->widget('booster.widgets.TbAlert', array(
    'fade' => true,
    'closeText' => '&times;', // false equals no close link
    'events' => array(),
    'htmlOptions' => array(),
    'userComponentId' => 'user',
    'alerts' => array( // configurations per alert type
        // success, info, warning, error or danger
        'success' => array('closeText' => '&times;'),
        'info' => array('closeText' => '&times;'),
        'warning' => array('closeText' => false),
        'error' => array('closeText' => false)
    ),
));
