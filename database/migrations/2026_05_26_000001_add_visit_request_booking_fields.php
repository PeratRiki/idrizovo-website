<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('visit_requests', function (Blueprint $table) {
            if (!Schema::hasColumn('visit_requests', 'requested_date')) {
                $table->date('requested_date')->nullable()->after('status');
            }
            if (!Schema::hasColumn('visit_requests', 'visit_count')) {
                $table->unsignedTinyInteger('visit_count')->default(1)->after('requested_date');
            }
            if (!Schema::hasColumn('visit_requests', 'notification_method')) {
                $table->string('notification_method')->default('none')->after('visit_count');
            }
            if (!Schema::hasColumn('visit_requests', 'confirmation_code')) {
                $table->string('confirmation_code', 6)->nullable()->after('notification_method');
            }
        });

        DB::table('visit_requests')
            ->whereNull('requested_date')
            ->update(['requested_date' => DB::raw('request_date')]);
    }

    public function down(): void
    {
        Schema::table('visit_requests', function (Blueprint $table) {
            if (Schema::hasColumn('visit_requests', 'confirmation_code')) {
                $table->dropColumn('confirmation_code');
            }
            if (Schema::hasColumn('visit_requests', 'notification_method')) {
                $table->dropColumn('notification_method');
            }
            if (Schema::hasColumn('visit_requests', 'visit_count')) {
                $table->dropColumn('visit_count');
            }
            if (Schema::hasColumn('visit_requests', 'requested_date')) {
                $table->dropColumn('requested_date');
            }
        });
    }
};
