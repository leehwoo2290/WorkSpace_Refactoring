<?php
declare(strict_types=1);

namespace App\user\dto;

final class UserListQueryEnumMaps
{
    /**
     * @return array<string, array<string,string>>
     */
    public static function maps(): array
    {
        return [
            'user_status' => [
                'PENDING' => 'Pending',
                'NORMAL'  => 'Normal',
                'QUIT'    => 'Quit',
            ],
            'gender' => [
                'MALE'   => '남',
                'FEMALE' => '여',
            ],
            'labor_form' => [
                'RESIDENT'     => '상근',
                'NON_RESIDENT' => '비상근',
            ],
            'work_form' => [
                'DEEMED'  => '간주',
                'SPECIAL' => '별정',
            ],
            'contract_type' => [
                'REGULAR'  => '정규직',
                'CONTRACT' => '계약직',
            ],
        ];
    }
}
