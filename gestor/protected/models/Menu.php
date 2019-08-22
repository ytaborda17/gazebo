<?php

/**
 * This is the model class for table "menu".
 *
 * The followings are the available columns in table 'menu':
 * @property integer $id
 * @property string $label
 * @property string $class
 * @property integer $parent
 * @property integer $status
 * @property string $operation
 * @property string $url
 * @property string $active
 * @property integer $sort
 */
class Menu extends CActiveRecord
{
    /**
     * Registro o LOG de cambios a la BD
     */
     public function behaviors()
     {
        return array(
            // Classname => path to Class
            'LogDbChanges' => 'application.behaviors.LogDbChanges',
        );
    }
    
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'cruge_menu';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('label', 'required'),
            array('parent, status, sort', 'numerical', 'integerOnly'=>true),
            array('label', 'length', 'max'=>100),
            array('class', 'length', 'max'=>15),
            array('operation', 'length', 'max'=>50),
            array('url', 'length', 'max'=>200),
            array('active', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, label, class, parent, status, operation, url, active, sort', 'safe', 'on'=>'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
           'getparent' => array(self::BELONGS_TO, 'menu', 'parent'),
           'childs' => array(self::HAS_MANY, 'menu', 'parent', 'order' => 'sort ASC'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'label' => 'Label',
            'class' => 'Class',
            'parent' => 'Parent',
            'status' => 'Status',
            'operation' => 'Operation',
            'url' => 'Url',
            'active' => 'Active',
            'sort' => 'Sort',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     *
     * Typical usecase:
     * - Initialize the model fields with values from filter form.
     * - Execute this method to get CActiveDataProvider instance which will filter
     * models according to data in model fields.
     * - Pass data provider to CGridView, CListView or any similar widget.
     *
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search()
    {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria=new CDbCriteria;

        $criteria->compare('id',$this->id);
        $criteria->compare('label',$this->label,true);
        $criteria->compare('class',$this->class,true);
        $criteria->compare('parent',$this->parent);
        $criteria->compare('status',$this->status);
        $criteria->compare('operation',$this->operation,true);
        $criteria->compare('url',$this->url,true);
        $criteria->compare('active',$this->active,true);
        $criteria->compare('sort',$this->sort);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Menu the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function getListed($activeItem="") {
        $url= dirname(substr($_SERVER['REQUEST_URI'], strlen(Yii::app()->baseUrl."/")));
        // $url= Yii::app()->request->requestUri;
        if ($url=="") $url="#";
        $subitems = array();
        if($this->childs) foreach($this->childs as $child) {
            if ( $this->status==1 ) {
                $subitems[] = $child->getListed($activeItem);
            }
        }

        $returnarray = array(
            'active' => ( $this->active!="" ? ( in_array($activeItem, explode(',',$this->active)) ) : ($activeItem === $this->url) ),
            'itemOptions'=>array(
                'class'=>$subitems != array() ? 'arrowDown' : 'arrowRight',
                ),
            'label' => ($this->parent==0 ? '<span class="icon-menu icon-'.strtolower($this->class).'"></span>'.strtoupper($this->label) : ucfirst($this->label)).' <span></span>', 
            'url' => $subitems != array() ? '' : array($this->url),
            'visible' => ( $this->status && (Yii::app()->user->checkAccess($this->operation)) ) ? true : false,
        );
       
       if($subitems != array()) $returnarray = array_merge($returnarray, array('items' => $subitems));
       return $returnarray;
    }
}