<?php

/**
 * This is the model class for table "actor".
 *
 * The followings are the available columns in table 'actor':
 * @property string $id
 * @property string $nombre
 * @property string $apellido
 *
 * The followings are the available model relations:
 * @property Pelicula[] $peliculas
 */
class Actor extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'actor';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id', 'length', 'max'=>20),
			array('nombre, apellido', 'length', 'max'=>30),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nombre, apellido', 'safe', 'on'=>'search'),
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
			'peliculas' => array(self::MANY_MANY, 'Pelicula', 'actor_movie(actor_id, peli_id)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nombre' => 'Nombre',
			'apellido' => 'Apellido',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('apellido',$this->apellido,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Actor the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public static function create($id,$name,$lastname){
            $row= new Actor();
            $row->id=$id;
            $row->nombre=$name;
            $row->apellido=$lastname;
            echo $row->insert();
        }
        
        public static function getMovies($id){
            $sql='select p.nombre from actor a left join actor_movie am on am.actor_id=a.id left join pelicula p on p.id=am.pelicula_id where a.id= :id;';
            $param=array(':id'=>$id);
            $comando= Yii::app()->db->createCommand($sql);
            return $comando->execute($param);
        }
}
