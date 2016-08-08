#!/usr/bin/env bash

# output the path
printf "Initial PWD:\n"
pwd

# cd to the namespace path
cd ../../
printf "Initial NAMESPACE:\n"
pwd

# if bizjzendcore clone does not exist, library links will be broken
# clone bizjzendcore if necessary
[[ ! -d ./bizjzendcore ]] && git clone git@gitlab.bizjournals.com:bizjournals/bizjzendcore.git


