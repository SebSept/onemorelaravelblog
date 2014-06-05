#!/bin/env php
<?php
/**
 * test if cached post request is empty or not
 * @warning : Require cache to be set on anything but 'array'
 * 
 * @return int 0 (ok) 1 (failure) 125 (can't test) - do not change this values (used by git-bisect)
 */
`sudo rm -Rf /home/seb/dev/htdocs/perso/lblog/app/storage/cache/*`;
`wget http://localhost/perso/lblog/public/aut-ex-accusantium-quo-tenetur-harum -q -O /tmp/o`;
`wget http://localhost/perso/lblog/public/aut-ex-accusantium-quo-tenetur-harum -O /tmp/o -o /tmp/h`;

$headers = file_get_contents('/tmp/h');
if(strpos($headers, '404 Not Found')) {
    print '404';
    exit(125);
}

$file = file_get_contents('/tmp/o');
if(strlen($file) > 50 ){
    print 'ok';
    exit(0);
}
print 'echec';
exit(1);
    