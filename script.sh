#!/bin/bash

# Obtém o diretório atual
CURRENT_DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" &> /dev/null && pwd )"

# Verifica se o diretório de instalação existe e é gravável
INSTALLATION_DIR="/usr/local/bin"
if [ ! -d "$INSTALLATION_DIR" ] || [ ! -w "$INSTALLATION_DIR" ]; then
    echo "Erro: Diretório de instalação /usr/local/bin não encontrado ou sem permissão de escrita."
    exit 1
fi

# Copia o arquivo maumau.php para o diretório de instalação
cp "$CURRENT_DIR/maumau.php" "$INSTALLATION_DIR/maumau"

# Verifica se a cópia foi bem sucedida
if [ $? -ne 0 ]; then
    echo "Erro ao copiar o arquivo maumau.php para $INSTALLATION_DIR."
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

# Adiciona o diretório de instalação ao PATH, se necessário
if ! grep -q "$INSTALLATION_DIR" <<< "$PATH"; then
    echo "Adicionando $INSTALLATION_DIR ao PATH..."
    echo "export PATH=\"$INSTALLATION_DIR:\$PATH\"" >> ~/.bashrc
    source ~/.bashrc
    echo "O diretório $INSTALLATION_DIR foi adicionado ao PATH."
fi
