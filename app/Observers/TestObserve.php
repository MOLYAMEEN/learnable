<?php

namespace App\Observers;

use App\Models\Test;

class TestObserve
{
    /**
     * Handle the Test "created" event.
     */

     public function creating(Test $test): void//بعد الاضافة نقدر نعمل قيمه معينه  ةتضيفها على كولوم مخصص او على  او كولم انت بتضيف عليه
    {
        $test->name = 'this name from creating method ';
       

    }
    public function created(Test $test): void//بعد الاضافة نقدر نعمل قيمه معينه  ةتضيفها على كولوم مخصص او على  او كولم انت بتضيف عليه
    {
        $test->my_soft_delete= now();//we take it my_soft_delete from create_taste_table
        $test->name = 'this name from create method ';
        $test->save();

    }

    /**
     * Handle the Test "updated" event.
     */

     public function updated(Test $test): void
    {
       // $test->name= ''
    }

     /**
     * Handle the Test "updating" event.
     */
    public function updating (Test $test): void
    {
        $test->name= 'this name from creating method ';
    }

    /**
     * Handle the Test "deleted" event.
     */

     public function saving(Test $test): void
    {
        $test->name= 'this name from saving method ';
        
    }

    public function saved(Test $test): void
    {
        $test->name= 'this name from saved method ';
        
    }


    public function deleted(Test $test): void
    {
        //
    }

    /**
     * Handle the Test "restored" event.
     */
    public function restored(Test $test): void
    {
        //
    }

    /**
     * Handle the Test "force deleted" event.
     */
    public function forceDeleted(Test $test): void
    {
        //
    }
}
