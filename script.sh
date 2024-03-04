#!/bin/bash

# Obtém o caminho absoluto do diretório atual
DIR=$(dirname "$0")
if [[ "$DIR" == "." ]]; then
    DIR=$(pwd)
fi

# Verifica se o alias já existe no .bashrc
if grep -q "alias maumau" ~/.bashrc; then
    echo "Alias 'maumau' already exists in ~/.bashrc"
else
    # Adiciona o alias ao .bashrc usando o caminho absoluto do diretório atual
    echo "alias maumau='php $DIR/maumau.php'" >> ~/.bashrc
    echo "Alias 'maumau' added to ~/.bashrc"
fi
