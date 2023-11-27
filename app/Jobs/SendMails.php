<?php

namespace App\Jobs;

use App\Mail\SendUserMail;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class SendMails implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public $data;
    public function __construct($data)
    {
        $this->data =$data;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        foreach($this->data as $data)
        {
            Mail::to($data->order->email)->send(new SendUserMail($data));
        }
    }
}
