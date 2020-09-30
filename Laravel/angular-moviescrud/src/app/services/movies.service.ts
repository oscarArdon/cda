//Servicio para conectar con el backend de laravel
import { Injectable } from '@angular/core';
//importando cliente http
import { HttpClient, HttpHeaders } from '@angular/common/http';
//importando modelo de datos
import { Movie } from '../interfaces/movie';

@Injectable({
  providedIn: 'root'
})

export class MoviesService {

  constructor(private httpCliente:HttpClient) { }

  //url para consultar servicio apirest php
  API_ENDPOINT = 'http://localhost:8000/api';

  save(movie:Movie){
    //requerido para peticiones distintas de get
    const headers = new HttpHeaders({"Content-Type":'application/json'});
    //haciendo peticion al backend
    return this.httpCliente.post(this.API_ENDPOINT+'/movies',movie,{headers:headers});
  }

  get(){
    return this.httpCliente.get(this.API_ENDPOINT+'/movies');
  }

  show(id){
    return this.httpCliente.get(this.API_ENDPOINT+'/movies/'+id);
  }

  put(movie){
    //requerido para peticiones distintas de get
    const headers = new HttpHeaders({"Content-Type":'application/json'});
    //haciendo peticion al backend
    return this.httpCliente.put(this.API_ENDPOINT+'/movies/'+movie.id,movie,{headers:headers});
  }

  delete(id){
    return this.httpCliente.delete(this.API_ENDPOINT+'/movies/'+id);
  }
}
