#!/usr/bin/env bash

# cd up one directory from this script to the datahub root
DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"
cd $DIR/../public

echo "working in " `pwd`

# get dependencies
bower install

# build project
polymer build --html.collapseWhitespace
