<?php

namespace ElasticQueue;

use Illuminate\Console\Command;
use Log;

class QueueListCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'queue:list
                                       {connection? : The name of the queue connection to work}
                                       {--queue= : The names of the queues to work}
                                       {--next : show next available job only}
                           ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'List Job Queue';

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
     * Certain documents are too large to be rendered by the fpm version
     * of PHP in response to a web request.
     * Those documents should be added here to render from the command line.
     *
     * @return mixed
     */
    public function handle()
    {
        $connection = $this->argument('connection') ?: $this->laravel['config']['queue.default'];

        // We need to get the right queue for the connection which is set in the queue
        // configuration file for the application. We will pull it based on the set
        // connection being run for the queue operation currently being executed.
        $queue = $this->getQueue($connection);

        if ($this->options('next')['next'] === true) {
            dd( \Queue::next( $queue ) );
        } else {
            print \Queue::list( $queue );
        }
    }

    protected function getQueue($connection)
        {
                    return $this->option('queue') ?: $this->laravel['config']->get(
                                "queue.connections.{$connection}.queue", 'default'
                                        );
                        }

}
