<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Member;

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
            $table->string('name');
            $table->string('lastname');
            $table->string('fullname');
            $table->date('birthday')->nullable();
            $table->string('citizenship')->nullable();
            $table->enum('gender', Member::genderKeys());
            $table->enum('marital_status', Member::maritalStatusKeys())->nullable();
           
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
            $table->text('notes')->nullable();
           
            $table->date('registered_at');
            $table->unsignedTinyInteger('is_active');
            $table->timestamps();

            // Indexes
            $table->index([
                'fullname', 
                'marital_status',
                'homephone', 
                'mobilephone'
            ]);
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
