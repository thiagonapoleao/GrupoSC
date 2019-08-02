import { CUSTOM_ELEMENTS_SCHEMA } from '@angular/core';
import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { UpmPage } from './upm.page';

describe('UpmPage', () => {
  let component: UpmPage;
  let fixture: ComponentFixture<UpmPage>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ UpmPage ],
      schemas: [CUSTOM_ELEMENTS_SCHEMA],
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(UpmPage);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
