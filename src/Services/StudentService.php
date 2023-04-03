<?php

namespace Kosipov\StudentTest\Service;

use Exception;
use Kosipov\StudentTest\Entities\Student;

class StudentService
{
    /**
     * @throws Exception
     */
    public function dismissStudent(Student $student): Student
    {
        if ($student->isDismiss() || $student->isInAcadem()) {
            throw new Exception('Invalid student status');
        }

        return new Student($student->getNum(), $student->getFio(), Student::DISMISSED_STATUS);
    }
}
