<?php

namespace App;

/**
 * PHP SQLite Insert Demo
 */
class SQLiteGetTrips {

    /**
     * PDO object
     * @var \PDO
     */
    private $pdo;

    /**
     * Initialize the object with a specified PDO object
     * @param \PDO $pdo
     */
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

   /**
     * Get all projects
     * @return type
     */
    public function getTrips() {
      $stmt = $this->pdo->query('SELECT id, title, description, motto '
              . 'FROM trips');
      $trips = $stmt->fetchAll(\PDO::FETCH_ASSOC);
      // $trips = [];
      // while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
      //     $trips[] = [
      //         'trips_id' => $row['id'],
      //         'trip_title' => $row['title'],
      //         'trip_description' => $row['description'],
      //         'trip_motto' => $row['motto']
      //     ];
      // }
      return $trips;
  }

}