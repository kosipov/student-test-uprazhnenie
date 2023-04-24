<?php

namespace Kosipov\StudentTest\Repositories;

use Exception;
use Kosipov\StudentTest\Entities\Student;

class StudentRepository
{
    private const SERVERNAME = 'localhost';
    private const USERNAME = 'localhost';
    private const PASSWORD = 'localhost';
    private const DBNAME = 'localhost';

    private \mysqli $conn;

    public function __construct()
    {
        $conn = mysqli_connect(self::SERVERNAME, self::USERNAME, self::PASSWORD, self::DBNAME);

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $this->conn = $conn;
    }

    public function updateStudent(Student $student): void
    {
        $num = $student->getNum();
        $fio = $student->getFio();
        $status = $student->getStatus();
        $sql = "UPDATE students SET fio=$fio, status=$status WHERE num=$num";

        if (mysqli_query($this->conn, $sql)) {
            return;
        } else {
            echo "Ошибка обновления записи: " . mysqli_error($this->conn);
        }
    }

    public function getStudent(string $num): Student
    {
        $sql = "SELECT * FROM students where num=$num";

        $result = mysqli_query($this->conn, $sql);

        if (mysqli_num_rows($result) > 0) {

            $row = mysqli_fetch_assoc($result);

            return new Student($row['num'], $row['fio'], $row['status']);
        } else {
            throw new Exception('Student not found');
        }
    }
}
