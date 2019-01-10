import { TestBed } from '@angular/core/testing';

import { LoggedUserService } from './logged-user.service';

describe('LoggedUserService', () => {
  beforeEach(() => TestBed.configureTestingModule({}));

  it('should be created', () => {
    const service: LoggedUserService = TestBed.get(LoggedUserService);
    expect(service).toBeTruthy();
  });
});
