import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { HttpClientModule } from '@angular/common/http';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { LoginCompoComponent } from './login-compo/login-compo.component';
import { NgbModule } from '@ng-bootstrap/ng-bootstrap';
import { DashboardCompoComponent } from './dashboard-compo/dashboard-compo.component';

@NgModule({
  declarations: [
    AppComponent,
    LoginCompoComponent,
    DashboardCompoComponent
  ],
  imports: [
    BrowserModule,
    FormsModule,
    HttpClientModule,
    AppRoutingModule,
    NgbModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
