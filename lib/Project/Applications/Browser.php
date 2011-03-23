<?php
namespace Project\Applications;

/**
 * Launches the default browser at the supplied location
 * @author Chris Sedlmayr (catchamonkey) <chris@sedlmayr.co.uk>
 */
class Browser
{
    public function launch($args)
    {
        echo "Launching Browser at location: ".$args."\n";
        exec('open '.$args);
    }
}