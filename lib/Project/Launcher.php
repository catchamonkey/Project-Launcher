<?php
namespace Project;

/**
 * Main Launcher
 * @author Chris Sedlmayr (catchamonkey) <chris@sedlmayr.co.uk>
 */
class Launcher
{
    private $_args;
    
    public function __construct()
    {
        $this->_args = NULL;
    }

    public function run()
    {
        // fetch the app name
        global $argv;
        if (isset($argv[1]))
        {
            $name = $argv[1];
            // fetch the config based on the name
            $file = __DIR__."/../definitions/".$name.".json";
            if (file_exists($file))
            {
                $json = file_get_contents($file);
                $runners = json_decode($json);
                foreach ($runners as $program => $arguments)
                {
                    // get the program
                    $program = ucfirst(strtolower($program));
                    $appName = "Project\\Applications\\".$program;
                    if (class_exists($appName))
                    {
                        $app = new $appName;
                        $app->launch($arguments);
                    }
                    else
                    {
                        echo "Found application defined as ".$program.
                             ", but no Launcher class exists\n";
                    }
                }
            }
            else
            {
                exit("Launch config name of '".$name."' does not exist\n");
            }
         }
        else
        {
            exit("Must supply name of launch config\n");
        }
    }
}