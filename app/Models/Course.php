<?php
namespace App\Models;
use Core\Model;

class Course extends Model {
    protected $table = 'courses';

    public function create($data) {
        $sql = "INSERT INTO {$this->table} (title, slug, title_en, title_ru, short_desc, short_desc_en, short_desc_ru, content, content_en, content_ru, image, created_at) 
                VALUES (:title, :slug, :title_en, :title_ru, :short_desc, :short_desc_en, :short_desc_ru, :content, :content_en, :content_ru, :image, CURRENT_TIMESTAMP)";
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
