import { TestBed } from '@angular/core/testing';

import { GiphiesService } from './giphies.service';

describe('GiphiesService', () => {
  beforeEach(() => TestBed.configureTestingModule({}));

  it('should be created', () => {
    const service: GiphiesService = TestBed.get(GiphiesService);
    expect(service).toBeTruthy();
  });
});
