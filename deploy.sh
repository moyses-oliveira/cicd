branch="test"
remote=$(git ls-remote --heads origin $branch | tail -1 | sed -r "s#([0-9a-f]+).+#\1#g")
local=$(git rev-parse $branch)

echo "$remote"
echo "$local"

if [ "$remote" == "$local" ]; then
  echo "Nenhuma atualização disponível"
else
  echo "Nova atualização disponível"
  #git fetch --all --tags
  #git checkout $remote
fi
