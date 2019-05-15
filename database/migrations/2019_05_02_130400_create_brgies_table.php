<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Brgy;

class CreateBrgiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brgy', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        Brgy::create([
            'name' => 'I'
        ]);

        Brgy::create([
            'name' => 'II'
        ]);

        Brgy::create([
            'name' => 'III'
        ]);

        Brgy::create([
            'name' => 'IV'
        ]);

        Brgy::create([
            'name' => 'V'
        ]);

        Brgy::create([
            'name' => 'Buhangin'
        ]);

        Brgy::create([
            'name' => 'Calabuanan'
        ]);

        Brgy::create([
            'name' => 'Obligacion'
        ]);

        Brgy::create([
            'name' => 'Pingit'
        ]);

        Brgy::create([
            'name' => 'Reserva'
        ]);

        Brgy::create([
            'name' => 'Sabang'
        ]);

        Brgy::create([
            'name' => 'Suklayin'
        ]);

        Brgy::create([
            'name' => 'Zabali'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('brgy');
    }
}
