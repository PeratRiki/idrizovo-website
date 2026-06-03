<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('contact_messages', function (Blueprint $table) {
            $table->index('is_read', 'contact_messages_is_read_index');
            $table->index('priority', 'contact_messages_priority_index');
            $table->index('created_at', 'contact_messages_created_at_index');
        });

        Schema::table('visit_requests', function (Blueprint $table) {
            if (!Schema::hasColumn('visit_requests', 'requested_date')) {
                return;
            }
            $table->index('requested_date', 'visit_requests_requested_date_index');
            $table->index('status', 'visit_requests_status_index');
            $table->index(['requested_date', 'status'], 'visit_requests_requested_date_status_index');
            if (Schema::hasColumn('visit_requests', 'requested_time')) {
                $table->index('requested_time', 'visit_requests_requested_time_index');
            }
        });

        Schema::table('novosti', function (Blueprint $table) {
            $table->index('is_active', 'novosti_is_active_index');
            $table->index('published_at', 'novosti_published_at_index');
            $table->index(['is_active', 'published_at'], 'novosti_active_published_index');
        });

        Schema::table('handmade_items', function (Blueprint $table) {
            $table->index('sort_order', 'handmade_items_sort_order_index');
            $table->index('is_active', 'handmade_items_is_active_index');
        });
    }

    public function down(): void
    {
        Schema::table('contact_messages', function (Blueprint $table) {
            $table->dropIndex('contact_messages_is_read_index');
            $table->dropIndex('contact_messages_priority_index');
            $table->dropIndex('contact_messages_created_at_index');
        });

        Schema::table('visit_requests', function (Blueprint $table) {
            if (!Schema::hasColumn('visit_requests', 'requested_date')) {
                return;
            }
            $table->dropIndex('visit_requests_requested_date_index');
            $table->dropIndex('visit_requests_status_index');
            $table->dropIndex('visit_requests_requested_date_status_index');
            if (Schema::hasColumn('visit_requests', 'requested_time')) {
                $table->dropIndex('visit_requests_requested_time_index');
            }
        });

        Schema::table('novosti', function (Blueprint $table) {
            $table->dropIndex('novosti_is_active_index');
            $table->dropIndex('novosti_published_at_index');
            $table->dropIndex('novosti_active_published_index');
        });

        Schema::table('handmade_items', function (Blueprint $table) {
            $table->dropIndex('handmade_items_sort_order_index');
            $table->dropIndex('handmade_items_is_active_index');
        });
    }
};
