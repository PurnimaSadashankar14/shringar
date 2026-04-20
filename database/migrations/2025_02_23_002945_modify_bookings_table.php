<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB; // Ensure DB is imported

class ModifyBookingsTable extends Migration
{
    public function up()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->unsignedBigInteger('package_id')->nullable()->change();
            $table->unsignedBigInteger('service_id')->nullable()->change();
        });

        // Use DB::statement() to avoid warnings
        DB::statement('ALTER TABLE bookings ADD CONSTRAINT chk_package_or_service CHECK ((package_id IS NOT NULL AND service_id IS NULL) OR (service_id IS NOT NULL AND package_id IS NULL))');
    }

    public function down()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->unsignedBigInteger('package_id')->nullable(false)->change();
            $table->unsignedBigInteger('service_id')->nullable(false)->change();
        });

        DB::statement('ALTER TABLE bookings DROP CONSTRAINT chk_package_or_service');
    }
}
?>
