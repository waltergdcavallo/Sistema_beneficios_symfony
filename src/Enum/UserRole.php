<?php 

namespace App\Enum;

enum UserRole: string
{
    case ROLE_ADMINISTRADOR = 'ROLE_ADMINISTRADOR';
    case ROLE_VENDEDOR = 'ROLE_VENDEDOR';
    case ROLE_PENDIENTE = 'ROLE_PENDIENTE';
    case ROLE_SUPER_ADMIN = 'ROLE_SUPER_ADMIN';

    public static function choices(): array
    {
        return [
            'Administrador' => self::ROLE_ADMINISTRADOR->value,
            'Vendedor' => self::ROLE_VENDEDOR->value,
            'Pendiente' => self::ROLE_PENDIENTE->value,
            'SuperAdmin' => self::ROLE_SUPER_ADMIN->value,
        ];
    }
}