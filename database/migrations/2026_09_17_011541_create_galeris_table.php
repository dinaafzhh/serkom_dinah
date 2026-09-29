<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::statement("
            ALTER TABLE galeri
            MODIFY kategori VARCHAR(50) NOT NULL
        ");
    }

    public function down(): void
    {
        DB::statement("
            ALTER TABLE galeri
            MODIFY kategori ENUM(
                'Foto',
                'Video'
            ) NOT NULL
        ");
    }
};

