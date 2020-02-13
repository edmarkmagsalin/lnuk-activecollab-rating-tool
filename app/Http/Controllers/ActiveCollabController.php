<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \ActiveCollab\SDK\Authenticator\Cloud;

class ActiveCollabController extends Controller
{
    public function projects() {
        $authenticator = new Cloud('ACME Inc', 'My Awesome Application', 'ejmagsalin@straightarrow.com.ph', 'SACmaestro.0229');
        
        $accounts = $authenticator->getAccounts();
        $accountID = null;
        foreach($accounts as $accountID=>$account) {
            $accountID = $accountID;
        }
        
        // Issue a token for account #123456789.
        $token = $authenticator->issueToken($accountID);

        // Did we get it?
        if ($token instanceof \ActiveCollab\SDK\TokenInterface) {
            // print $token->getUrl() . "\n";
            // print $token->getToken() . "\n";
            $client = new \ActiveCollab\SDK\Client($token);
            // $projects = $client->get('projects')->getJson();

            // $tasks = [];

            // foreach($projects as $project) {
            //     $tasks[] = $client->get('projects/'.$project['id'].'/tasks');
            // }

            // foreach ($tasks as $task) {
            //     dd($task);
            // }

            $projects = $client->get('projects/');

            dd($projects);
            
        } else {
            print "Invalid response\n";
            die();
        }

        
    }
    public function tasks() {
        $authenticator = new Cloud('ACME Inc', 'My Awesome Application', 'ejmagsalin@straightarrow.com.ph', 'SACmaestro.0229');
        
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
