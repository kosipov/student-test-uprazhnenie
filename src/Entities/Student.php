<?php

namespace Kosipov\StudentTest\Entities;

class Student
{
    public const STUDY_STATUS = 0;

    public const DISMISSED_STATUS = 1;

    public const IN_ACADEMY_STATUS = 2;

    private int $num;

    private string $fio;

    private int $status;

    public function __construct(int $num, string $fio, int $status)
    {
        $this->num = $num;
        $this->fio = $fio;
        $this->status = $status;
    }

    public function getNum(): int
    {
        return $this->num;
    }

    public function getFio(): string
    {
        return $this->fio;
    }

    public function getStatus(): int
    {
        return $this->status;
    }

    public function isStudy(): bool
    {
        return $this->status === self::STUDY_STATUS;
    }

    public function isDismiss(): bool
    {
        return $this->status === self::DISMISSED_STATUS;
    }

    public function isInAcadem(): bool
    {
        return $this->status === self::IN_ACADEMY_STATUS;
    }

}
