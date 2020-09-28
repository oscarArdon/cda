<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//Exportando modelo Contact
use App\Models\Contact;

class ContactController extends Controller
{
    /**
     * Despliega la lista de registros.
     */
    public function index()
    {
        //obteniendo todos los registros de la tabla
        $contacts = Contact::all();
        //retornando a la vista con un array de datos
        return view('contacts.index',compact('contacts'));
    }

    /**
     * Muestra vista con formulario para crear nuevo registro.
     */
    public function create()
    {
        return view('contacts.create');
    }

    /**
     * Guarda un nuevo registro en bd.
     */
    public function store(Request $request)
    {
        //Validando data enviada del form
        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required',
        ]);
        //creando nuevo objeto a partir del modelo de la tabla
        $contact = new Contact([
            //asignando a los atributos los datos enviados desde el form
            'first_name'=>$request->get('first_name'),
            'last_name'=>$request->get('last_name'),
            'email'=>$request->get('email'),
            'job_title'=>$request->get('job_title'),
            'city'=>$request->get('city'),
            'country'=>$request->get('country')
        ]);
        //guardando registro
        $contact->save();
        //retornando a vista con mensaje de exito
        return redirect('/contacts')->with('success','Contact saved!');
    }

    /**
     * Muestra en formulario el elemento a editar.
     */
    public function edit($id)
    {
        //almacenando registro que coincida con el param id
        $contact = Contact::find($id);
        //retornando a la vista con el registro a editar
        return view('contacts.edit',compact('contact'));
    }

    /**
     * Edita un registro en especifico en la bd.
     */
    public function update(Request $request, $id)
    {
        //Validando data enviada del form
        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required'
        ]);
        //obteniendo registro en objeto a partir del id
        $contact = Contact::find($id);
        $contact->first_name = $request->get('first_name');
        $contact->last_name = $request->get('last_name');
        $contact->email = $request->get('email');
        $contact->job_title = $request->get('job_title');
        $contact->city = $request->get('city');
        $contact->country = $request->get('country');
        //guardando cambios en el registro
        $contact->save();
        //retornando a vista con mensaje de exito
        return redirect('/contacts')->with('success','Contact updated!');
    }

    /**
     * elimina registros.
     *
     */
    public function destroy($id)
    {
        //obteniedo registro a partir del id
        $contact = Contact::find($id);
        //eliminado registro
        $contact->delete();
        //retornando a la vista con mensaje de exito
        return redirect('/contacts')->with('success','Conctact deleted!');
    }
}
