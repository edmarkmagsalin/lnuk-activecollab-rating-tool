<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \ActiveCollab\SDK\Authenticator\Cloud;

class ActiveCollabController extends Controller
{
    public function index() {
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
            $projects = $client->get('projects')->getJson();
            foreach($projects as $project) {
                $tasks = $client->get('projects/'.$project['id'].'/tasks');
            }
            
        } else {
            print "Invalid response\n";
            die();
        }

        
    }
}
