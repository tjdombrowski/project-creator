import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class TaskAccessService {

  configUrl = "assets/config.json";

  constructor(private http: HttpClient) { }

  getConfig() {
    return this.http.get(this.configUrl);
  }

  getTasks() {
    return this.http.get("localhost/api/taskService.php");
  }



}
