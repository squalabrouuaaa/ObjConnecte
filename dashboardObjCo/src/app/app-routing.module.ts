import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { LoginCompoComponent } from './login-compo/login-compo.component';
import { AppComponent } from "./app.component";
import { DashboardCompoComponent } from './dashboard-compo/dashboard-compo.component';


const routes: Routes = [
  {path: 'dashboard', component: DashboardCompoComponent },
  {path: 'login', component: LoginCompoComponent},
  {path: '', component: LoginCompoComponent}   
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
