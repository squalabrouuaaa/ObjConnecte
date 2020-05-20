import { Component, OnInit, Injectable  } from '@angular/core';
import { NgForm } from '@angular/forms';
import { HttpClient, HttpHeaders, HttpParams } from '@angular/common/http';
import { Router  } from '@angular/router';

@Injectable()
@Component({
  selector: 'app-logincompo',
  templateUrl: './login-compo.component.html',
  styleUrls: ['./login-compo.component.css']
})

export class LoginCompoComponent implements OnInit {


  constructor(private httpClient: HttpClient, private router: Router) {
  }

	ngOnInit() {
    	if (localStorage.getItem("token")) {
    		this.router.navigate(['dashboard']);
    	}
  }

  onSubmit(form: NgForm){
	  
	  

  	var data = new HttpParams()
  		.append("username", form.value['username'])
  		.append("password", form.value['password']);

  	var options = {
  		headers: new HttpHeaders({
	  		'Content-Type': 'application/x-www-form-urlencoded'
	  	})
  	};

  	this.httpClient.post('http://localhost:8000/login', data, options)
  	.subscribe(
  		(response) => {
  			var res: any = response;

  			console.log('POST RESPONSE'+JSON.stringify(response));
  			localStorage.setItem('token', res.token);
  			this.router.navigate(['dashboard']);
  		},
  		(error) => {
  			console.log('POST ERROR'+JSON.stringify(error));
  		}
  	);
  	
  }

}
