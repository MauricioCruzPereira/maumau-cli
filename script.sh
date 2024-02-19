#!/bin/bash

# Obtém o diretório atual
CURRENT_DIR="$(pwd)"

# Verifica se o diretório de instalação existe
INSTALLATION_DIR="/usr/local/bin"
if [ ! -d "$INSTALLATION_DIR" ]; then
    echo "Erro: Diretório de instalação não encontrado."
    exit 1
fi

# Copia o arquivo maumau para o diretório de instalação
cp "$CURRENT_DIR/maumau" "$INSTALLATION_DIR"

# Verifica se a cópia foi bem sucedida
if [ $? -ne 0 ]; then
    echo "Erro ao copiar o arquivo maumau para $INSTALLATION_DIR."
    exit 1
fi

# Dá permissão de execução ao arquivo maumau
chmod +x "$INSTALLATION_DIR/maumau"

# Verifica se a permissão foi aplicada com sucesso
if [ $? -ne 0 ]; then
    echo "Erro ao dar permissão de execução ao arquivo maumau."
    exit 1
fi

echo "O comando maumau foi configurado com sucesso como um comando global."
