<?php
declare(strict_types=1);

namespace App\userDetail\entity;

use App\common\repository\WritePayloadBuilder;
use App\userDetail\dto\request\UserPermissionsReq;

/**
 * UserPermissionsUpdateCommand
 */
final class UserPermissionsUpdateEntity
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

    public static function fromReq(UserPermissionsReq $req): self
    {
        return new self(
            $req->customerMenu(),
            $req->customerDetail(),
            $req->fmsIdManage(),
            $req->contractMenu(),
            $req->counselingMenu(),
            $req->incomeView()
        );
    }

    public function toDbPayload(WritePayloadBuilder $builder): array
    {
        return $builder->build([
            'customerMenu'   => $this->customerMenu,
            'customerDetail' => $this->customerDetail,
            'fmsIdManage'    => $this->fmsIdManage,
            'contractMenu'   => $this->contractMenu,
            'counselingMenu' => $this->counselingMenu,
            'incomeView'     => $this->incomeView,
        ], [
            'customerMenu'   => ['col' => 'customer_menu'],
            'customerDetail' => ['col' => 'customer_detail'],
            'fmsIdManage'    => ['col' => 'fms_id_manage'],
            'contractMenu'   => ['col' => 'contract_menu'],
            'counselingMenu' => ['col' => 'counseling_menu'],
            'incomeView'     => ['col' => 'income_view'],
        ]);
    }
}
