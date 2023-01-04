<?php

class rex_api_cache_warm_up extends rex_api_function
{
    protected $published = true;

    public function execute()
    {
        header('Content-Type: text/event-stream');
        header('Cache-Control: no-cache');
 

        if (rex_get('url', 'string')) {
            cache_warm_up::warm_up(rex_get('url', 'string'));
            exit;
        }

        $urls = cache_warm_up::getSitemapUrls();
        $total = count($urls);

        $id = 1;
        $success = 0;
        $error = 0;
                
        foreach ($urls as $url) {
            $response = cache_warm_up::warm_up($url);
            if ($response->isOk()) {
                self::sendMessage($id, $url, '🤩', $response->getStatusCode(), 'erfolgreich', ++$success, $total);
            } else {
                self::sendMessage($id, $url, '🤔', $response->getStatusCode(), 'nicht erfolgreich', ++$error, $total);
            }
            $id++;
        }

        self::sendMessage('✅', '', '', '', '', '', '');
        exit;
    }


    private static function sendMessage($id, $url, $emoji, $status, $message, $progress, $total)
    {
        $d = array('url' => $url, 'emoji' => $emoji ,'status' => $status ,'message' => $message , 'progress' => $progress, 'total' => $total);
 
        echo "id: $id" . PHP_EOL;
        echo "data: " . json_encode($d) . PHP_EOL;
        echo PHP_EOL;
 
        ob_flush();
        flush();
    }
}
