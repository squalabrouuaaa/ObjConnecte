import { Component, OnInit } from '@angular/core';
import { HttpClient, HttpHeaders, HttpParams } from '@angular/common/http';

@Component({
  selector: 'app-dashboard-compo',
  templateUrl: './dashboard-compo.component.html',
  styleUrls: ['./dashboard-compo.component.css']
})
export class DashboardCompoComponent implements OnInit {

  constructor(/*private httpClient: HttpClient, private router*/) {
  }
 /* token = "" ; 
  option = {} ; 
*/
  ngOnInit(): void {
    /*this.httpClient.post('http://localhost:8000/getData',this.token,this.option)
  	.subscribe(
  		(response) => {
        var res: any = response;
      }
    );*/
  }

}
