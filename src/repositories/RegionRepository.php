<?php

namespace Desis\Repositories;

use Desis\Repositories\Database;
use Desis\Models\Commune;
use Desis\Models\Region;

class RegionRepository
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
            $queryAll = 'SELECT * FROM regions';
            $result = $this->db->query($queryAll);

            if (!$result) {
                throw new \Exception('Error en la consulta: ' . $this->db->lastErrorMsg());
            }

            $allRegions = [];

            while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
                $region = new Region(
                    $row['id'], 
                    $row['label'], 
                    $row['tag'], 
                    $row['short']
                );
                $allRegions[] = $region;
            }

            return $allRegions;
        } catch (\Exception $e) {
            throw $e;
        } finally {
            if ($this->db) {
                $this->db->close();
            }
        }
    }

    public function getCommunesByRegion(int $region_id): array
    {
        try {
            $queryAll = 'SELECT c.id, c.label, c.tag, c.short, c.province_id ' 
            . 'FROM communes c '
            . 'JOIN provinces p ON c.province_id = p.id '
            . 'JOIN regions r ON p.region_id = r.id '
            . 'WHERE r.id ='.$region_id;
            $result = $this->db->query($queryAll);

            if (!$result) {
                throw new \Exception('Error en la consulta: ' . $this->db->lastErrorMsg());
            }

            $communes = [];

            while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
                $commune = new Commune(
                    $row['id'], 
                    $row['label'], 
                    $row['tag'], 
                    $row['short'],
                    $row['province_id']
                );
                $communes[] = $commune;
            }

            return $communes;
        } catch (\Exception $e) {
            throw $e;
        } finally {
            if ($this->db) {
                $this->db->close();
            }
        }
    }

}
