#!/usr/bin/env bash

ARGS="$@"

# Based on: https://www.drupal.org/docs/develop/automated-testing/phpunit-in-drupal/running-phpunit-tests#s-configure-phpunit

# Copy Drupal core phpunit config.
cp web/core/phpunit.xml.dist web/core/phpunit.xml

# Configure it for Lando.
sed -i 's/<env name=\"SIMPLETEST_BASE_URL\" value=\"\"\/>/<env name=\"SIMPLETEST_BASE_URL\" value=\"http:\/\/drupal102\.lndo\.site\"\/>/' /app/web/core/phpunit.xml
sed -i 's/<env name=\"SIMPLETEST_DB\" value=\"\"\/>/<env name=\"SIMPLETEST_DB\" value=\"mysql:\/\/drupal10:drupal10@database\/drupal10\"\/>/' /app/web/core/phpunit.xml
sed -i 's/<env name=\"BROWSERTEST_OUTPUT_DIRECTORY\" value=\"\"\/>/<env name=\"BROWSERTEST_OUTPUT_DIRECTORY\" value=\"\/app\/reports\/phpunit\/\"\/>/' /app/web/core/phpunit.xml
mkdir -p reports/phpunit
sed -i 's/<env name=\"BROWSERTEST_OUTPUT_BASE_URL\" value=\"\"\/>/<env name=\"BROWSERTEST_OUTPUT_BASE_URL\" value=\"http:\/\/drupal102\.lndo\.site\"\/>/' /app/web/core/phpunit.xml

# Delete previous results.
rm web/sites/simpletest/browser_output/*.html
rm web/sites/simpletest/browser_output/*.counter

# Run phpunit using Drupal core config.
vendor/bin/phpunit -c web/core $ARGS