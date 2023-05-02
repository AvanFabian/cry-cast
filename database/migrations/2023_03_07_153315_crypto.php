<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class crypto extends Migration
{
    public function up()
    {
        //Prediksi
        Schema::create('Prediksi', function (Blueprint $table){
            $table->id();
            $table->date('date');
            $table->float('high', 20, 10);
            $table->float('low' , 20, 10);
            $table->float('volume', 20, 2);
        });
        //Tesakurasi
        Schema::create('tesakurasi', function (Blueprint $table){
            $table->id();
            $table->date('date');
            $table->float('high', 20, 10);
            $table->float('low' , 20, 10);
            $table->float('volume', 20, 2);
        });
        //mencari Simple Moving Average
        Schema::create('SMA', function (Blueprint $table){
            $table->id();
            $table->date('date');
            $table->float('sma_high',20,10);
            $table->float('sma_low',20,10);
            $table->float('sma_volume',20 ,2);
        });
        //mencari Simple Moving Average
        Schema::create('Bullish_Berrish', function (Blueprint $table){
            $table->id();
            $table->date('date');
            $table->boolean('Status');
            $table->string('Komen');
        });
        //Threshold naive bayes
        Schema::create('threshold', function (Blueprint $table){
            $table->date('date');
            $table->float('hold_high',20,10);
            $table->float('hold_low',20,10);
            $table->float('hold_volume',20,2);
        });
        // create table bayes
        Schema::create('bayes', function (Blueprint $table){
            $table->id();
            // date
            $table->date('date');
            // format bool
            $table->boolean('high');
            $table->boolean('low');
            $table->boolean('volume');
            // harga bool
            $table->boolean('harga');


        });
        // prediction
        Schema::create('prediction', function (Blueprint $table){
            $table->id();
            $table->date('date');
            $table->boolean('hasil');
        });
        // recall
        Schema::create('recall', function (Blueprint $table){
            $table->id();
            $table->boolean('hasil');
        });
        // precision
        Schema::create('precision', function (Blueprint $table){
            $table->id();
            $table->boolean('hasil');
        });
        // f1 score
        Schema::create('f1_score', function (Blueprint $table){
            $table->id();
            $table->float('hasil', 20, 10);
        });
        // err rate
        Schema::create('err_rate', function (Blueprint $table){
            $table->id();
            $table->date('date');
            $table->float('err_rate', 20, 10);
        });
    }
    public function down()
    {
        Schema::dropIfExists('prediksi');
        Schema::dropIfExists('tesakurasi');
        Schema::dropIfExists('SMA');
        Schema::dropIfExists('Bullish_Berrish');
        Schema::dropIfExists('threshold');
        Schema::dropIfExists('naive_bayes');
        Schema::dropIfExists('bayes');
        Schema::dropIfExists('prediction');
        Schema::dropIfExists('recall');
        Schema::dropIfExists('precision');
        Schema::dropIfExists('err_rate');

    }
}
