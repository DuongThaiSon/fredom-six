<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Process\Process;

class RestoreDatabaseBackupCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'backup:restore {--filepath=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Restore a database backup';

    /** @var string */
    protected $dbName;

    /** @var string */
    protected $userName;

    /** @var string */
    protected $password;

    /** @var int */
    protected $timeout = 0;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->dbName = env('DB_DATABASE');
        $this->userName = env('DB_USERNAME');
        $this->password = env('DB_PASSWORD');
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info('Starting restore...');

        $command = $this->getRestoreCommand($this->option('filepath'));
        $this->info($command);
        $process = Process::fromShellCommandline($command, null, null, null, $this->timeout);
        $process->run();

        if (! $process->isSuccessful()) {
            $this->error("Restore failed because: {$process->getExitCodeText()} : {$process->getErrorOutput()}");
        } else {
            $this->info("Restore complete!");
        }

        return;
    }

    protected function getRestoreCommand(string $dumpFile): string
    {
        $command = [
            "mysql",
            "-u {$this->userName}",
            "-p{$this->password}",
            $this->dbName,
            "<",
            $dumpFile
        ];

        return implode(" ", $command);
    }
}
