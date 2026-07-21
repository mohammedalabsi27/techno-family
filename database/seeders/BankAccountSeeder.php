<?php

namespace Database\Seeders;

use App\Models\BankAccount;
use Illuminate\Database\Seeder;

class BankAccountSeeder extends Seeder
{
    public function run(): void
    {
        // حساب تجريبي — تُستبدل البيانات بالحسابات الفعلية من لوحة التحكم
        if (BankAccount::count() > 0) {
            return;
        }

        BankAccount::create([
            'bank_name' => 'مصرف الراجحي',
            'account_name' => 'وقف التميز الأسري',
            'account_number' => '000000000000',
            'iban' => 'SA0000000000000000000000',
            'order' => 1,
            'is_active' => true,
        ]);
    }
}
