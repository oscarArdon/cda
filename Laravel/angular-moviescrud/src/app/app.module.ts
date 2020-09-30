import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
//Modulo de rutas
import { AppRoutingModule } from './app-routing.module';
//Modulos de componentes
import { AppComponent } from './app.component';
import { HomeComponent } from './home/home.component';
import { FormComponent } from './form/form.component';
//Importando modulo HTTP para conectar con backend
import {HttpClientModule} from '@angular/common/http';
//Importando modulo para trabajar formularios
import { FormsModule } from '@angular/forms';

@NgModule({
  declarations: [
    AppComponent,
    HomeComponent,
    FormComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    HttpClientModule,
    FormsModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
