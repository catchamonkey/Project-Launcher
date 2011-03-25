<?php
namespace Project\Applications;

/**
 * Launches a new Terminal tab then changes directory
 * @author Chris Sedlmayr (catchamonkey) <chris@sedlmayr.co.uk>
 */
class Terminal
{
    public function launch($args)
    {
        echo "Launching new Terminal tab at location: ".$args."\n";
        // give the previous command (if any) a chance to finish execution
        sleep(2);
        $command = <<<EOF
/usr/bin/osascript <<EOF
activate application "Terminal"
tell application "System Events"
    keystroke "t" using {command down}
end tell
tell application "Terminal"
    repeat with win in windows
        try
            if get frontmost of win is true then
                do script "cd $args" in (selected tab of win)
            end if
        end try
    end repeat
end tell
EOF;
        exec($command);
    }
}