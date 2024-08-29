<?php

declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class InvoiceFreghtCurrentPositionEnum extends Enum
{
    const Kho_Nghe_An = 'Kho_Nghe_An';
    const Kho_Thanh_Hoa = 'Kho_Thanh_Hoa';  // Đã sửa từ 'Kho_Thanh_Hoa' thành 'Kho_Thanh_Hoa'
    const Kho_Ha_Noi = 'Kho_Ha_Noi';
}
