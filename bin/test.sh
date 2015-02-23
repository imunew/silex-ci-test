#!/bin/sh -ex
vendor/bin/phpunit -c ./ --coverage-html=$CIRCLE_ARTIFACTS/coverage --log-junit=$CIRCLE_TEST_REPORTS/junit.xml src/App/Test/*Test.php
rm -rf $CIRCLE_ARTIFACTS/phpmd
mkdir $CIRCLE_ARTIFACTS/phpmd
vendor/bin/phpmd src html cleancode,codesize,controversial,design,naming,unusedcode --reportfile $CIRCLE_ARTIFACTS/phpmd/phpmd.html >/dev/null 2>&1
