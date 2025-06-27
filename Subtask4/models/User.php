<?php

declare(strict_types=1);

class User
{
    public string $name;
    public int $age;
    public string $gender;
    public string $age_gender_phrase;

    function __construct(string $name, string $gender, int $age, string $password)
    {
        $this->name = $name;
        $this->age = $age;
        $this->gender = $gender;

        $this->set_age_gender_phrase();
    }

    private function set_age_gender_phrase(): void
    {
        if ($this->gender === "male")
            $this->set_age_male_phrase();
        elseif ($this->gender === "female")
            $this->set_age_female_phrase();
    }

    private function set_age_male_phrase(): void
    {
        if ($this->age < 18)
            $this->age_gender_phrase = "мальчишка";
        elseif ($this->age < 35)
            $this->age_gender_phrase = "парнишка";
        elseif ($this->age < 60)
            $this->age_gender_phrase = "дядька";
        elseif ($this->age < 90)
            $this->age_gender_phrase = "дедулька";
        else
            $this->age_gender_phrase = "уважаемый дедулька";
    }

    private function set_age_female_phrase(): void
    {
        if ($this->age < 18)
            $this->age_gender_phrase = "девченка";
        elseif ($this->age < 35)
            $this->age_gender_phrase = "девчушка";
        elseif ($this->age < 60)
            $this->age_gender_phrase = "тетенька";
        elseif ($this->age < 90)
            $this->age_gender_phrase = "бабулька";
        else
            $this->age_gender_phrase = "уважаемая бабулька";
    }

    public static function get_datetime_phrase(): string {
        $datetime = localtime(time(), true);

        $month_phrase = User::get_date_phrase($datetime["tm_mon"]);

        $time_data = User::get_time_phrase($datetime["tm_hour"]);


        return $time_data[0] . " " . $month_phrase . $time_data[0] . " " . $time_data[1];
    }

    private static function get_date_phrase(int $month): string {
        if ($month <= 1 or $month === 11)
            $date_phrase = "зимне";
        elseif ($month <= 4)
            $date_phrase = "весенне";
        elseif ($month <= 7)
            $date_phrase = "летне";
        else
            $date_phrase = "осенне";

        return $date_phrase;
    }

    private static function get_time_phrase(int $hour): array {
        if ($hour == 23 or $hour < 4)
            $time_phrase = ["й", "ночи"];
        elseif ($hour < 11)
            $time_phrase = ["го", "утра"];
        elseif ($hour < 16)
            $time_phrase = ["го", "дня"];
        else
            $time_phrase = ["го", "вечера"];

        return $time_phrase;
    }
}