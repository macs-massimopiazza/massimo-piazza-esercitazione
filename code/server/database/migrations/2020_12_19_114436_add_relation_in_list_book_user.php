<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationInListBookUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('list_book_user', function (Blueprint $table) {
            $table->bigInteger("lettore_id")->unsigned()->nullable();
            $table
                ->foreign("lettore_id")
                ->references("id")
                ->on("users")
                ->onDelete("cascade");
            $table->bigInteger("book_id")->unsigned()->nullable();
            $table
                ->foreign("book_id")
                ->references("id")
                ->on("books")
                ->onDelete("cascade");
            $table->bigInteger("list_id")->unsigned()->nullable();
            $table
                ->foreign("list_id")
                ->references("id")
                ->on("lists")
                ->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('list_book_user', function (Blueprint $table) {
            $table->dropForeign("lettore_id");
            $table->dropColumn("lettore_id");
            $table->dropForeign("book_id");
            $table->dropColumn("book_id");
            $table->dropForeign("list_id");
            $table->dropColumn("list_id");
        });
    }
}
