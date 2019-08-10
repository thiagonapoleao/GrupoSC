import { CUSTOM_ELEMENTS_SCHEMA } from '@angular/core';
import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { AnaliseprodconfPage } from './analiseprodconf.page';

describe('AnaliseprodconfPage', () => {
  let component: AnaliseprodconfPage;
  let fixture: ComponentFixture<AnaliseprodconfPage>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ AnaliseprodconfPage ],
      schemas: [CUSTOM_ELEMENTS_SCHEMA],
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(AnaliseprodconfPage);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
