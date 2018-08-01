#!/bin/bash

echo "输入更新日志[ENTER]1:"
read text

git status
git add -A .
git commit -m $text
git push origin master