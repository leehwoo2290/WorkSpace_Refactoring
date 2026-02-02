<?php
declare(strict_types=1);

namespace App\user\detail\dto\request;

use App\common\dto\ReqDtoBase;

final class UserPermissionsReq extends ReqDtoBase
{
    private ?string $customerMenu;
    private ?string $customerDetail;
    private ?string $fmsIdManage;
    private ?string $contractMenu;
    private ?string $counselingMenu;
    private ?string $incomeView;

    private function __construct(
        ?string $customerMenu,
        ?string $customerDetail,
        ?string $fmsIdManage,
        ?string $contractMenu,
        ?string $counselingMenu,
        ?string $incomeView
    ) {
        $this->customerMenu = $customerMenu;
        $this->customerDetail = $customerDetail;
        $this->fmsIdManage = $fmsIdManage;
        $this->contractMenu = $contractMenu;
        $this->counselingMenu = $counselingMenu;
        $this->incomeView = $incomeView;
    }

    public static function fromArray(array $data): self
    {
        return new self(
            self::toYnOrNull(self::pick($data, 'customer_menu', 'customer_menu')),
            self::toYnOrNull(self::pick($data, 'customer_detail', 'customer_detail')),
            self::toYnOrNull(self::pick($data, 'fms_id_manage', 'fms_id_manage')),
            self::toYnOrNull(self::pick($data, 'contract_menu', 'contract_menu')),
            self::toYnOrNull(self::pick($data, 'counseling_menu', 'counseling_menu')),
            self::toYnOrNull(self::pick($data, 'income_view', 'income_view')),
        );
    }

    public function customerMenu(): ?string
    {
        return $this->customerMenu;
    }
    public function customerDetail(): ?string
    {
        return $this->customerDetail;
    }
    public function fmsIdManage(): ?string
    {
        return $this->fmsIdManage;
    }
    public function contractMenu(): ?string
    {
        return $this->contractMenu;
    }
    public function counselingMenu(): ?string
    {
        return $this->counselingMenu;
    }
    public function incomeView(): ?string
    {
        return $this->incomeView;
    }

}
