<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('visit_requests', function (Blueprint $table) {
            if (! Schema::hasColumn('visit_requests', 'requested_time')) {
                $table->string('requested_time')->nullable()->after('requested_date');
            }
        });
    }

    public function down(): void
    {
        Schema::table('visit_requests', function (Blueprint $table) {
            if (Schema::hasColumn('visit_requests', 'requested_time')) {
                $table->dropColumn('requested_time');
            }
        });
    }
};
