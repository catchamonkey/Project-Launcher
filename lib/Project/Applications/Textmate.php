<?php
namespace Project\Applications;

/**
 * Launches textmate at the supplied file location
 * @author Chris Sedlmayr (catchamonkey) <chris@sedlmayr.co.uk>
 */
class Textmate
{
    public function launch($args)
    {
        echo "Launching Textmate at file location: ".$args."\n";
        exec('mate '.$args);
    }
}