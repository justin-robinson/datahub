#!/usr/bin/env bash

Color_Off="\033[0m"       # Text Reset
BBlack="\033[1;30m"       # Black
On_Green="\033[42m"       # Green

Build_Dir="public/build"

# cd up one directory from this script to the datahub root
DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"
cd ${DIR}/..

echo "working in " `pwd`

rm -rf ${Build_Dir}

# update to latest npm
echo -e ${BBlack}${On_Green}"Installing npm"${Color_Off}
npm install npm

# use all tools in npm bin directory
export PATH=`pwd`/node_modules/.bin:$PATH

# install node_modules
echo -e ${BBlack}${On_Green}"Installing node modules"${Color_Off}
npm install

# get bower dependencies
echo -e ${BBlack}${On_Green}"Installing bower components"${Color_Off}
bower cache clean --allow-root
bower install --production --allow-root

# build project
echo -e ${BBlack}${On_Green}"Building"${Color_Off}
(cd public && exec polymer build --html.collapseWhitespace)
rsync -a ${Build_Dir}/unbundled/ public/

rm -rf ${Build_Dir}
