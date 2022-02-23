<?php

namespace App\Constants;

final class Flag {
    public const ITEM_ACTIVE = 'active';
    public const ITEM_DE_ACTIVE = 'de-active';

    public const MEJA_AVAIL = 'avail';
    public const MEJA_RSRVD = 'rsrvd';

    public const ORDER_ACTIVE = 'aktif';
    public const ORDER_NON_ACTIVE = 'non-aktif';

    public const PEMBAYARAN = [
        'CASH' => 'cash',
        'DEBIT' => 'debit',
        'CC' => 'cc'
    ];
}
