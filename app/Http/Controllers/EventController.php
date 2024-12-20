<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;

class EventController extends Controller
{
   public function index()
   {

      $search = request('search');

      if ($search) {
         $events = Event::where([
            ['title', 'like', '%' . $search . '%']
         ])->get();
      } else {
         $events = Event::all();
      }

      return view('welcome', ['events' => $events, 'search' => $search]);
   }


   public function create()
   {
      return view('events.create');
   }

   public function store(Request $request)
   {
      $event = new Event;
      $event->title = $request->title;
      $event->date = $request->date;
      $event->city = $request->city;
      $event->private = $request->private;
      $event->description = $request->description;
      $event->items = $request->items;


      //img
      if ($request->hasFile('image') && $request->file('image')->isValid()) {

         $requestImage = $request->image;
         $extension = $requestImage->extension();
         $imageName = md5($requestImage->getClientOriginalName() . strtotime('now')) . "." . $extension;
         $requestImage->move(public_path('img/events'), $imageName);
         $event->image = $imageName;
      }

      $user = auth()->user();
      $event->user_id = $user->id;
      $event->save();

      return redirect('/')->with('success', 'Evento criado com sucesso!');
   }

   public function show($id)
   {
      $event = Event::findOrFail($id);
      $eventOwner = User::where('id', $event->user_id)->first()->toArray();
      return view('events.show', ['event' => $event, 'eventOwner' => $eventOwner]);
   }

   public function dashboard()
   {

      $user = auth()->user();
      $events = $user->events;

      $eventsAsParticipant = $user->eventsAsParticipant;

      return view('events.dashboard', [
         'events' => $events,
         'eventsAsParticipant' => $eventsAsParticipant
      ]);
   }

   public function destroy($id)
   {

      Event::findOrFail($id)->delete();
      return redirect('/')->with('success', 'Evento excluido com sucesso');
   }


   public function edit($id)
   {

      $user = auth()->user();

      $event = Event::findOrFail($id);

      if ($user->id != $event->user_id) {
         return redirect('/');
      }


      return view('events.edit', ['event' => $event]);
   }

   public function update(Request $request, $id)
   {

      $data = $request->all();

      //img
      if ($request->hasFile('image') && $request->file('image')->isValid()) {

         $requestImage = $request->image;
         $extension = $requestImage->extension();
         $imageName = md5($requestImage->getClientOriginalName() . strtotime('now')) . "." . $extension;
         $requestImage->move(public_path('img/events'), $imageName);
         $data['image'] = $imageName;
      }


      $event = Event::findOrFail($id);
      $event->update($data);
      return redirect('/')->with('success', 'Evento Editado com sucesso!');
   }

   public function joinEvent($id)
   {
      $user = auth()->user();

      $user->eventsAsParticipant()->attach($id);

      $event = Event::findOrFail($id);

      return redirect('/')->with("success", 'Sua presença esta confimarda no evento ' . $event->title);
   }
}
