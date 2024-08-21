<?php

namespace App;

/**
 * PHP SQLite Insert Demo
 */
class SQLiteGetTrip {

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
    public function getTripById($id) {
      // I check if the variable is numeric
      if(is_numeric($id)){
        $stmt = $this->pdo->prepare('SELECT id, title, description, motto FROM trips WHERE id = :id;');
        // i change the paramenter bind with the variable value
        $stmt->execute([':id' => $id]);
        $trip = $stmt->fetchObject();
        return $trip;
      }
      
  }

}