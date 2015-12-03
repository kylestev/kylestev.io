<?php

namespace Kylestev\API\V1\Controllers;

use Illuminate\Contracts\Cache\Repository as Cache;
use Kylestev\Jobs\FetchGitHubReposForUser;

class RepoController extends BaseController
{

    protected $cache;

    public function __construct(Cache $cache)
    {
        // parent::__construct();
        $this->cache = $cache;
    }

    public function index()
    {
        $repos = collect($this->cache->remember('repos:github', 15, function () {
            $repoFilter = function ($repo) {
                return ! $repo['fork'] && ! $repo['private'];
            };

            return (new FetchGitHubReposForUser('kylestev'))->handle($repoFilter)
                ->map(function ($repo) {
                    $repo['owner'] = $repo['owner']['login'];
                    $commits = collect($repo['commits']);
                    $repo['commits'] = collect($commits->groupBy('author.login'))
                        ->map(function ($commits) {
                            return sizeof($commits);
                        });
                    return $repo;
                })
                ->values()
                ->toArray();
        }));

        return response()->json(['data' => $repos]);
    }

}
