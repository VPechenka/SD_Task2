<?php

declare(strict_types=1);

class User
{
    public string $name;
    public string $age_gender_phrase;
    public int $age;

    public string $time_phrase;

    function __construct(string $name, string $gender, string $age)
    {
        $this->name = $name;
        $this->age = (int)$age;
        $this->gender_phrase = $gender;
    }

    private function get_gender_phrase(string $gender): string
    {
        return '<UNK>';
    }
}