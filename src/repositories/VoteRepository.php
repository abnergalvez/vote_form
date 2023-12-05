<?php

namespace Desis\Repositories;

use Desis\Repositories\Database;
use Desis\Models\Vote;

class VoteRepository extends Database
{
    private $db;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->getDB();
        if (!$this->db) {
            die("Error to conect DB");
        }
    }

    public function save(Vote $vote)
    {
        try {
            $queryAll = 'INSERT INTO votes (fullname, alias, rut, email, region_id, commune_id, candidate_id, find_out)'
                .' VALUES (:fullname, :alias, :rut, :email, :region_id, :commune_id, :candidate_id, :find_out)';
    
            $stmt = $this->db->prepare($queryAll);
            $stmt->bindParam(':fullname', $vote->fullname);
            $stmt->bindParam(':alias', $vote->alias);
            $stmt->bindParam(':rut', $vote->rut);
            $stmt->bindParam(':email', $vote->email);
            $stmt->bindParam(':region_id', $vote->region_id);
            $stmt->bindParam(':commune_id', $vote->commune_id);
            $stmt->bindParam(':candidate_id', $vote->candidate_id);
            $stmt->bindParam(':find_out', $vote->find_out);
    
            $result = $stmt->execute();
            return $result;

        } catch (\Exception $e) {
            throw $e;
        } finally {
            if ($this->db) {
                $this->db->close();
            }
        }
    }

    public function rutExists(string $rut): bool
    {
        try {
            $query = "SELECT COUNT(*) as count FROM votes WHERE rut = :rut";
            $stmt = $this->db->prepare($query); 
            $stmt->bindParam(':rut', $rut);
            $result = $stmt->execute();
            
            $row = $result->fetchArray(SQLITE3_ASSOC);
            $count = isset($row['count']) ? intval($row['count']) : 0;
            return $count > 0;

        } catch (\Exception $e) {
            throw $e;
        } 
    }
}