import { TestBed } from '@angular/core/testing';

import { TaskAccessService } from './task-access.service';

describe('TaskAccessService', () => {
  beforeEach(() => TestBed.configureTestingModule({}));

  it('should be created', () => {
    const service: TaskAccessService = TestBed.get(TaskAccessService);
    expect(service).toBeTruthy();
  });
});
