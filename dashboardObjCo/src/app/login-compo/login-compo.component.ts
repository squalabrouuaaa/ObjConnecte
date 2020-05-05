import { Component, OnInit } from '@angular/core';
import { HttpClient, HttpHeaders, HttpParams } from '@angular/common/http';

@Component({
  selector: 'app-login-compo',
  templateUrl: './login-compo.component.html',
  styleUrls: ['./login-compo.component.css'],
})
export class LoginCompoComponent implements OnInit {
  username: string;
  password: string;

  constructor(private httpClient: HttpClient) {}

  ngOnInit(): void {}
  onlogin() {
    /*var data = new HttpParams()
  	  .append("username", this.username)
  	  .append("password", this.password);
	  	var options = {
	  		headers: new HttpHeaders({
		  		'Content-Type': 'application/x-www-form-urlencoded'
		  	})
	  	};
	  	this.httpClient.post('http://localhost:8000/login', data, options)
	  	.subscribe(*/
  }
}
