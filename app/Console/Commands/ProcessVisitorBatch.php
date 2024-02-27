<?php

namespace App\Console\Commands;

use App\Models\GenerationLog;
use App\Models\Visitor;
use Illuminate\Console\Command;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Services\VisitorProcessingService;

class ProcessVisitorBatch extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */

    protected $signature = 'process:task';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Processes visitors in batches and determines their generation';

    private $visitorProcessingService;

    public function __construct(VisitorProcessingService $visitorProcessingService)
    {
        parent::__construct();
        $this->visitorProcessingService = $visitorProcessingService;
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->visitorProcessingService->processVisitors();
    }
}


