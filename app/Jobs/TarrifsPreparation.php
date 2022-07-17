<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\DB;

class TarrifsPreparation implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    protected $customer;
    protected $request;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($customer, $request)
    {
        $this->customer = $customer;
        $this->request = $request;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $data = $this->toCollection();
        $total = count($data);

        $queue = [];
        $lists = [];
        $queueSize = 5000;

        for ($i = 1; $i <= $total; $i++) {
            $queue[] = [
                'customer_id' => $this->customer->id,
                'from_postcode' => $data[$i][0],
                'to_postcode' => $data[$i][1],
                'from_weight' => $this->toDouble($data[$i][2]),
                'to_weight' => $this->toDouble($data[$i][3]),
                'cost' => $this->toDouble($data[$i][4]),
                'valid' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ];

            if ($i % $queueSize === 0 || $i == $total) {
                $lists[] = Tarrifs::dispatch($queue);
                $queue = [];
            }

            if ($i % 50000 === 0 || $i == $total) {
                Bus::batch($lists);
                $lists = [];
            }
        }
    }

    public function toCollection()
    {
        $data = array_map(function ($line) {
            return str_getcsv($line, ';');
        }, file(storage_path('/app/' . $this->request)));
        unset($data[0]);

        return $data;
    }

    public  function toDouble($value)
    {
        return (float) str_replace(',', '.', $value);
    }
}
