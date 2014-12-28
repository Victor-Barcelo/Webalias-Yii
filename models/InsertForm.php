<?php
namespace app\models;
use yii\db\ActiveRecord;

class InsertForm extends ActiveRecord
{
    public $tag;
    public $code;
    public $url;
    
    public static function tableName() {
        return 'links';
    }
    
    public function rules() {
        return [[['tag', 'code', 'url'], 'required']];
    }
    
    public function safeAttributes() {
        return ['tag', 'code', 'url'];
    }
    
    public function insertLink($tag, $code, $url) {
        if ($this->isValidInsert($tag, $code, $url)  && $this->validate()) {
            $this->tag = '$tag';
            $this->code = '$code';
            $this->url = '$url';
            $this->save();
            return true;
        } else {
            return false;
        }
    }
    
    private function isValidInsert($tag, $code, $url) {
        return true;
    }
}
