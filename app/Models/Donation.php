<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Donation extends Model
{
    public const STATUS_NEW = 'new';
    public const STATUS_CONFIRMED = 'confirmed';
    public const STATUS_REJECTED = 'rejected';

    protected $fillable = [
        'name',
        'phone',
        'email',
        'amount',
        'bank_account_id',
        'transfer_reference',
        'note',
        'status',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
    ];

    public function bankAccount(): BelongsTo
    {
        return $this->belongsTo(BankAccount::class);
    }

    public function scopeNew($query)
    {
        return $query->where('status', self::STATUS_NEW);
    }

    public function scopeConfirmed($query)
    {
        return $query->where('status', self::STATUS_CONFIRMED);
    }

    /** تسمية الحالة بالعربية */
    public function statusLabel(): string
    {
        return match ($this->status) {
            self::STATUS_CONFIRMED => 'مؤكد',
            self::STATUS_REJECTED => 'مرفوض',
            default => 'جديد',
        };
    }
}
