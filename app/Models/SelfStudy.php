<?php
namespace App\Models;
use Core\Model;

class SelfStudy extends Model {
    protected $table = 'self_study';

    public function create($data) {
        $sql = "INSERT INTO {$this->table} (title, description, file_url) VALUES (:title, :description, :file_url)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute($data);
    }

    public function update($id, $data) {
        $sql = "UPDATE {$this->table} SET title = :title, description = :description, file_url = :file_url WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $data['id'] = $id;
        return $stmt->execute($data);
    }
}
