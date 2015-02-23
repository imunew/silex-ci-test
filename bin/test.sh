vendor/bin/phpunit -c ./ --coverage-html=$CIRCLE_ARTIFACTS/coverage --log-junit=$CIRCLE_TEST_REPORTS/junit.xml src/App/Test/*Test.php
vendor/bin/phpmd src html cleancode,codesize,controversial,design,naming,unusedcode --reportfile $CIRCLE_ARTIFACTS/phpmd/phpmd.html
