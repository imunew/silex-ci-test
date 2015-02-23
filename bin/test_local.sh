#!/bin/sh -ex
vendor/bin/phpunit -c ./ --coverage-html=var/report/coverage --log-junit=var/report/junit.xml src/App/Test/*Test.php
rm -rf var/report/phpmd
mkdir var/report/phpmd
vendor/bin/phpmd src html cleancode,codesize,controversial,design,naming,unusedcode --reportfile var/report/phpmd/phpmd.html >/dev/null 2>&1
