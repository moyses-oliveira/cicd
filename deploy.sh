branch="test"
endwith="[0-9]-alpha$"
remote=$(git ls-remote --tags https://github.com/moyses-oliveira/cicd.git | grep $endwith | sort -V | sed -r "s#.+(v[0-9\.]+)#\1#g" | tail -1)
local=$(git tag -l | grep $endwith | sort -V | sed -r "s#.+(v[0-9\.]+)#\1#g" | tail -1)

echo "$remote"
echo "$local"

if [ "$remote" == "$local" ]; then
  echo "Nenhuma atualização disponível"
else
  git fetch --all --tags
  git checkout $remote
fi
