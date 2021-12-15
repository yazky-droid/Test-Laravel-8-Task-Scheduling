<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use App\Notifications\TestEnrollment;

class DailyMessage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'message:everyminute';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Artisan command to send daily messages';

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
    $user = User::first();

    $enrollmentData = [
        'body' => 'You received a new test notification',
        'enrollmentText' => 'You are allowed to enroll',
        'url' => ('/'),
        'thankyou' => 'Thank you, you have 14 days to enroll'
    ];

    $user->notify(new TestEnrollment($enrollmentData));
    }
}
