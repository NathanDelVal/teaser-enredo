<?php

$diretorio = "/pacotesIntegracoes";

if(chmod($diretorio,0755)){
    echo "Permisão Concedida!";
}else{
    echo "Não foi possível alterar permissão!";
}