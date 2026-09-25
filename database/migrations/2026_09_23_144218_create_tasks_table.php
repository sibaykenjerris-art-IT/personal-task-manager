<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id(); //our unique id for each task 
            $table->string('task_name');//a field to store the name of task
            $table->text('discription');//a task discription  to store its discription
            $table->string('status')->default('Pending');//task status to store status ex:PENDING,COMPLETE
            $table->date('due_date');//a feild to store date de of the task
            $table->timestamps();//the amount of time the task created then done ex:created_at,and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
