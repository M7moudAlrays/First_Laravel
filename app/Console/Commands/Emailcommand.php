<?php

namespace App\Console\Commands;

use App\Mail\Sendemail;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class Emailcommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Mail Daily To Every Student';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // $emails = User::slecet('email')->get() ;
        $emails = User::Pluck('email')->toArray() ;
        
        foreach($emails as $email)
        {
            Mail::To($email)->send(new Sendemail()) ;
        }
    }
}
