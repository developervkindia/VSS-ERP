<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Process\Process;

class HandleGitWorkflow extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'git:workflow';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Git workflow to commit and merge branches';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Get the current branch name
        $currentBranch = $this->runGitCommand(['rev-parse', '--abbrev-ref', 'HEAD']);
        $allowedBranches = ['dev_vikas', 'dev_rohit'];

        if (!in_array($currentBranch, $allowedBranches)) {
            $this->error("You are not on an allowed branch (dev_vikas or dev_rohit). Current branch: $currentBranch");
            return 1;
        }

        // Stage all changes
        $this->runGitCommand(['add', '.']);
        $this->info('All changes have been staged.');

        // Ask for commit message
        $commitMessage = $this->ask('Enter a commit message');
        if (!$commitMessage) {
            $this->error('Commit message cannot be empty.');
            return 1;
        }

        // Commit the changes
        $this->runGitCommand(['commit', '-m', $commitMessage]);
        $this->info("Changes have been committed with message: \"$commitMessage\"");

        // Push the changes to the current branch
        $this->runGitCommand(['push', 'origin', $currentBranch]);
        $this->info("Changes have been pushed to branch: $currentBranch");

        // Merge the current branch into master
        $this->runGitCommand(['checkout', 'master']);
        $this->info("Switched to master branch.");

        $this->runGitCommand(['merge', $currentBranch]);
        $this->info("Merged $currentBranch into master.");

        // Push changes to master
        $this->runGitCommand(['push', 'origin', 'master']);
        $this->info('Master branch has been updated.');

        return 0;
    }

    /**
     * Run a Git command and return the output.
     */
    private function runGitCommand(array $command)
    {
        $process = new Process(array_merge(['git'], $command));
        $process->run();

        if (!$process->isSuccessful()) {
            $this->error("Git command failed: " . $process->getErrorOutput());
            exit(1);
        }

        return trim($process->getOutput());
    }
}
