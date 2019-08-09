import { TestBed } from '@angular/core/testing';

import { DadosSCService } from './dados-sc.service';

describe('DadosSCService', () => {
  beforeEach(() => TestBed.configureTestingModule({}));

  it('should be created', () => {
    const service: DadosSCService = TestBed.get(DadosSCService);
    expect(service).toBeTruthy();
  });
});
