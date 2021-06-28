<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToDependenteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dependente', function (Blueprint $table) {
            $table->foreign('id_cadastro', 'id_cad_FK')->references('id')->on('cadastro')->onUpdate('RESTRICT')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dependente', function (Blueprint $table) {
            $table->dropForeign('id_cad_FK');
        });
    }
}
