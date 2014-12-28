<?php
namespace app\models;
use yii\base\Model;
class SearchForm extends Model
{
	public $tag;
	public $code;
	
	public function rules()
	{
		return [[['tag'], 'required']];
	}

	public function safeAttributes()
	{
		return ['tag','code'];
	}

	public function getLinks($tag,$code=null)
	{
		if($code == null){
			$links = Links::find()->where(['tag' => $tag])->orderBy('id')->all();
		}
		else {
			$links = Links::find()->where(['tag' => $tag, 'code' => $code])->orderBy('id')->all();
		}
		return $links;
	}
}