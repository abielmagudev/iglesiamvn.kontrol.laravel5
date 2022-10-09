<?php

// Get picture member, if not exists picture then set default picture male or female
if(! function_exists('getPictureMember') )
{
    function getPictureMember($member)
    {
        $extensions = array('jpeg','jpg','png');

        foreach($extensions as $ext)
        {
            $file = "{$member->id}.{$ext}";
            if( Storage::disk('pictures')->exists($file) )
            {
                return asset('pictures/'.$file);
                break;
            }
        }
    
        return $member->gender === 'm' ? asset('pictures/male.jpg') : asset('pictures/female.jpg');
        // Storage::disk('public') with link-symbolic
    }
}

if(! function_exists('getRouteName') )
{
    function getRouteName()
    {
        return request()->route()->getName();
    }
}

if(! function_exists('routeIs') )
{
    function routeIs($path, $action = '*')
    {
        return request()->routeIs("{$path}.{$action}");
    }
}

if(! function_exists('isRoute') )
{
    function isRoute($path)
    {
        list($name, $action) = explode('.', $path);
        return strpos( request()->route()->getName(), $name ) !== false ? 1 : 0;
    }
}

if(! function_exists('setQueryString') )
{
    function queryStringUrl($params)
    {
        if(! is_array($params) )
            return;
        
        $query = array();
        foreach($params as $var => $value)
        {
            array_push($query, "{$var}={$value}");
        }

        return implode('&', $query);
    }
}

if(! function_exists('paginationInstance') )
{
    function paginationInstance ($records, $params = false)
    {
        $previous_page_url = $records->previousPageUrl();
        $next_page_url     = $records->nextPageUrl();

        if( $query_string = queryStringUrl($params) )
        {
            if(! is_null($previous_page_url) )
                $previous_page_url .= "&{$query_string}";

            if(! is_null($next_page_url) )
                $next_page_url .= "&{$query_string}";
        }

        return (object) array(
            'previous' => $previous_page_url ,
            'next' => $next_page_url,
            'current' => $records->currentPage(),
        );
    }
}