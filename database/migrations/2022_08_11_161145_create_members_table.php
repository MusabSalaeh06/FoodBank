<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id('member_id');
            $table->string('email')->nullable();
            $table->string('pass')->nullable();
            $table->string('password')->nullable();
            $table->string('name')->nullable();
            $table->string('surname')->nullable();
            $table->string('tel')->nullable();
            $table->string('card_id')->nullable();
            $table->string('profile')->nullable();
            $table->string('type')->nullable();
            $table->string('county')->nullable();
            $table->string('road')->nullable();
            $table->string('alley')->nullable();
            $table->string('house_number')->nullable();
            $table->string('group_no')->nullable();
            $table->string('sub_district')->nullable();
            $table->string('district')->nullable();
            $table->string('province')->nullable();
            $table->string('ZIP_code')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('members');
    }
}
