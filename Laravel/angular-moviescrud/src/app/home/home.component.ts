import { Component, OnInit } from '@angular/core';
//importando modelo de datos
import { Movie } from '../interfaces/movie';
//importando servicio para conectar backend
import { MoviesService } from '../services/movies.service';

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.css']
})
export class HomeComponent implements OnInit {
  //Solucion cors laravel para conectar angular-laravel: https://www.youtube.com/watch?v=p3183c50YOQ

  //arreglo para almacenar lista de peliculas
  movies:Movie[];

  //inyectando servicios en los atributos al momento de que inicialice el componente
  constructor(private moviesService:MoviesService) {
    this.ListMovies();
  }

  ngOnInit(): void {
  }

  ListMovies(){
    this.moviesService.get().subscribe((data:Movie[])=>{
      this.movies = data;
    },(error)=>{
      console.log(error);
      alert("Ocurrio un error!");
    });
  }

  DeleteMovie(id){
    if(confirm('¿Deseas eliminar esta pelicula?')){
      this.moviesService.delete(id).subscribe((data)=>{
        alert('Pelicula eliminada!');
        this.ListMovies();
      });
    }
  }
}
