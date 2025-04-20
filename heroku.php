<?php

$url = parse_url(getenv('JAWSDB_URL'));
putenv('DB_HOST=' . $url['host']);
putenv('DB_USER=' . $url['user']);
putenv('DB_PASSWORD=' . $url['pass']);
putenv('DB_NAME=' . ltrim($url['path'], '/'));

$host = getenv('DB_HOST');
$user = getenv('DB_USER');
$pass = getenv('DB_PASSWORD');
$db   = getenv('DB_NAME');

$dsn = "mysql:host=$host;dbname=$db;charset=utf8";

try {
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);

    echo "Conexão com o banco estabelecida.\n";

    $arquivosSQL = [
        __DIR__ . '/banco.sql'
    ];

    foreach ($arquivosSQL as $arquivo) {
        if (!file_exists($arquivo)) {
            echo "Arquivo não encontrado: $arquivo\n";
            continue;
        }

        echo "Executando: $arquivo\n";
        $sql = file_get_contents($arquivo);

        $pdo->exec($sql);

    }

    echo "Banco e views inicializados com sucesso.\n";
} catch (PDOException $e) {
    echo 'Erro ao conectar ou executar SQL: \n
          Linhas: '.$e->getLine().'<br>
          Mensagem: '. $e->getMessage(). '<br>
          String: '. ('mysql:host='.$host.';dbname='.$db). '<br>
          User and Pass: '. $user .' & '. $pass;
    throw $e;
}
