find . -name "*.sql" -print0 | xargs -0 sed -i -e "s/$1/$2/g"