<?php
namespace App\Models;
use Core\Model;

class Blog extends Model {
    protected $table = 'blog_posts';

    public function create($data) {
        $sql = "INSERT INTO {$this->table} (title, slug, title_en, title_ru, content, content_en, content_ru, cover_image, thumbnail_image, created_at) 
                VALUES (:title, :slug, :title_en, :title_ru, :content, :content_en, :content_ru, :cover_image, :thumbnail_image, CURRENT_TIMESTAMP)";
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

    public function findBySlug($slug) {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE slug = :slug LIMIT 1");
        $stmt->execute(['slug' => $slug]);
        return $stmt->fetch();
    }

    public function incrementViews($id) {
        $stmt = $this->db->prepare("UPDATE {$this->table} SET views = views + 1 WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }

    public function search($query) {
        $q = "%$query%";
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE 
            title LIKE :q OR title_en LIKE :q OR title_ru LIKE :q OR 
            content LIKE :q OR content_en LIKE :q OR content_ru LIKE :q 
            ORDER BY id DESC");
        $stmt->execute(['q' => $q]);
        return $stmt->fetchAll();
    }
}
