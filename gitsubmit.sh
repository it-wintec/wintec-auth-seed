


git status
git add -A .

echo "输入更新日志[ENTER]:"
read text
git commit -m $text

git push origin master