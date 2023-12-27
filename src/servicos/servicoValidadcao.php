<?php
//declare('strict_types=1'); para usar para forçar o tipo da variavel

function validaNome(string $nome): bool
{
    if (empty($nome)) {
        setarMensagemErro($mensagem = 'O nome não pode ser vazio! ');
        return false;
    } else if (strlen($nome) < 3) {
        setarMensagemErro($mensagem = 'O nome não pode conter menos que 3 caractres! ');
        return false;
    } else if (strlen($nome) > 40) {
        setarMensagemErro($mensagem = 'O nome não pode conter mais que 40 caractres! ');
        return false;
    }
    return true;
}

function validaRota(string $rota): bool
{
    if (!is_numeric($rota)) {
        setarMensagemErro($mensagem = 'Informe a Rota ');
        return false;
    } else if (strlen($rota) > 3) {
        setarMensagemErro($mensagem = 'A rota não pode ter mais que 3 numeros ');
        return false;
    } else if (strlen($rota) < 3) {
        setarMensagemErro($mensagem = 'A rota não pode ter menos que 3 numeros ');
        return false;
    }
    return true;
}

function validaData(string $data): bool
{
    if (!is_numeric($data)) {
        setarMensagemErro($mensagem = 'Informe a Data ');
        return false;
    }
    return true;
}

function validaHora(string $hora): bool
{
    if (!is_numeric($hora)) {
        setarMensagemErro($mensagem = 'Informe o Horário ');
        return false;
    }
    return true;
}

function validaImpressora(string $impressora): bool
{
    if (!is_numeric($impressora)) {
        setarMensagemErro($mensagem = 'Informe a impressora ');
        return false;
    } else if (strlen($impressora) > 1) {
        setarMensagemErro($mensagem = 'A impressora tem apenas 1 digito ');
        return false;
    }
    return true;
}

function validaCodigo(string $codigooperador): bool
{
    if (!is_numeric($codigooperador)) {
        setarMensagemErro($mensagem = 'Informe o Codigo do Operador ');
        return false;
    } else if (strlen($codigooperador) > 1) {
        setarMensagemErro($mensagem = 'O Codigo do Operador tem apenas 1 digito ');
        return false;
    } else if ($codigooperador > 7) {
        setarMensagemErro($mensagem = 'Codigo do Operador não existe ');
        return false;
    }
    return true;
}

function validaOperador(string $opreador): bool
{
    if (empty($opreador)) {
        setarMensagemErro($mensagem = 'O nome do Operador não pode ser vazio! ');
        return false;
    } else if (strlen($opreador) < 3) {
        setarMensagemErro($mensagem = 'O nome não pode conter menos que 3 caractres! ');
        return false;
    } else if (strlen($opreador) > 40) {
        setarMensagemErro($mensagem = 'O nome não pode conter mais que 40 caractres! ');
        return false;
    }
    return true;
}

function validaDanfeEpec(string $danfeepec)   : bool
{
    if (!is_numeric($danfeepec)) {
        setarMensagemErro($mensagem = 'O campo não pode ser fazio ');
        return false;
    }
    return true;
}

function validaDanfeNormal(string $danfenormal)   : bool
{
    if (!is_numeric($danfenormal)) {
        setarMensagemErro($mensagem = 'O campo não pode ser fazio ');
        return false;
    }
    return true;
}