<?php

namespace App;

/**
 * PHP SQLite Insert Demo
 */
class SQLiteInsertNations {

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
     * Insert a new project into the projects table
     * @param string $projectName
     * @return the id of the new project
     */
    // public function insertProject($projectName) {
    //     $sql = 'INSERT INTO projects(project_name) VALUES(:project_name)';
    //     $stmt = $this->pdo->prepare($sql);
    //     $stmt->bindValue(':project_name', $projectName);
    //     $stmt->execute();

    //     return $this->pdo->lastInsertId();
    // }

    /**
     * Insert a new task into the tasks table
     * @param type $tripTitle
     * @param type $tripDescription
     * @param type $tripMotto
     * @return int id of the inserted task
     */
    public function insertNation($nationName, $nationAlpha3) {
        $sql = 'INSERT INTO nations(id,name,alpha_3,latitude, longitude) '
                . 'VALUES(NULL,:nationName,:nationAlpha3,NULL,NULL);';

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':nationName' => $nationName,
            ':nationAlpha3' => $nationAlpha3
        ]);

        return $this->pdo->lastInsertId();
    }

}