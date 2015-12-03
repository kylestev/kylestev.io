<?php

namespace Kylestev\Jobs;

use GrahamCampbell\GitHub\Facades\GitHub;
use Illuminate\Contracts\Bus\SelfHandling;
use Kylestev\Jobs\Job;

class FetchGitHubReposForUser extends Job implements SelfHandling
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($username)
    {
        $this->username = $username;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(\Closure $filter = null)
    {
        $repos = collect(GitHub::user()->repositories($this->username))
            ->map(function ($repo) {
                $repo['commits'] = GitHub::repo()->commits()->all($repo['owner']['login'], $repo['name'], array('sha' => 'master'));
                foreach (array_keys($repo) as $key) {
                    if (ends_with($key, '_url') && $key !== 'html_url') {
                        unset($repo[$key]);
                    }
                }
                return $repo;
            });

        if ( ! is_null($filter)) {
            $repos = $repos->filter($filter);
        }

        return $repos;
    }
}
