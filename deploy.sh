
origin=$(git remote show origin | head -2 | tail -1 | sed -r "s#.+ ([a-z0-9]+@[A-Za-z0-9]+.+)#\1#g")
remote=$(git ls-remote $origin | tail -1 | sed -r "s#([0-9a-f]+).+#\1#g")
local=$(git log -1 | head -1 | sed -r "s#.+ ([0-9a-f]+)#\1#g")

echo "$remote"
echo "$local"

if [ "$remote" == "$local" ]; then
  echo "Nenhuma atualização disponível"
else
  echo "Nova atualização disponível"
  #git fetch --all --tags
  #git checkout $remote
fi
