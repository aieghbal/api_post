<?php

namespace Database\Seeders;

use App\Jobs\InsertPostBatchJob;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $total = 10000;
        $batchSize = 100;
        $batches = $total / $batchSize;

        for ($i = 0; $i < $batches; $i++) {
            InsertPostBatchJob::dispatch($batchSize);
        }
    }
}
