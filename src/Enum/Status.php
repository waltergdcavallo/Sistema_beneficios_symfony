<?php 

namespace App\Enum;

enum Status: string
{
    case ACTIVO = 'ACTIVO';
    case PENDIENTE = 'PENDIENTE';
    case TERMINADO = 'TERMINADO';

    public static function choices(): array
    {
        return [
            'Activo' => self::ACTIVO->value,
            'Pendiente' => self::PENDIENTE->value,
            'Terminado' => self::TERMINADO->value,
        ];
    }
}