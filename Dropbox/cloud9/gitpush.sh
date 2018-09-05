#!/bin/bash
#01-08-2018
#Jack Yang yyddrr@gmail.com

echo "输入更新日志[ENTER]:"
read text

if [[ -z "$text" ]]; then
    text="No specified information"
fi

git status
git add -A .
git commit -m "$text"
git push origin master