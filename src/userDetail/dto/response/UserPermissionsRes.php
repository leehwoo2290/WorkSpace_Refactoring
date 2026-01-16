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

    public function __construct(string $customer_menu = 'N',
                                        string $customer_detail = 'N',
                                        string $fms_id_manage = 'N',
                                        string $contract_menu = 'N',
                                        string $counseling_menu = 'N',
                                        string $income_view = 'N') {
        $this->customer_menu = $customer_menu;
        $this->customer_detail = $customer_detail;
        $this->fms_id_manage = $fms_id_manage;
        $this->contract_menu = $contract_menu;
        $this->counseling_menu = $counseling_menu;
        $this->income_view = $income_view;
    }
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
