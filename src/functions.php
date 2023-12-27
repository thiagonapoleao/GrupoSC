<?php

/**
 * Conecta com o MySQL usando PDO
 */
function db_connect()
{
    $PDO = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_CPD. ';charset=utf8', DB_USER, DB_PASS);
    
    return $PDO;
    
}

function db_connect_acesso()
{
    $PDOO = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_ACESSO . ';charset=utf8', DB_USER, DB_PASS);
    
    return $PDOO;
    
}

function db_connect_conf()
{
    $PDOC = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_CONF . ';charset=utf8', DB_USER, DB_PASS);
    
    return $PDOC;
    
}

function db_connect_tratativa()
{
    $PDOT = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_TRATATIVA . ';charset=utf8', DB_USER, DB_PASS);
    
    return $PDOT;
    
}

function db_connect_indicadores()
{
    $PDOI = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_INDICADORES. ';charset=utf8', DB_USER, DB_PASS);
    
    return $PDOI;
    
}

function db_connect_eerg()
{
    $PDOE = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_EERG. ';charset=utf8', DB_USER, DB_PASS);
    
    return $PDOE;
    
}

function db_connect_prsc()
{
    $PDOP = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_PRSC. ';charset=utf8', DB_USER, DB_PASS);
    
    return $PDOP;
    
}

function db_connect_grandesredes()
{
    $PDORG = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_RG. ';charset=utf8', DB_USER, DB_PASS);
    
    return $PDORG;
    
}

function db_connect_port()
{
    $PDOPORT = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_PORT. ';charset=utf8', DB_USER, DB_PASS);
    
    return $PDOPORT;
    
}


/**
 * Converte datas entre os padrões ISO e brasileiro
 * Fonte: http://rberaldo.com.br/php-conversao-de-datas-formato-brasileiro-e-formato-iso/
 */
function dateConvert($date)
{
    if ( ! strstr( $date, '/' ) )
    {
        // $date está no formato ISO (yyyy-mm-dd) e deve ser convertida
        // para dd/mm/yyyy
        sscanf($date, '%d-%d-%d', $y, $m, $d);
        return sprintf('%02d/%02d/%04d', $d, $m, $y);
    }
    else
    {
        // $date está no formato brasileiro e deve ser convertida para ISO
        sscanf($date, '%d/%d/%d', $d, $m, $y);
        return sprintf('%04d-%02d-%02d', $y, $m, $d);
    }
    
    return false;
}


/**
 * Calcula a idade a partir da data de nascimento
 *
 * Sobre a classe DateTime: http://rberaldo.com.br/php-usando-a-classe-nativa-datetime/
 */
function calculateAge($birthdate)
{
    $now = new DateTime();
    $diff = $now->diff(new DateTime($birthdate));
    
    return $diff->y;
}
