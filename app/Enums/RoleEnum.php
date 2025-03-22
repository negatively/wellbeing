<?php

namespace App\Enums;

enum RoleEnum: string
{
    case ADMIN      = 'admin';
    case HR = 'hr';
    case EMPLOYEE    = 'employee';

    const ALL = [
        self::ADMIN,
        self::HR,
        self::EMPLOYEE,
    ];
}