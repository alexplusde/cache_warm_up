# Cache Warm Up - Heizt REDAXO CMS ordentlich ein! 🥵

## Features

![www redaxo local_redaxo_index php_page=system_cache_warm_up (2)](https://user-images.githubusercontent.com/3855487/210570361-486d88c0-5a1a-40ad-bd0f-a1a781dcde00.png)

### Vollständiges Warm Up aller URLs

Dadurch, dass die `sitemap.xml`-Einträge einer REDAXO-Website (mit installiertem YRewrite) durchlaufen werden, werden alle Online-Artikel einschließlich URLs aufgerufen, die durch das URL-Addon generiert werden.

### Status-Codes

Cache Warm Up bricht nicht ab, wenn ein Artikel oder eine URL nicht funktioniert. Stattdessen wird der Fehlercode ausgewertet und in das Log geschrieben. So kann Warm Up alle URLs durchlaufen und bricht nicht mittendrin ab.

### Effizienter Bildcache nur mit verwendeten Bild-Profil-Kombinationen generieren

Cache Warm Up generiert Bilder nicht auf Vorrat. Stattdessen empfehle ich, das Addon `media_manager_responsive` zu verwenden. Die Idee dahinter ist einfach: Alle benötigten Bildprofil-Kombinationen liegen bereits im Artikel vor - wird dieser aufgerufen, werden die durch `media_manager_responsive` eingebettete Bilder automatisch generiert.

Das spart Speicherplatz und ist effizienter.

### geplant: Warm Up einzelner URLs und Artikel via EP

Unterstütze dieses Addon mit einer Beauftragung des Autors, um dieses Feature umzusetzen.

## Lizenz

MIT Lizenz, siehe [LICENSE.md](https://github.com/alexplusde/cache_warm_up/blob/master/LICENSE.md)  

## Autoren

**Alexander Walther**  
http://www.alexplus.de  
https://github.com/alexplusde  

**Projekt-Lead**  
[Alexander Walther](https://github.com/alexplusde)

## Credits
