import { SQLite, SQLiteObject } from '@ionic-native/sqlite/ngx';
import { Injectable } from '@angular/core';



@Injectable()
export class DatabaseService {

  constructor(private sqlite: SQLite) { }

  public getBD() {
    return this.sqlite.create({
      name : 'kpidb',
      location : 'defaut'
    });
  }

  public createdataBase() {
    return this.getBD().then((db: SQLiteObject) => {
      this.createTables(db);
    })
     .catch(e => console.error(e));
  }

  private createTables(db: SQLiteObject) {
    return db.sqlBatch(
      ['CREAT TABLE IF NOT EXISTS login(id integer primary key NOT NULL, user VARCHAR(50), nome VARCHAR(50), password VARCHAR(50)']
    ).then(() => {
      console.log("Tabela criada com sucesso!")
    }).catch(e => console.error(e));
  }

}
