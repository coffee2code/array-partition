#!/usr/bin/env bash

if [ $# -lt 3 ]; then
	echo "usage: $0 <db-name> <db-user> <db-pass> <wp-version> <db-host>"
	exit 1
fi

DB_NAME=$1
DB_USER=$2
DB_PASS=$3
WP_VERSION=$4
DB_HOST=$5
WP_TESTS_DIR=${WP_TESTS_DIR:-/tmp/wordpress-tests-lib}

set -ex

# set up testing suite
svn co --ignore-externals --quiet "https://develop.svn.wordpress.org/tags/$WP_VERSION" "$WP_TESTS_DIR"

cd "$WP_TESTS_DIR"
cp wp-tests-config-sample.php wp-tests-config.php
sed -i.bak "s/youremptytestdbnamehere/$DB_NAME/" wp-tests-config.php
sed -i.bak "s/yourusernamehere/$DB_USER/" wp-tests-config.php
sed -i.bak "s/yourpasswordhere/$DB_PASS/" wp-tests-config.php
if [ -n "$DB_HOST" ]; then
	sed -i.bak "s/localhost/$DB_HOST/" wp-tests-config.php
fi
rm -f wp-tests-config.php.bak

# create database
mysqladmin create "$DB_NAME" --user="$DB_USER" --password="$DB_PASS" || true
