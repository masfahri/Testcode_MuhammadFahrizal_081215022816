<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewTotalHargaByIdFromOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::select(DB::raw("CREATE VIEW viewTotalHargabyIDFromOrders AS
        SELECT
            `laravelbase`.`orders`.`user_id` AS `user_id`,
            SUM(`laravelbase`.`orders`.`total_bayar`) AS `total_bayar`,
            SUM(`laravelbase`.`orders`.`bayar`) AS `bayar`,
            SUM(`laravelbase`.`orders`.`bayar`) - SUM(`laravelbase`.`orders`.`total_bayar`) AS `kembalian`
        FROM
            `laravelbase`.`orders`
        GROUP BY
            `laravelbase`.`orders`.`user_id`
        "));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW viewTotalHargabyIDFromOrders");
    }
}
