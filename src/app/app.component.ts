import { Component, OnInit } from '@angular/core';
import { TaskAccessService } from  './task-access.service';

interface TaskDisplay {
  id: number;
  description: string;
  createdAt: Date; //TODO Determine correct type
  completion: boolean; //TODO Determine correct type
}

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent implements OnInit {
  title = 'project-manager';
  tasks: TaskDisplay[] = [];

  constructor(private taskSvc: TaskAccessService) {

  }

  ngOnInit() {
    this.loadTasks();
  }

  private loadTasks() {
    this.taskSvc.getTasks().subscribe((data) => {
      this.tasks = (<any[]>data).map(x => ({
        id: x.id,
        description: x.description,
        completion: x.completion, // These are the correct names returned in json
        createdAt: x.dateCreated
      }));
    }, (error) => {
      console.log(error);
    });
  }
}
