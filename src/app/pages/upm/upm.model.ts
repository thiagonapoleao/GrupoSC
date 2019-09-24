import { DecimalPipe } from '@angular/common'; 
export class Upm {

    id: number;
    indicador: String;
    meta: String;
    upm: String;
    erros: String;
    data: String;
    hora: String;
  
}

export class Hora {

    id: number;
    confT: number;
    errosT: number;
    upm: number;
    difErros: number;
    horasG: String;
    horasD: String;
  
}

export class Uestacao {

    id: number;
    data: String;
    estacao: String;
    t_prod: String;
    qtd_cnf: String;
    falta_epm: String;
    falta_upm: String;
    sobra_epm: String;
    sobra_upm: String;
    troca_epm: String;
    troca_upm: String;
    erro_conf_epm: String;
    erro_conf_upm: String;
    trava_valid_epm: String;
    trava_valid_upm: String;
    hora: String;
  
}