import { CUSTOM_ELEMENTS_SCHEMA } from '@angular/core';
import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { LancafechamentoPage } from './lancafechamento.page';

describe('LancafechamentoPage', () => {
  let component: LancafechamentoPage;
  let fixture: ComponentFixture<LancafechamentoPage>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ LancafechamentoPage ],
      schemas: [CUSTOM_ELEMENTS_SCHEMA],
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(LancafechamentoPage);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
