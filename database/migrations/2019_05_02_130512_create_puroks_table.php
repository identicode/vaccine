<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Purok;

class CreatePuroksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purok', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('brgy_id');
            $table->timestamps();
        });

        for ($a=1; $a < 14; $a++) { 

            for ($b=1; $b < 8; $b++) { 
               Purok::create([
                    'name' => 'Purok '.$b,
                    'brgy_id' => $a
               ]);
            }
           
        }


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purok');
    }
}
