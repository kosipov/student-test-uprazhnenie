<?php

namespace Kosipov\StudentTest\Controllers\Http;

use Kosipov\StudentTest\Repositories\StudentRepository;
use Kosipov\StudentTest\Services\StudentService;

class StudentController
{
    private StudentService $studentService;

    private StudentRepository $studentRepository;

    public function __construct(StudentService $studentService, StudentRepository $studentRepository)
    {
        $this->studentService = $studentService;
        $this->studentRepository = $studentRepository;
    }

    public function dismissStudent(string $num): array
    {
        $student = $this->studentRepository->getStudent($num);
        $dismissed = $this->studentService->dismissStudent($student);
        $this->studentRepository->updateStudent($student);

        return [
            'num' => $dismissed->getNum(),
            'fio' => $dismissed->getFio(),
            'status' => $dismissed->getStatus(),
        ];
    }
}
