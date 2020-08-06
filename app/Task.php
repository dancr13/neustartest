<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('description');
            $table->timestamps();
        });
    }
}
