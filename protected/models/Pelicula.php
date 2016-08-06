<?php

/**
 * This is the model class for table "pelicula".
 *
 * The followings are the available columns in table 'pelicula':
 * @property integer $id
 * @property string $nombre
 *
 * The followings are the available model relations:
 * @property Actor[] $actors
 */
class Pelicula extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'pelicula';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre', 'length', 'max'=>30),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nombre', 'safe', 'on'=>'search'),
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
			'actors' => array(self::MANY_MANY, 'Actor', 'actor_movie(peli_id, actor_id)'),
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
		$criteria->compare('nombre',$this->nombre,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Pelicula the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public static function createMovie($id,$name, $actor){
            $row=new Pelicula();
            $row->id=$id;
            $row->nombre=$name;
            $res=$row->insert();
            foreach ($actor as $key) {
                ActorMovie::asossiate($id, $key->id);
            }
            return $res;
        }
        
        public static function getActors($id){
            $sql='select a.nombre,a.apellido from actor_movie am left join actor a on a.id=am.actor_id where am.pelicula_id= :id ;';
            $args=array(':id'=>$id);
            $cons= Yii::app()->db->createCommand($sql);
            return $cons->execute($args);
        }
}
