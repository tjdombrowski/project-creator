import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ProjectMakerComponent } from './project-maker.component';

describe('ProjectMakerComponent', () => {
  let component: ProjectMakerComponent;
  let fixture: ComponentFixture<ProjectMakerComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ProjectMakerComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ProjectMakerComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
