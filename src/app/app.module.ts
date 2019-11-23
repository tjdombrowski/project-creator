import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { ProjectTaskDisplayerComponent } from './project-task-displayer/project-task-displayer.component';
import { TaskMakerComponent } from './task-maker/task-maker.component';
import { ProjectMakerComponent } from './project-maker/project-maker.component';
import { HomeDisplayComponent } from './home-display/home-display.component';

@NgModule({
  declarations: [
    AppComponent,
    ProjectTaskDisplayerComponent,
    TaskMakerComponent,
    ProjectMakerComponent,
    HomeDisplayComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
