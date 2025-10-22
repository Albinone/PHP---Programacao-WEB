<?php
//Curl


/* 🧩 O que é o cURL
cURL significa Client URL — é uma ferramenta e biblioteca usada para enviar e receber dados pela internet através de vários protocolos, como:

HTTP / HTTPS 🌐
FTP / SFTP 📁
SMTP / POP3 (email) ✉️
LDAP, Telnet, e muitos outros.

No contexto do PHP, o cURL é uma extensão nativa que permite que o teu código faça pedidos HTTP a outros servidores — ou seja, o PHP pode agir como um cliente da web.
 */


/* ⚙️ Estrutura básica de um pedido cURL em PHP

O fluxo básico é sempre este:

Inicializar a sessão: curl_init()
Definir as opções: curl_setopt()
Executar o pedido: curl_exec() */

$curl = curl_init();

curl_setopt_array($curl,[
    CURLOPT_URL => 'https://example.com',    // URL de destino
    CURLOPT_TIMEOUT => 30,                   // Tempo limite (30s)
    CURLOPT_CUSTOMREQUEST=>'GET',            // Método HTTP
    CURLOPT_HEADER => false,                 // Não incluir cabeçalhos na resposta
    CURLOPT_RETURNTRANSFER => true           // Guarda a resposta em vez de imprimir
    //CURLOPT_POSTFIELDS =>''
]);

/* | Opção                   | Significado                                              | Comentário                                                                          |
| ----------------------- | -------------------------------------------------------- | ----------------------------------------------------------------------------------- |
| `CURLOPT_URL`           | URL do pedido                                            | É o endereço para onde o pedido HTTP vai ser enviado (`https://example.com`).       |
| `CURLOPT_TIMEOUT`       | Tempo limite (em segundos)                               | Se o servidor não responder em 30 segundos, o pedido é cancelado.                   |
| `CURLOPT_CUSTOMREQUEST` | Define o método HTTP (GET, POST, PUT, DELETE...)         | Aqui define-se como `"GET"`. (Neste caso poderia ser omitido, pois GET é o padrão.) |
| `CURLOPT_HEADER`        | Indica se o cabeçalho HTTP deve ser incluído na resposta | ⚠️ Este parâmetro deve ser **booleano** (`true` ou `false`), **não um array**.      |
| `CURLOPT_POSTFIELDS`    | Corpo da requisição (para POST/PUT)                      | Está definido como string vazia — sem efeito em pedidos GET.                        |
 */

$response = curl_exec($curl);
curl_close($curl);

echo $response;
?>