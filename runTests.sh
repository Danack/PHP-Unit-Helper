#!/usr/bin/env bash

set -e
# set -x


bash runCodeSniffer.sh

# rerun unit tests to get the stats again, to save scrolling...
sh runUnitTests.sh

echo "Tests completed without problem"
