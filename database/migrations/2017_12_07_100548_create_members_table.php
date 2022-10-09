<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            
            $table->increments('id');
            
            // Personal
            $table->string('names');
            $table->string('lastnames');
            $table->string('fullname');
            $table->enum('gender', ['f','m']);
            $table->date('birthday')->nullable();
            $table->string('citizenship')->nullable();
            $table->enum('marital_status', [
                'singular',
                'matrimonio',
                'separacion',
                'divorcio',
                'viudez',
                'union libre',
            ])->nullable();
           
            // Contact
            $table->string('address', 200)->nullable();
            $table->string('postcode')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->string('homephone')->nullable();
            $table->string('mobilephone')->nullable();
            $table->string('email')->nullable();
            $table->text('emergency');

            // Additional
            $table->text('professions')->nullable();
            $table->text('occupations')->nullable();
            // $table->text('notes')->nullable();
           
            $table->date('registered');
            $table->unsignedTinyInteger('is_active');
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
