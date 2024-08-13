<?php

namespace App;

class SQLiteCreateTable {

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
  public function createTables() {
      // ROWID is sqlite AUTO_INCREMENT automatially inserted in primary key
      $commands = ['CREATE TABLE IF NOT EXISTS nations (
                      id   INTEGER PRIMARY KEY AUTOINCREMENT,
                      -- if a leave blank instead NOT NULL is like to set NULL
                      name varchar(50) NOT NULL,
                      latitude FLOAT(3,6) NOT NULL,
                      longitude FLOAT(3,6) NOT NULL
                    )',

                  'CREATE TABLE IF NOT EXISTS trips (
                      id   INTEGER PRIMARY KEY AUTOINCREMENT,
                      title varchar(250) NOT NULL,
                      description TEXT,
                      motto TEXT
                    )',

                  'CREATE TABLE IF NOT EXISTS nation_trip (
                      id INTEGER PRIMARY KEY AUTOINCREMENT,
                      trip_id  BIGINT NOT NULL,
                      nation_id  BIGINT NOT NULL,
                      FOREIGN KEY (trip_id)
                      REFERENCES trips (id)   ON UPDATE CASCADE
                                              ON DELETE CASCADE,
                      FOREIGN KEY (nation_id)
                      REFERENCES nations (id)   ON UPDATE CASCADE
                                              ON DELETE CASCADE)',

                  'CREATE TABLE IF NOT EXISTS foods (
                      id   INTEGER PRIMARY KEY AUTOINCREMENT,
                      trip_id  BIGINT,
                      name VARCHAR(150) NOT NULL,
                      description TEXT,
                      FOREIGN KEY (trip_id)
                      REFERENCES trips (id)   ON UPDATE CASCADE
                                              ON DELETE CASCADE
                    )',

                  'CREATE TABLE IF NOT EXISTS food_places (
                      id   INTEGER PRIMARY KEY AUTOINCREMENT,
                      trip_id  BIGINT,
                      name VARCHAR(150) NOT NULL,
                      image VARCHAR(250),
                      description TEXT,
                      latitude FLOAT(3,6) NOT NULL,
                      longitude FLOAT(3,6) NOT NULL,
                      FOREIGN KEY (trip_id)
                      REFERENCES trips (id)   ON UPDATE CASCADE
                                              ON DELETE CASCADE
                    )',

                  'CREATE TABLE IF NOT EXISTS food_food_place (
                      id   INTEGER PRIMARY KEY AUTOINCREMENT,
                      food_id  BIGINT,
                      food_place_id BIGINT,
                      FOREIGN KEY (food_id)
                      REFERENCES foods (id)   ON UPDATE CASCADE
                                              ON DELETE CASCADE,
                      FOREIGN KEY (food_place_id)
                      REFERENCES food_places (id)   ON UPDATE CASCADE
                                                    ON DELETE CASCADE
                    )',
                  
                  'CREATE TABLE IF NOT EXISTS days (
                      id   INTEGER PRIMARY KEY AUTOINCREMENT,
                      trip_id  BIGINT NOT NULL,
                      datetime DATETIME NOT NULL,
                      day_name VARCHAR(10) NOT NULL,
                      FOREIGN KEY (trip_id)
                      REFERENCES trips (id)   ON UPDATE CASCADE
                                              -- ON DELETE CASCADE,
                    )',
                    
                  'CREATE TABLE IF NOT EXISTS stops (
                      id   INTEGER PRIMARY KEY AUTOINCREMENT,
                      day_id BIGINT NOT NULL,
                      title VARCHAR(150) NOT NULL,
                      description TEXT,
                      image VARCHAR(250),
                      latitude FLOAT(3,6),
                      longitude FLOAT(3,6),
                      rating FLOAT(1,1),
                      FOREIGN KEY (day_id)
                      REFERENCES days (id)   ON UPDATE CASCADE
                                              -- ON DELETE CASCADE,
                    )',

                  'CREATE TABLE IF NOT EXISTS notes (
                      id   INTEGER PRIMARY KEY AUTOINCREMENT,
                      stop_id BIGINT,
                      title VARCHAR(150),
                      text TEXT NOT NULL,
                      FOREIGN KEY (stop_id)
                      REFERENCES stops (id) ON UPDATE CASCADE
                                            ON DELETE CASCADE
                    )',
                  
                  'CREATE TABLE IF NOT EXISTS participants (
                      id   INTEGER PRIMARY KEY AUTOINCREMENT,
                      name VARCHAR(100) NOT NULL,
                      surname VARCHAR(100) NOT NULL,
                      nickname VARCHAR(100),
                      telephone_number VARCHAR(20)
                    )',
                  
                  'CREATE TABLE IF NOT EXISTS participant_trip (
                      id   INTEGER PRIMARY KEY AUTOINCREMENT,
                      trip_id BIGINT,
                      participant_id BIGINT,
                      FOREIGN KEY (trip_id)
                      REFERENCES trips (id) ON UPDATE CASCADE
                                            ON DELETE CASCADE,
                      FOREIGN KEY (participant_id)
                      REFERENCES participants (id)  ON UPDATE CASCADE
                                                    ON DELETE CASCADE
                    )'];
                                              
      // execute the sql commands to create new tables
      foreach ($commands as $command) {
          $this->pdo->exec($command);
      }
  }

  /**
   * get the table list in the database
   */
  public function getTableList() {

      $stmt = $this->pdo->query("SELECT name
                                 FROM phpsqlite
                                 WHERE type = 'table'
                                 ORDER BY name");
      $tables = [];
      while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
          $tables[] = $row['name'];
      }

      return $tables;
  }

}