<?php

namespace models;

//using the database class namespace
use models\Model;

class Henna extends Model {

    public function getAllHennaByItemOrPrice($item, $price) {
        $query = "select * from henna WHERE CONCAT(item,' ',price) like :item or price like :price";
        return $this->query($query, [
            'item' => '%' . $item . '%',
            'price' => '%' . $price . '%',
        ]);
    }

    public function getAllHenna() {
        $query = "select * from henna";
        return $this->query($query);
    }

    public function getHennaById($id){
        $query = "select * from henna where id = :id";
        return $this->query($query, ['id' => $id]);
    }

    public function saveHenna($inputData){
        $query = "insert into henna (item, price) values (:item, :price);";
        return $this->query($query, $inputData);
    }

    public function updateHenna($inputData){
        $query = "update henna set item = :item, price = :price where id = :id";
        return $this->query($query, $inputData);
    }

    public function deleteHenna($inputData){
        $query = "DELETE FROM henna where id = :id";
        return $this->query($query, $inputData);
    }
}
