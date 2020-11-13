<?php

class Good extends Model {
    protected static $table = 'goods';

    protected static function setProperties()
    {
        self::$properties['id'] = [
            'type' => 'int'
        ];

        self::$properties['name'] = [
            'type' => 'varchar',
            'size' => 512
        ];

        self::$properties['price'] = [
            'type' => 'float'
        ];

        self::$properties['description'] = [
            'type' => 'text'
        ];

        self::$properties['category'] = [
            'type' => 'int'
        ];
    }

    public static function getGoods($categoryId)
    {
        return db::getInstance()->Select(
            'SELECT id, id_category, `name`, price FROM goods WHERE id_category = :category AND status=:status',
            ['status' => Status::Active, 'category' => $categoryId]);
    }

    public function getGoodInfo(){
        return db::getInstance()->Select(
            'SELECT * FROM goods WHERE id = :id',
            ['id' => (int)$this->id]);
    }

    public static function getGoodPrice($id){
        $result = db::getInstance()->Select(
            'SELECT price FROM goods WHERE id = :id',
            ['id' => $id]);

        return (isset($result[0]) ? $result[0]['price'] : null);
    }
}