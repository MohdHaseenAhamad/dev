<?php

namespace Crater\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class GenerateDebitNotePdfJob implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    public $debit;

    public $deleteExistingFile;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($debit, $deleteExistingFile = false)
    {
        $this->debit = $debit;
        $this->deleteExistingFile = $deleteExistingFile;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->debit->generatePDF('debit', $this->debit->debit_number, $this->deleteExistingFile);

        return 0;
    }
}