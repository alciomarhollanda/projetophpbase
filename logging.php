<?php 



function logMsg( $msg, $level = 'info', $file = 'main.log' )
{
    // variável que vai armazenar o nível do log (INFO, WARNING ou ERROR)
    $levelStr = '';
 
    // verifica o nível do log
    switch ( $level )
    {
        case 'info':
            // nível de informação
            $levelStr = 'INFO';
            break;
 
        case 'warning':
            // nível de aviso
            $levelStr = 'WARNING';
            break;
 
        case 'error':
            // nível de erro
            $levelStr = 'ERROR';
            break;
    }
    
    date_default_timezone_set('America/Sao_Paulo');

    // data atual
    $date = date( 'Y-m-d H:i:s' );
 
    // formata a mensagem do log
    // 1o: data atual
    // 2o: nível da mensagem (INFO, WARNING ou ERROR)
    // 3o: a mensagem propriamente dita
    // 4o: uma quebra de linha
    // $msg = sprintf( "[%s] [%s]: %s%s", $date, $levelStr, $msg, PHP_EOL );
 
    // escreve o log no arquivo
    // é necessário usar FILE_APPEND para que a mensagem seja escrita no final do arquivo, preservando o conteúdo antigo do arquivo
    file_put_contents( $file, $msg, FILE_APPEND );

    include 'connect.php';

    // $idReg = $_SESSION['id']
    $idReg = 3;
    
    $sqlInsertLogging="insert into logging (dateLogging, level, msg, fk_reg) values ('$date' , '$levelStr', '$msg', '$idReg');";    
    // $sqlInsertLogging="insert into logging (dateLogging, level, msg, fk_reg) values ('2021-04-29 11:39:42' , 'INFO', 'Teste DB v1', 3);";    
    mysqli_query($con, $sqlInsertLogging);

    // CREATE table logging (
    //     idLogging int primary key auto_increment,
    //     dateLogging datetime not null,
    //     level varchar(100) not null,
    //     msg varchar(1000) not null,
    //     fk_reg int not null,
    //     FOREIGN key (fk_reg) REFERENCES reg (id)
    // );
}



logMsg( "Executando a tarefa X..." );

logMsg( "Isto é um aviso.... a operação X pode falhar...", 'warning' );

logMsg( "Isto é um erro. A operação X falhou", 'error' );


?>