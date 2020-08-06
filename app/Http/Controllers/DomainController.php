<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Domains;

class DomainController extends Controller
{
    public function store(Request $request)
    {
        if(empty($request->all()) ||  empty($request->all()['domains']) )
        {
            return response()->json('Empty Domains', 404);
        }

        $domainsUrls = $request->all()['domains'];
        $domainsUrls =  array_unique($domainsUrls);
        $domainsInfo  = [];
        foreach($domainsUrls as $domainUrl)
        {
               if($this->domainExists($domainUrl))
               {
                   array_push($domainsInfo, $this->getDomainInfoByHost($domainUrl));
               }
               else
               {
                   $dnsLookups = $this->getDomainLookup($domainUrl);
                   foreach($dnsLookups as $dnsLookup)
                   {
                       $domain = new Domains();
                       $domain->host = $dnsLookup['host'];
                       $domain->type = $dnsLookup['type'];
                       $domain->class = $dnsLookup['class'];
                       $domain->ttl = $dnsLookup['ttl'];
                       $domain->save();
                   }
               }
        }
        return response()->json($domainsInfo, 201);
    }

    private function getDomainLookup($domainUrl)
    {
         return dns_get_record($domainUrl);
    }

    private function getDomainInfoByHost($domainUrl)
    {
        return Domains::where('host',$domainUrl)->get();
    }

    private function domainExists($domainUrl)
    {
        return Domains::where('host',$domainUrl)->exists();
    }

    private function validateDomainName($domainUrl)
    {
        if (filter_var('http://'.$domainUrl, FILTER_VALIDATE_URL)) {
            return true;
        } else {
            return false;
        }
    }
}
