<?php

declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class InvoiceFreghtStatusEnum extends Enum
{
    public const notconfirm = 'notconfirm';
    public const confirm = 'confirm';
    public const returned = 'returned';
    public const finish = 'finish';
}
