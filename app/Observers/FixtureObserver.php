<?php

namespace App\Observers;

use App\Models\Fixture;

class FixtureObserver
{
    /**
     * Handle the Category "created" event.
     */
    public function created(Fixture $fixture): void
    {
        $lastFixture = Fixture::latest()->first();
        if (!$lastFixture) {
            $lastFixture = 0;
        }
        $fixture->code = intval($lastFixture->code) + 1;
    }

    /**
     * Handle the Category "updated" event.
     */
    public function updated(Fixture $fixture): void
    {
        //
    }


    /**
     * @param Fixture $fixture
     * @return void
     */
    public function saving(Fixture $fixture): void
    {

    }

    /**
     * Handle the Category "deleted" event.
     */
    public function deleted(Fixture $fixture): void
    {
        //
    }

    /**
     * Handle the Category "restored" event.
     */
    public function restored(Fixture $fixture): void
    {
        //
    }

    /**
     * Handle the Category "force deleted" event.
     */
    public function forceDeleted(Fixture $fixture): void
    {
        //
    }
}
