#!/usr/bin/env bash

confirm() {
  echo "Press RETURN to continue, or ^C to cancel.";
  read -e ignored
}

ROOT=`pwd`
echo "当前项目目录：${ROOT}";

#BRANCH_LIST=`git branch`;
BRANCH_LIST=$(git branch | sed -n -e 's/^\* \(.*\)/\1/p');
BRANCH_LIST=$(git branch | sed -n -e 's/^\* \(.*\)/\1/p');

echo $BRANCH_LIST;



