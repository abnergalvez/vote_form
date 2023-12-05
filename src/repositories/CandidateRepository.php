<?php

namespace Desis\Repositories;

use Desis\Repositories\Database;
use Desis\Models\Candidate;

class CandidateRepository
{
    private \SQLite3 $db;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->getDB();
    }

    public function getAll(): array
    {
        try {
            $queryAll = 'SELECT * FROM candidates';
            $result = $this->db->query($queryAll);

            if (!$result) {
                throw new \Exception('Error en la consulta: ' . $this->db->lastErrorMsg());
            }

            $allCandidates = [];

            while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
                $candidate = new Candidate($row['id'], $row['name']);
                $allCandidates[] = $candidate;
            }

            return $allCandidates;
        } catch (\Exception $e) {
            throw $e;
        } 
    }

    public function getAllWithVotes(): array
    {
        try {
            $queryAll = 'SELECT c.id AS candidate_id,'
            .' c.name AS candidate_name,'
            .' COUNT(v.id) AS vote_count'
            .' FROM candidates c'
            .' LEFT JOIN votes v ON c.id = v.candidate_id'
            .' GROUP BY c.id, c.name'
            .' ORDER BY vote_count DESC';
            $result = $this->db->query($queryAll);

            if (!$result) {
                throw new \Exception('Error en la consulta: ' . $this->db->lastErrorMsg());
            }

            $allCandidates = [];

            while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
                $candidate = [ 'id' => $row['candidate_id'], 'name' => $row['candidate_name'], 'votes' => $row['vote_count']];
                $allCandidates[] = $candidate;
            }

            return $allCandidates;
        } catch (\Exception $e) {
            throw $e;
        } finally {
            if ($this->db) {
                $this->db->close();
            }
        }
    }
}

