<?php
namespace App\Models;

use Core\Model;

class Contact extends Model {
    protected $table = 'contacts';

    public function create($data) {
        $sql = "INSERT INTO {$this->table} (name, surname, email, phone, subject, message) 
                VALUES (:name, :surname, :email, :phone, :subject, :message)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            'name' => $data['name'],
            'surname' => $data['surname'],
            'email' => $data['email'],
            'phone' => $data['phone'] ?? null,
            'subject' => $data['subject'] ?? null,
            'message' => $data['message']
        ]);
    }
}
