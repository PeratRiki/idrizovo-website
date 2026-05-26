<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('visit_requests', function (Blueprint $table) {
            if (!Schema::hasColumn('visit_requests', 'visitor_type')) {
                $table->string('visitor_type')->nullable()->after('confirmation_code');
            }
        });
    }

    public function down(): void
    {
        Schema::table('visit_requests', function (Blueprint $table) {
            if (Schema::hasColumn('visit_requests', 'visitor_type')) {
                $table->dropColumn('visitor_type');
            }
        });
    }
};