#!/usr/bin/env bash
function all(){
dirs=(/Users/a.bouteiller/Desktop/backend-streaming/src/assets/*/)
for dir in "${dirs[@]}"

do
    echo "$dir"
    cd "$dir"
function verif() {
    if [ "$(ls -A *.mkv)" ]; then
        echo "Il y a des fichiers mkv dans le dossier"
        source /Users/a.bouteiller/Desktop/backend-streaming/src/assets/converter.sh
        
    else
        echo "Il n'y a pas de fichiers mkv dans le dossier"
        
    fi
}

verif
done
sleep 2
all
}
all








