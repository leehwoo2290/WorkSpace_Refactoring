<?php
declare(strict_types=1);

namespace App\userDetail\dto\response;

final class UserPermissionsRes implements \JsonSerializable
{
    // tb_user.config(JSON) 키들. 기본값 N
    public string $customer_menu = 'N';
    public string $customer_detail = 'N';
    public string $fms_id_manage = 'N';
    public string $contract_menu = 'N';
    public string $counseling_menu = 'N';
    public string $income_view = 'N';

    public function jsonSerialize(): array
    {
        return [
            'customer_menu'   => $this->customer_menu,
            'customer_detail' => $this->customer_detail,
            'fms_id_manage'   => $this->fms_id_manage,
            'contract_menu'   => $this->contract_menu,
            'counseling_menu' => $this->counseling_menu,
            'income_view'     => $this->income_view,
        ];
    }
}
