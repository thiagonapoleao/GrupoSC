import { DecimalPipe } from '@angular/common'; 
export class Upm {

    id: number;
    indicador: string;
    meta: string;
    upm: string;
    erros: string;
    data: string;
    hora: string;
  
}

export class Hora {

    id: number;
    confT: number;
    errosT: number;
    upm: number;
    difErros: number;
    horasG: string;
    horasD: string;
  
}

export class Uestacao {

    id: number;
    data: string;
    estacao: string;
    t_prod: string;
    qtd_cnf: string;
    falta_epm: string;
    falta_upm: string;
    sobra_epm: string;
    sobra_upm: string;
    troca_epm: string;
    troca_upm: string;
    erro_conf_epm: string;
    erro_conf_upm: string;
    trava_valid_epm: string;
    trava_valid_upm: string;
    hora: string;
  
}