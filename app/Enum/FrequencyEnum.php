<?php
namespace App\Enum;

enum FrequencyEnum: int
{
    case DAILY = 1;
    case WEEKLY = 7;
    case BIWEEKLY = 14;
    case MONTHLY = 30;

    public static function getValue(string $caseName): static
    {
        return match(true) {
            str_contains($caseName, 'DAILY') => self::DAILY,
            str_contains($caseName, 'WEEKLY') => self::WEEKLY,
            str_contains($caseName, 'BIWEEKLY') => self::BIWEEKLY,
            str_contains($caseName, 'MONTHLY') => self::MONTHLY,
        };
    }

    public static function getKey($caseValue): string
    {
        dd($caseValue);
        return match($caseValue) {
            self::DAILY->value => 'DAILY',
            self::WEEKLY->value => 'WEEKLY',
            self::BIWEEKLY->value => 'BIWEEKLY',
            self::MONTHLY->value => 'MONTHLY',
        };
    }
}
