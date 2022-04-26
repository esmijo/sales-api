<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->string("BRANCH_SOLD")->nullable();
            $table->string("GROUP_CODE")->nullable();
            $table->string("BRAND")->nullable();
            $table->string("DATE")->nullable();
            $table->string("CUSTOMER_NAME")->nullable();
            $table->string("PS")->nullable();
            $table->string("MODEL")->nullable();
            $table->string("SERIAL")->nullable();
            $table->string("SI_TRANS_NO")->nullable();
            $table->string("INFO_SLIP_VSO_RR_RELEASED")->nullable();
            $table->string("RR_RECEIVE_DELIVER")->nullable();
            $table->string("SALE_AMOUNT")->nullable();
            $table->string("PAYMENT_TYPE")->nullable();
            $table->string("PACKAGE")->nullable();
            $table->string("REMARKS")->nullable();
            $table->string("DR_NO")->nullable();
            $table->string("TYPE")->nullable();
            $table->string("STATUS")->nullable();
            $table->string("TAG_AS_PENDING")->nullable();
            $table->string("DATE_CREATED")->nullable();
            $table->string("LAST_UPDATED_BY")->nullable();
            $table->string("LAST_UPDATED_DATE")->nullable();
            $table->string("PROOF")->nullable();
            $table->string("DR_DATE")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reports');
    }
};
