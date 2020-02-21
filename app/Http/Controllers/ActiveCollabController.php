<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ActiveCollabController extends Controller
{
    public function projects() {
        $authenticator = new \ActiveCollab\SDK\Authenticator\Cloud('StraightArrow Corporation', 'ActiveCollab Rating Tool', 'ejmagsalin@straightarrow.com.ph', 'SACmaestro.0229');

        // Assign the account ID
        $accountID = key($authenticator->getAccounts());
        // dd($accountID); // 176953

        // Issue a token for account ID
        $token = $authenticator->issueToken($accountID);
        // dd($token); // 159-nEBWWWm4zspGWBuKXDXuRItyPQWtqF7Y7ISZU59F (dynamic??)

        // Did we get what we asked for?
        if ($token instanceof \ActiveCollab\SDK\TokenInterface) {

            // Construct client
            $client = new \ActiveCollab\SDK\Client($token);
            // dd($client); // Client Object containing token and url




            // $projects = $client->get('projects')->getJson();

            // $tasks = [];

            // foreach($projects as $project) {
            //     $tasks[] = $client->get('projects/'.$project['id'].'/tasks');
            // }

            // foreach ($tasks as $task) {
            //     dd($task);
            // }

            $projects = $client->get('projects/names');

            // $projects->

            dd($projects);

        } else {
            print "Invalid response\n";
            die();
        }


    }
    public function tasks() {
        $authenticator = new \ActiveCollab\SDK\Authenticator\Cloud('StraightArrow Corporation', 'ActiveCollab Rating Tool', 'ejmagsalin@straightarrow.com.ph', 'SACmaestro.0229');

        $accounts = $authenticator->getAccounts();
        $accountID = null;
        foreach($accounts as $accountID=>$account) {
            $accountID = $accountID;
        }

        // Issue a token for account #123456789.
        $token = $authenticator->issueToken($accountID);

        // Did we get it?
        if ($token instanceof \ActiveCollab\SDK\TokenInterface) {
            $client = new \ActiveCollab\SDK\Client($token);
            $tasks = $client->get('projects/3727/tasks');
            dd($tasks);
        } else {
            print "Invalid response\n";
            die();
        }


    }
}
