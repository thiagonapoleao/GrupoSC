import { CUSTOM_ELEMENTS_SCHEMA } from '@angular/core';
import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ConferenciaPage } from './conferencia.page';

describe('ConferenciaPage', () => {
  let component: ConferenciaPage;
  let fixture: ComponentFixture<ConferenciaPage>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ConferenciaPage ],
      schemas: [CUSTOM_ELEMENTS_SCHEMA],
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ConferenciaPage);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
