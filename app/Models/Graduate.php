<?php
namespace App\Models;
use Core\Model;

class Graduate extends Model {
    protected $table = 'graduates';

    public function create($data) {
        $fields = array_keys($data);
        $fields_str = implode(', ', $fields);
        $values_str = implode(', ', array_map(function($f) { return ":$f"; }, $fields));
        
        $sql = "INSERT INTO {$this->table} ($fields_str, created_at) VALUES ($values_str, CURRENT_TIMESTAMP)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute($data);
    }

    public function update($id, $data) {
        $fields = [];
        foreach(array_keys($data) as $key) {
            $fields[] = "$key = :$key";
        }
        $fields_str = implode(', ', $fields);
        $sql = "UPDATE {$this->table} SET $fields_str WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $data['id'] = $id;
        return $stmt->execute($data);
    }
}
