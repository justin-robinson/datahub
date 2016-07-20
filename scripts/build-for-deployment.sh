#!/usr/bin/env bash

Color_Off="\033[0m"       # Text Reset
BBlack="\033[1;30m"       # Black
On_Green="\033[42m"       # Green

# cd up one directory from this script to the datahub root
DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"
cd ${DIR}/..

echo "working in " `pwd`

# get dependencies
echo -e ${BBlack}${On_Green}"Installing dependencies"${Color_Off}
bower cache clean
bower install --production

# build project
echo -e ${BBlack}${On_Green}"Building"${Color_Off}
(cd public && exec polymer build --html.collapseWhitespace)
rsync -a public/build/unbundled/ public/
