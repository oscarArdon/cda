import { Component, OnInit } from '@angular/core';
//importando modelo de datos
import { Movie } from '../interfaces/movie';
//importando servicio para conectar backend
import { MoviesService } from '../services/movies.service';
//importando modulo para captuar parametro de ruta
import { ActivatedRoute } from '@angular/router';

@Component({
  selector: 'app-form',
  templateUrl: './form.component.html',
  styleUrls: ['./form.component.css']
})

export class FormComponent implements OnInit {

  //variable para almacenar datos de una nueva pelicula
  movie: Movie = {
    name: null,
    year: null,
    description: null,
    duration: null,
    genre: null
  };
  //atributo para id
  id: any;
  edit: boolean = false;

  constructor(private moviesService: MoviesService, private activatedRoute: ActivatedRoute) {
    this.id = this.activatedRoute.snapshot.params['id'];
    if (this.id) {
      this.edit = true;
      this.moviesService.show(this.id).subscribe((data: Movie) => {
        this.movie = data;
      }, (error) => {
        console.log(error);
      });
    } else {
      this.edit = false;
    }
  }

  ngOnInit(): void {
  }

  saveMovie() {
    if (this.edit) {
      //enviando data al backend para editar movie por medio del servicio
      this.moviesService.put(this.movie).subscribe((data) => {
        alert("Pelicula actualizada!");
        console.log(data);        
      }, (error) => {
        console.log(error);
        alert("Ocurrió un error!");
      });
    } else {
      //enviando data al backend para insertar movie por medio del servicio
      this.moviesService.save(this.movie).subscribe((data) => {
        alert("Pelicula guardada!");
        console.log(data);
      }, (error) => {
        console.log(error);
        alert("Ocurrió un error!");
      });
    }
  }

}
