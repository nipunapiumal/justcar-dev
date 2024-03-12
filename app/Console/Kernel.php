<?php

namespace App\Console;

use App\Models\Customer;
use App\Models\Store;
use App\Models\User;
use App\Models\Utility;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();

        $schedule->call(function () {
            $users = User::all();
            foreach ($users as $user) {
        
                $last_login_at = $user->last_login_at;
        
                if ($last_login_at) {
                    $datetime1 = new \Datetime($last_login_at);
                    $datetime2 = new \Datetime(date('Y-m-d'));
                    $interval = $datetime1->diff($datetime2);
                    $days = $interval->format('%r%a');
        
        
                    if ($days >= 5) {
        
                        // echo "User: " . $user->email . "<br>";
                        $store = Store::find(1);
        
                        try {
                            // $dArr  = [
                            //     'activate_link' => route('store.useractivate', [$slug, $remember_token]),
                            // ];
                            $resp = Utility::sendEmailTemplate('Inactive for 5 Days', $user->email, null, $store, null);
                            // print_r($resp);
                        } catch (\Exception $e) {
                            // print_r($e->getMessage());
                        }
                    }
                }
            }
        
            $customers = Customer::all();
            foreach ($customers as $customer) {
        
                $last_login_at = $customer->last_login_at;
        
                if ($last_login_at) {
                    $datetime1 = new \Datetime($last_login_at);
                    $datetime2 = new \Datetime(date('Y-m-d'));
                    $interval = $datetime1->diff($datetime2);
                    $days = $interval->format('%r%a');
        
        
                    if ($days >= 5) {
        
                        // echo "Customer: " . $user->email . "<br>";
                        $store = Store::find($user->current_store);
        
                        try {
                            // $dArr  = [
                            //     'activate_link' => route('store.useractivate', [$slug, $remember_token]),
                            // ];
                            $resp = Utility::sendEmailTemplate('Inactive for 5 Days', $customer->email, null, $store, null);
                            // print_r($resp);
                        } catch (\Exception $e) {
                            // print_r($e->getMessage());
                        }
                    }
                }
            }
        })->cron('0 0 */5 * *');

        $schedule->call(function () {
            
            //get all users that has premium free trail
            $users = User::where('free_trial_status', "<", 2)->where('is_verified', 1)->get();
            foreach ($users as $user) {
        
                $plan_expire_date = $user->plan_expire_date;
        
                if ($plan_expire_date) {
                    $datetime1 = new \Datetime($plan_expire_date);
                    $datetime2 = new \Datetime(date('Y-m-d'));
        
                    $interval = $datetime2->diff($datetime1);
                    $days = $interval->format('%r%a');
        
                    $store = Store::find($user->current_store);
        
                    try {
                        if ($days == 5) {
                            $resp = Utility::sendEmailTemplate('Premium Trial Ends In 5 Days', $user->email, null, $store, null);
                        } else if ($days == 1) {
                            $resp = Utility::sendEmailTemplate('Premium Trial Ends In 1 Day', $user->email, null, $store, null);
                        } else if ($days == 0) {
                            $resp = Utility::sendEmailTemplate('Premium Trial Has Expired', $user->email, null, $store, null);
                        }
                    } catch (\Exception $e) {
                        print_r($e->getMessage());
                    }
                }
            }

        })->daily();

    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
