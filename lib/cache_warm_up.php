<?php
class cache_warm_up
{
    public static function warm_up($url)
    {
        if (!$url) {
            return;
        }
        if (rex_addon::get('url')->isAvailable() && rex_config::get('maintenance', 'frontend_aktiv') == "Aktivieren") {
            $url .= "?secret=".rex_config::get('maintenance', 'frontend_aktiv');
        }
        try {
            $socket = rex_socket::factoryUrl($url);
            $response = $socket->doGet();
            $response->getBufferedBody();
            return $response;
        } catch(rex_socket_exception $e) {
            return $e->getMessage();
        }
    }

    public static function getSitemapAsJson($domain)
    {
        $sitemap = @simplexml_load_file($domain . "sitemap.xml");
        if ($sitemap) {
            return json_decode(json_encode($sitemap), true);
        }
    }

    public static function getSitemaps()
    {
        $domains = rex_yrewrite::getDomains();

        $sitemaps = [];
        foreach ($domains as $domain) {
            $sitemaps[$domain->getUrl()] = self::getSitemapAsJson($domain->getUrl());
        }

        return $sitemaps;
    }

    public static function getSitemapUrls()
    {
        $sitemaps = cache_warm_up::getSitemaps();

        $urls = [];
        foreach ($sitemaps as $sitemap) {
            if ($sitemap && array_key_exists('url', $sitemap)) {
                $count = count($sitemap['url']);
                foreach ($sitemap['url'] as $url) {
                    $urls[] = $url['loc'];
                }
            }
        }
        return $urls;
    }
}
