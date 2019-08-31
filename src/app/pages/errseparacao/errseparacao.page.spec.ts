import { CUSTOM_ELEMENTS_SCHEMA } from '@angular/core';
import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ErrseparacaoPage } from './errseparacao.page';

describe('ErrseparacaoPage', () => {
  let component: ErrseparacaoPage;
  let fixture: ComponentFixture<ErrseparacaoPage>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ErrseparacaoPage ],
      schemas: [CUSTOM_ELEMENTS_SCHEMA],
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ErrseparacaoPage);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
