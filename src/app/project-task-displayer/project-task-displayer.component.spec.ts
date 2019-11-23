import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ProjectTaskDisplayerComponent } from './project-task-displayer.component';

describe('ProjectTaskDisplayerComponent', () => {
  let component: ProjectTaskDisplayerComponent;
  let fixture: ComponentFixture<ProjectTaskDisplayerComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ProjectTaskDisplayerComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ProjectTaskDisplayerComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
