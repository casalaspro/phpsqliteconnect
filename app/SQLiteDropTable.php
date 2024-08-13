<?php

namespace App;

class SQLiteDropTable {

  /**
   * PDO object
   * @var \PDO
   */
  private $pdo;

  /**
   * connect to the SQLite database
   */
  public function __construct($pdo) {
      $this->pdo = $pdo;
  }

  /**
   * create tables 
   */
//   public function dropTables() {
//       // ROWID is sqlite AUTO_INCREMENT automatially inserted in primary key
//       $commands = ['DROP TABLE IF EXISTS nation_trip',];
                                              
//       // execute the sql commands to create new tables
//       foreach ($commands as $command) {
//           $this->pdo->exec($command);
//       }
//   }
public function dropTables() {
    // ROWID is sqlite AUTO_INCREMENT automatially inserted in primary key
    $commands = ['DROP TABLE IF EXISTS trips',];
                                            
    // execute the sql commands to create new tables
    foreach ($commands as $command) {
        $this->pdo->exec($command);
    }
}

}