<?php

declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class ItineraryDestinationEnum extends Enum
{
    const NgheAn = 'Nghệ An';
    const ThanhHoa = 'Thanh Hóa';
    const HaNoi = 'Hà Nội';
}
